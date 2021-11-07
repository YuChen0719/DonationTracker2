<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Charity') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">

                <form method="POST" action="{{ route('post_create_charity') }}">
                    @csrf

                    <div class="mt-4">
                        <x-jet-label for="CharityName" value="Charity Name" />
                        <x-jet-input id="CharityName" class="block mt-1 w-full" type="text" name="name"
                            value="{{ old('name') }}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="Description" />
                        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                            value="{{ old('description') }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="address" value="Address" />
                        <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                            value="{{ old('address') }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="phone" value="Phone Number" />
                        <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            value="{{ old('phone') }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="postal_code" value="Postal Code" />
                        <x-jet-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                            value="{{ old('postal_code') }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="city" value="City" />
                        <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city"
                            value="{{ old('city') }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="country" value="Country" />
                        <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country"
                            value="{{ old('country') }}" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Create') }}
                        </x-jet-button>
                    </div>
                </form>

                @if(Session::has('message'))
                <div class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>