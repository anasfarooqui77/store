<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('StoreAdmin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	<div class="row">
                		<div class="col-md-12">
                			Create Store
                		</div>
                	</div>
                    <div class="row">
                    	<div class="col-md-12">
                    		{!!
                                Form::open([
                                    'method' => 'Post', 
                                    'action' => ['App\Http\Controllers\Backend\StoreClinicsController@store'],
                                    'class' => 'form'
                                ])
                            !!}
                            <div class="row">
                            	<div class="col-12">
                            		<!-- Name -->
                            		{!!
                                        Form::text(
                                            'name',
                                            null,
                                            [
                                                'id' => 'name',
                                                'class' => 'form-control '.($errors->has('name') ? 'is-invalid':''),
                                                'placeholder' => 'Name',
                                                'aria-describedby' => 'name',
                                                'required' => true,
                                                'tabindex' => '1'
                                            ]
                                        )
                                    !!}
                                    {!! Form::label('name', 'Name') !!}

                                    <!-- GSTIN -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::text(
                                                'gstin',
                                                null,
                                                [
                                                    'id' => 'gstin',
                                                    'class' => 'form-control '.($errors->has('gstin') ? 'is-invalid':''),
                                                    'placeholder' => 'GSTIN',
                                                    'aria-describedby' => 'gstin',
                                                    'required' => true,
                                                    'tabindex' => '2'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('gstin', 'GSTIN') !!}
                                    </div>

                                    <!-- State -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::text(
                                                'state',
                                                null,
                                                [
                                                    'id' => 'state',
                                                    'class' => 'form-control '.($errors->has('state') ? 'is-invalid':''),
                                                    'placeholder' => 'State',
                                                    'aria-describedby' => 'state',
                                                    'required' => true,
                                                    'tabindex' => '3'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('state', 'State') !!}
                                    </div>

                                    <!-- Country -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::text(
                                                'country',
                                                null,
                                                [
                                                    'id' => 'country',
                                                    'class' => 'form-control '.($errors->has('country') ? 'is-invalid':''),
                                                    'placeholder' => 'Country',
                                                    'aria-describedby' => 'country',
                                                    'required' => true,
                                                    'tabindex' => '4'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('country', 'Country') !!}
                                    </div>


                                     <!-- Pincode -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::text(
                                                'pincode',
                                                null,
                                                [
                                                    'id' => 'pincode',
                                                    'class' => 'form-control '.($errors->has('pincode') ? 'is-invalid':''),
                                                    'placeholder' => 'Pincode',
                                                    'aria-describedby' => 'pincode',
                                                    'required' => true,
                                                    'tabindex' => '5'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('pincode', 'Pincode') !!}
                                    </div>

                                    <!-- storeAdmin -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::select(
                                                'storeadmin_id',
                                                $storeAdmins,
                                                null,
                                                [
                                                    'id' => 'storeadmin_id',
                                                    'class' => 'form-control '.($errors->has('storeadmin_id') ? 'is-invalid':''),
                                                    'placeholder' => 'Select Store Admin',
                                                    'aria-describedby' => 'storeadmin_id',
                                                    'required' => true,
                                                    'tabindex' => '3'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('storeadmin_id', 'Store Admin') !!}
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-outline-warning" href="{{ route('storeclinic.index') }}">
                                            Cancel
                                        </a>
	                                </div>

                            	</div>
                            </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
