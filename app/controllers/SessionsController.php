<?php

class SessionsController extends BaseController
{
    protected $skipAuthentication = array("create", "store", "destroy");
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Show the form for creating a new session.
     *
     * GET /login
     * 
     * @return View
     */
    public function create()
    {
        return View::make("sessions.create");
    }

    /**
     * Create/store a new session for the user.
     *
     * POST /login
     * 
     * @return Redirect
     */
    public function store()
    {
        $credentials = array(
            "email_address" => Input::get("email_address"),
            "password" => Input::get("password"),
            "active" => true
        );

        # Try to authenticate the user and "remember" the login
        # if the authentication succeeds.
        if (Auth::attempt($credentials, true)) {
            Login::log(Auth::user(), Auth::viaRemember());

            return Redirect::intended("/")
                ->with("success", Lang::get("controllers/sessions.store.success"));
        }
        else #check if user is blocked            
        {
            $user = User::getUserByEmail(Input::get("email_address"));
                        
            if($user != null){
                if(!$user->active)
                {
                    return Redirect::route("sessions.create")
                        ->withErrors(array(Lang::get("controllers/sessions.store.blocked")))
                        ->with("simple_error_message", true)->withInput();
                }
            }
        }
        
        return Redirect::route("sessions.create")
            ->withErrors(array(Lang::get("controllers/sessions.store.error")))
            ->with("simple_error_message", true)->withInput();
    }

    /**
     * Destroy the current session and redirect to "home".
     *
     * GET /logout
     * 
     * @return Redirect
     */
    public function destroy()
    {
        Auth::logout();

        return Redirect::route("pages.show", array("path" => "/"))
            ->with("success", Lang::get("controllers/sessions.destroy.success"));
    }
}
