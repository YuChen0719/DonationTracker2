<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Charity') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                @if($disabled==true)
                <div class="alert alert-danger">
                    You dont have privileges to edit this Charity data
                </div>
                @endif

                <form method="POST" action="{{ route('post_edit_charity',['id' => $charity->id]) }}" id="edit_form">
                    @csrf

                    <div class="mt-4">
                        <x-jet-label for="CharityName" value="Charity Name" />
                        <x-jet-input id="CharityName" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $charity->name }}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="Description" />
                        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                            value="{{  $charity->description }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="address" value="Address" />
                        <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                            value="{{ $charity->address }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="phone_number" value="Phone Number" />
                        <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone"
                            value="{{ $charity->phone }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="postal_code" value="Postal Code" />
                        <x-jet-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                            value="{{ $charity->postal_code }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="city" value="City" />
                        <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city"
                            value="{{ $charity->city }}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="country" value="Country" />
                        <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country"
                            value="{{ $charity->country }}" required />
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Update') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#edit_form :input").prop("disabled", "{{ $disabled }}");
    });
    </script>
</x-app-layout>