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
                	<div class="add-btn">
                        <a href="{{ route('storeadmin.create') }}">
                		  <button class="btn" style="border: 1px solid #dddddd; margin: 5px; float: right; padding: 5px; border-radius: 5px;">Add Store Admin</button>
                        </a>
                	</div>
                    <table>
						<tr>
						   <th>Sr.no</th>
						   <th>Name</th>
						   <th>Email</th>
						   <th>Phone</th>
						</tr>
						<tbody>
                            @foreach($storesAdmin as $index => $storeAdmin)
                            <tr>
                                <th scope="row">
                                    {{ $index + $storesAdmin->firstItem() }}
                                </th>
                                <th>
                                    {{$storeAdmin->name}}
                                </th>
                                <th>
                                    {{$storeAdmin->email}}
                                </th>
                                <th>
                                    {{$storeAdmin->phone_number}}
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
