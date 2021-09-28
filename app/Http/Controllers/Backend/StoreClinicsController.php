<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

//Model
use App\Models\StoreClinic;

//Services
use App\Services\StoreClinicService;
use App\Services\UserService;

//Request
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreClinicStoreRequest;


// Support Facades
use Illuminate\Support\Facades\Session;

class StoreClinicsController extends Controller
{

     /**
     * StoreClinicService instance to use various functions of StoreClinicService.
     *
     * @var \App\Services\StoreClinicService
     */
    protected $storeclinicService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin')->except('allotted');
        $this->middleware('role:storeadmin')->only('allotted');
        $this->storeclinicService = new StoreClinicService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $storeclinics = $this->storeclinicService->getPaginatedListOfStoreClinics(10);

        
        if ($storeclinics) {
            return view('backend.admin.storedetail.index', compact('storeclinics'));
        } else {
            Session::flash('failure', 'There is some problem in fetching storeclinics at the moment. Please try again later.');

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
        $userService = new UserService;
        $storeAdmins = $userService->getPluckedListOfStoreAdmin();

        if ($storeAdmins) {
            return view('backend.admin.storedetail.create', compact('storeAdmins'));
        }else{
            Session::flash('failure', 'there is problem in fetching storeAdmin');

            return redirect(route('dashboard'));
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreClinicStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicStoreRequest $request)
    {
        $input = $request->validated();

        $result = $this->storeclinicService->createStoreClinic($input);

        if ($result)
            Session::flash('success', 'The Store Clinic has been added successfully.');
        else
            Session::flash('failure', 'There is some problem in adding the store clinic.');

        return redirect(route('storeclinic.index'));
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

     /**
     * Show the listing of sites allotted to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function allotted()
    {
        $user = request()->user();
        return view('backend.storeadmin.storedetail.allotted', compact('user'));
    }
}
