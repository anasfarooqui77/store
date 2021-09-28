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
                			<div class="add-btn">
		                        <a href="{{ route('storeadmin.create') }}">
		                		  <button class="btn" style="border: 1px solid #dddddd; margin: 5px; float: right; padding: 5px; border-radius: 5px;">Add Store Admin</button>
		                        </a>
		                	</div>
                		</div>
                	</div>
                    <div class="row">
                    	<div class="col-md-12">
                    		{!!
                                Form::open([
                                    'method' => 'Post', 
                                    'action' => ['App\Http\Controllers\Backend\StoresAdminController@store'],
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

                                    <!-- Email -->
                                    <div class="col-6">
                                    	 {!!
                                            Form::email(
                                                'email',
                                                null,
                                                [
                                                    'id' => 'email',
                                                    'class' => 'form-control '.($errors->has('email') ? 'is-invalid':''),
                                                    'placeholder' => 'Email',
                                                    'aria-describedby' => 'email',
                                                    'required' => true,
                                                    'tabindex' => '2'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('email', 'Email') !!}
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-6">
                                    	{!!
                                            Form::text(
                                                'phone_number',
                                                null,
                                                [
                                                    'id' => 'phone_number',
                                                    'class' => 'form-control '.($errors->has('phone_number') ? 'is-invalid':''),
                                                    'placeholder' => 'Phone Number',
                                                    'aria-describedby' => 'phone_number',
                                                    'required' => true,
                                                    'tabindex' => '3'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('phone_number', 'Phone Number') !!}
                                    </div>

                                     <!-- Password -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::password(
                                                'password',
                                                [
                                                    'id' => 'password',
                                                    'class' => 'form-control '.($errors->has('password') ? 'is-invalid':''),
                                                    'placeholder' => 'Password',
                                                    'aria-describedby' => 'password',
                                                    'required' => true,
                                                    'tabindex' => '4'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('password', 'Password') !!}
                                    </div>

                                     <!-- Confirm Password -->
                                    <div class="col-6 form-label-group">
                                        {!!
                                            Form::password(
                                                'password_confirmation',
                                                [
                                                    'id' => 'password_confirmation',
                                                    'class' => 'form-control '.($errors->has('password_confirmation') ? 'is-invalid':''),
                                                    'placeholder' => 'Confirm Password',
                                                    'aria-describedby' => 'password_confirmation',
                                                    'required' => true,
                                                    'tabindex' => '5'
                                                ]
                                            )
                                        !!}
                                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-outline-warning" href="{{ route('storeadmin.index') }}">
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
