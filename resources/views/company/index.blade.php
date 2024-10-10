<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4">
                <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full" href="{{ route('company.create') }}">Create</a><br>
            </div>
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full rounded text-sm">
                    <thead class="bg-gray-300 ">
                        <tr>
                            <th class="text-left border-b py-2">Name</th>
                            <th class="text-left border-b py-2">Email</th>
                            <th class="text-left border-b py-2">Mobile</th>
                            <th class="text-left border-b py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($companies as $company)
                        <tr>
                            <td class="border-b py-2">{{ $company->name }}</td>
                            <td class="border-b py-2">{{ $company->email }}</td>
                            <td class="border-b py-2">{{ $company->mobile }}</td>
                            <td class="border-b py-2">
                                <a href="{{ route('company.edit', $company->id)}}">Edit</a>
                                <form action="{{ route('company.destroy', $company->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700">Delete</button>                              
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>