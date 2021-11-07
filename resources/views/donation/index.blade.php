
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('donation.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Donation</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>

                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Donor Number
                                    </th>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th scope="col"  width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Value
                                    </th>
                                    @if (auth()->user()->user_type == "admin")
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Charity
                                    </th>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active Status
                                    </th>
                                    @endif
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($donations as $donation)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $donation->donor_number }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $donation->category }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $donation->amount }}
                                        </td>
                                        @if (auth()->user()->user_type == "admin")
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $donation->charity_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             @if ($donation->Active)
                                                 <span style="color: green">Active</span>
                                             @else
                                             <span style="color: orangered">Inactive</span>
                                             @endif
                                        </td>
                                        @endif

                                        <td class=" py-4 whitespace-nowrap text-sm font-medium">
                                            {{-- <a href="{{ route('donation.show', $donation->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> --}}
                                            <a href="{{ route('edit_donation', ['id'=>$donation->id ]) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

                                            @if (auth()->user()->user_type == "admin" && $donation->Active==false)
                                            <a href="{{ route('activate_donation', ['id'=>$donation->id ]) }}" class="text-indigo-600 hover:text-indigo-900">Activate</a>
                                            @elseif ($donation->Active==true)
                                            <a href="{{ route('deactivate_donation', ['id'=>$donation->id ]) }}" class="text-indigo-600 hover:text-indigo-900">Deactivate</a>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
