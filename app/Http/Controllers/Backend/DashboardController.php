<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

// Services
use App\Services\AuthService;

// Requests
use Illuminate\Http\Request;

// Support Facades
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * AuthService instance to use various functions of the AuthService.
     *
     * @var \App\Services\AuthService
     */
    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authService = new AuthService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if($roleLabel = $this->authService->getRoleLabelOfCurrentlyLoggedInUser())
            return view('backend.'.$roleLabel.'.index');
        else
            abort(500);
    }
}
