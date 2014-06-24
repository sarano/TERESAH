<?php

class ProfileController extends BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
                
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        # Redirect to login if user is not set
        if (!Auth::user()) {
            return Redirect::route("pages.show", array("locale" => App::getLocale(), "path" => "login"));
        }

        return View::make("profile.index")->withUser($this->user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        # Redirect to login if user is not set
        if (!Auth::user()) {
            return Redirect::route("pages.show", array("locale" => App::getLocale(), "path" => "login"));
        }

        $user = $this->user->fill(Input::all());

        if ($user->save()) {
            return Redirect::route("profile.index", array("locale" => App::getLocale()))
                ->with("success", Lang::get("controllers/profile.store.success"));
        } else {
            return Redirect::route("profile.index", array("locale" => App::getLocale()))
                ->withErrors($user->getErrors())->withInput();
        }
    }
}