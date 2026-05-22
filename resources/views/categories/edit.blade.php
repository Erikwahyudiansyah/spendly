<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Name
                            </label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $category->name) }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm">

                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Type
                            </label>
                            <select name="type" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="income" {{ old('type', $category->type) === 'income' ? 'selected' : '' }}>
                                    Income
                                </option>
                                <option value="expense" {{ old('type', $category->type) === 'expense' ? 'selected' : '' }}>
                                    Expense
                                </option>
                            </select>

                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('categories.index') }}"
                               class="px-4 py-2 bg-gray-200 rounded-md">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>