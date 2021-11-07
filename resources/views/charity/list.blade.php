<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $navName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-8">
                @if (($user->user_type == "admin" && $user->charity_id == null) || $user->user_type == "super_admin")
                <a href="{{ route('create_charity') }}"
                    class="float-right no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mb-3">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Add new Charity</span>
                </a>
                @endif
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Charity Name</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Postal Code</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @for($i=0; $i<$charities->count(); $i++)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{($i+1)}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->postal_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->city }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $charities[$i]->country }}</td>
                                <td class="text-blue-500 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('edit_charity',['id'=> $charities[$i]->id ]) }}"
                                        class="no-underline">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                                <td class="text-blue-500 py-4 whitespace-nowrap text-sm font-medium">
                                    @if ($charities[$i]->active == 1)
                                    <a href="{{ route('deactivate_charity',['id'=> $charities[$i]->id ]) }}"
                                        class="no-underline"
                                        onclick="return confirm('Are you sure want to deactivate church {{ $charities[$i]->name }}?')">
                                        <i class="fas fa-lock pr-1"></i>Deactivate
                                    </a>
                                    @elseif ($charities[$i]->active == 0)
                                    <a href="{{ route('activate_charity',['id'=> $charities[$i]->id ]) }}"
                                        class="no-underline"
                                        onclick="return confirm('Are you sure want to activate church {{ $charities[$i]->name }}?')">
                                        <i class="fas fa-unlock pr-1"></i>Activate
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>