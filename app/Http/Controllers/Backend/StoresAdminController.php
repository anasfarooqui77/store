<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

// Models
use App\Models\User;

// Services
use App\Services\UserService;

//Request
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreAdminStoreRequest;

// Support Facades
use Illuminate\Support\Facades\Session;

class StoresAdminController extends Controller
{

    /**
     * UserService instance to use of various of UserSerives
     * 
     * @var \App\Services\UserService
     */
    protected $userService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
        $this->userService = new UserService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storesAdmin = $this->userService->getPaginatedListOfStoresAdmin(10);

        if ($storesAdmin) {
            return view('backend.admin.storeadmin.index', compact('storesAdmin'));
        }else{
            Session::flash('failure', 'There is some problem in fetching Store Admin at the moment. Please try again later.');

            return redirect(route('dashboard'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.storeadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminStoreRequest $request)
    {
        /**
         * take validate input and type storeadmin
         */
        $input = $request->validated();
        $input['type'] = 'storeadmin';

        $result = $this->userService->createUser($input);

        if ($result)
            Session::flash('success', 'The Store Admin has been added successfully.');
        else
            Session::flash('failure', 'There is some problem in adding the Store Admin.');

        return redirect(route('storeadmin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
