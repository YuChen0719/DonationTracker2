<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Donation') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('donation.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('post_edit_donation', $donation->id) }}">
                    @csrf


                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6 ">
                            <label for="donator" class="block font-medium text-sm text-gray-700 ">Donator</label>
                            <select type="text" name="donator" id="donator" type="text" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="-1" >Select a Donator...</option>
                                @foreach ($donors as $donor)
                                <option value="{{ $donor->donor_number}}" {{$donation->Donator == $donor->donor_number ? 'selected="selected"': '' }}>{{ $donor->donor_number}} - {{$donor->name}} </option>
                                @endforeach
                            </select>
                            {{-- @error('donator')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="category" class="block font-medium text-sm text-gray-700">Category</label>
                            <select type="text" name="category" id="category" type="text" class="form-select rounded-md shadow-sm mt-1 block w-full"
                                 required >
                                   <option value="None" >Select a Category...</option>

                                @foreach ($categories as $category)
                                <option value="{{ $category->name}}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                            {{-- @error('target')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="value" class="block font-medium text-sm text-gray-700">Value</label>
                            <input type="text" name="value" id="value" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $donation->Value }}" required />
                            {{-- @error('value')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Update') }}
                            </button>
                        </div>
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
