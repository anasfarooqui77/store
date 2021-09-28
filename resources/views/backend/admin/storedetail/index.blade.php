<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Storeclinic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	<div class="add-btn">
                        <a href="{{ route('storeclinic.create') }}">
                		  <button class="btn" style="border: 1px solid #dddddd; margin: 5px; float: right; padding: 5px; border-radius: 5px;">Add Store</button>
                        </a>
                	</div>
                    <table>
						<tr>
						   <th>Sr.no</th>
						   <th>Name</th>
						   <th>GSTIN</th>
						   <th>State</th>
						   <th>Country</th>
						   <th>State</th>
						   <th>PinCode</th>
						</tr>
                        <tbody>
                            @foreach($storeclinics as $index => $storeclinic)
                            <tr>
                                <th scope="row">
                                    
                                </th>
                                <th>
                                    {{$storeclinic->name}}
                                </th>
                                <th>
                                   {{$storeclinic->gstin}}
                                </th>
                                <th>
                                    {{$storeclinic->state}}
                                </th>
                                <th>
                                    {{$storeclinic->country}}
                                </th>
                                <th>
                                    {{$storeclinic->state}}
                                </th>
                                <th>
                                    {{$storeclinic->pincode}}
                                </th>
                            </tr>
                            @endforeach           
                        </tbody>
						
					</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
