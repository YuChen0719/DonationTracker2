<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <form method="POST" action="{{ route('category.update',$category->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control  col-6" id="Name" name="name" placeholder="Category Name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control col-6" id="description" rows="3" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Save Changes') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>