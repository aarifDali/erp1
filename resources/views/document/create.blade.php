<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create '.$type->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-validation-errors class="mb-4" />
                <form action="{{ route('document.store', ['type'=>$type->slug])}}" method="POST">
                    @csrf
                    <div>
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus/>
                        @error('title')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="document_number" value="{{ __('Document Number') }}" />
                        <x-input id="document_number" class="block mt-1 w-full" type="text" name="document_number" :value="old('document_number')" />
                        @error('document_number')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>