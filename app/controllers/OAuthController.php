<?php

class OAuthController extends BaseController
{
    protected $skipAuthentication = array("facebook", "google", "linkedin");

    /**
     * Authorizes a user by facebook oauth login
     *
     * GET /login/facebook
     *
     * @return Redirect
     */
    public function facebook() {
        // Get data from input
        $code = Input::get("code");

        // Get fb service
        $fb = OAuth::consumer("Facebook");

        // Check if code is valid

        // If code is provided get user data and sign in
        if (!empty($code)) {
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($fb->request("/me"), true);

            $this->validateUser($result["email"], $result["name"], substr($result["locale"], 0, 2));

            if (Session::get("previous_url") !== null) {
                return Redirect::intended(SESSION::pull("previous_url"))
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            } else {
                return Redirect::intended("/")
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            }
        } else { // If not ask for permission first
            // Get fb authorization
            $url = $fb->getAuthorizationUri();

            // Return to facebook login url
            return Redirect::to((string)$url);
        }
    }

    /**
     * Authorizes a user by google oauth login
     *
     * GET /login/google
     *
     * @return Redirect
     */
    public function google(){
        // Get data from input
        $code = Input::get("code");

        // Get google service
        $googleService = OAuth::consumer("Google");

        // Check if code is valid

        // If code is provided get user data and sign in
        if (!empty($code)) {
            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode( $googleService->request("https://www.googleapis.com/oauth2/v1/userinfo"), true);

            $this->validateUser($result["email"], $result["name"], $result["locale"]);

            if (Session::get("previous_url") !== null) {
                return Redirect::intended(SESSION::pull("previous_url"))
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            } else {
                return Redirect::intended("/")
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            }
        } else { // If not ask for permission first
            // Get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // Return to google login url
            return Redirect::to((string)$url);
        }
    }

    /**
     * Authorizes a user by linked in oauth login
     *
     * GET /login/linkedin
     *
     * @return Redirect
     */
    public function linkedin(){
        // Get data from input
        $code = Input::get("code");

        $linkedinService = OAuth::consumer("Linkedin");

        if (!empty($code)) {
            // This was a callback request from linkedin, get the token
            $token = $linkedinService->requestAccessToken($code);

            // Send a request with it. Please note that XML is the default format.
            $result = json_decode($linkedinService->request("/people/~?format=json"), true);
            $email = json_decode($linkedinService->request("/people/~/email-address?format=json"), true);

            $this->validateUser($email, $result["firstName"]." ".$result["lastName"], "en");

            if (Session::get("previous_url") !== null) {
                return Redirect::intended(SESSION::pull("previous_url"))
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            } else {
                return Redirect::intended("/")
                    ->with("success", Lang::get("controllers.sessions.store.success"));
            }
        } else { // If not ask for permission first
            // Get linkedinService authorization
            $url = $linkedinService->getAuthorizationUri(array("state" => "DCEEFWF45453sdffef424"));

            // Return to linkedin login url
            return Redirect::to((string)$url);
        }
    }

    /**
     * Checks to see if oauth user has logged in before.
     * If not, creates user.
     * Logs user in.
     *
     * @return void
     */
    private function validateUser($email, $name, $locale = "en")
    {
        $user = User::getUserByEmail($email);

        if ($user === null) {
            $password = md5(Config::get("app.key").date("Y-m-d H:i:s"));

            $user = new User();
            $user->email_address = $email;
            $user->name = $name;
            $user->password = $password;
            # TODO: Sort out the logic behind user model password_confirmation
            # $user->password_confirmation = $password;
            $user->active = true;
            $user->user_level = User::AUTHENTICATED_USER;
            $user->locale = $locale;

            if ($user->save()) {
                # TODO/FIXME: Empty by purpose?
            } else {
                return Redirect::route("signup.create")
                    ->withErrors($user->getErrors());
            }
        } else if(!$user->active) {
            return Redirect::route("signup.create")
                ->withErrors(Lang::get("controllers.sessions.store.blocked"));
        }

        Auth::login($user);
        Login::log(Auth::user(), Auth::viaRemember());
    }
}
