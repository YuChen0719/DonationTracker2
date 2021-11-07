<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                @if ($flag == 'admin' || $flag == 'Admin')
                    <a href="{{ url('/category/create') }}"
                        class="float-right no-underline bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center ">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Add new Category</span>
                    </a>
                @endif
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <th scope="col" class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if (!empty($categories))
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $counter }}</th>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if (empty($category->description))
                                        {{ "-" }}
                                    @else
                                        {{ $category->description }}
                                    @endif
                                </td>
                                @if ($flag == 'admin' || $flag == 'Admin')
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <a href="{{ route('category.edit',$category->id) }}">
                                            <i class="fas fa-edit"></i>
                                            <span><strong>Edit</strong></span>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No data to display.</td>
                        </tr>         
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>