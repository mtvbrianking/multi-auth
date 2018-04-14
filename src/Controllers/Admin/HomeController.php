<?php

namespace Bmatovu\MultiAuth\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('multi-auth::admin.home');
    }

}