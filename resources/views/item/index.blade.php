<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Items') }}
        </h2>
    </x-slot>

      
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create item')
                <div class="p-4">
                    <a class="float-right mb-3 px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full" href="{{ route('item.create') }}">Create</a><br>
                </div>
            @endcan
            
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="table-auto min-w-full rounded text-sm">
                    <thead class="bg-gray-300 ">
                        <tr>
                            <th class="text-left border-b py-2">Name</th>
                            {{-- <th class="text-left border-b py-2">Description</th>
                            <th class="text-left border-b py-2">HSN Code</th>
                            <th class="text-left border-b py-2">SAC Code</th> --}}
                            <th class="text-left border-b py-2">Price</th>
                            <th class="text-left border-b py-2">Tax</th>
                            <th class="text-left border-b py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($items as $item)
                        <tr>
                            <td class="border-b p-2">{{ $item->name }}</td>
                            {{-- <td class="border-b p-2">{{ $item->description }}</td>
                            <td class="border-b p-2">{{ $item->hsn_code }}</td>
                            <td class="border-b p-2">{{ $item->sac_code }}</td> --}}
                            <td class="border-b p-2">{{ $item->price }}</td>
                            <td class="border-b p-2">{{ $item->tax }}</td>
                            <td class="border-b p-2">
                                @can('create item')
                               <a href="{{ route('item.edit', $item->id)}}" style="display: inline-block;"> <x-tabler-edit class="inline-block hover:text-blue-500" /> </a>
                                @endcan         
                                @can('delete item')                       
                                    <form action="{{ route('item.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="text-red-700 inline"><x-tabler-trash class="inline-block"/></button>                              
                                    </form>
                                @endcan
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $items->links() }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>