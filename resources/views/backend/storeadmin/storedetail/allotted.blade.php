<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          	{{Auth::user()->name}}  {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table>
                       <thead>
                           <tr>
                               <th>Sr.no</th>
                               <th>Name</th>
                               <th>Store</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($user->storeclinics as $index => $storeclinic)
                           <tr>
                                <th scope="row">
                                    {{ $index + 1 }}
                                </th>
                                <th>
                                    {{ $storeclinic->storeadmin->name }}
                                </th>
                                <th>
                                    {{ $storeclinic->name }}
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
