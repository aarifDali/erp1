<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-validation-errors class="mb-4" />
                <form action="{{ route('item.store')}}" method="POST">
                    @csrf
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus/>
                        @error('name')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" class="block mt-1 w-full" name="description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="price" value="{{ __('Price') }}" />
                        <x-input id="price" class="block mt-1 w-full" type="number" step="0.01" min="0" name="price" :value="old('price')" autofocus/>
                        @error('price')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="tax" value="{{ __('Tax') }}" />
                        <x-input id="tax" class="block mt-1 w-full" type="number" name="tax" :value="old('tax')" autofocus/>
                        @error('tax')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="hsn_code" value="{{ __('Hsn Code') }}" />
                        <x-input id="hsn_code" class="block mt-1 w-full" type="text" name="hsn_code" :value="old('hsn_code')" autofocus/>
                        @error('hsn_code')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="sac_code" value="{{ __('Sac Code') }}" />
                        <x-input id="sac_code" class="block mt-1 w-full" type="text" name="sac_code" :value="old('sac_code')" autofocus/>
                        @error('sac_code')
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