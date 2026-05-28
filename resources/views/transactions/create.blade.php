<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Transaction
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Title
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm">

                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Amount
                            </label>

                            <input type="number"
                                   name="amount"
                                   value="{{ old('amount') }}"
                                   min="1"
                                   class="w-full border-gray-300 rounded-md shadow-sm">

                            @error('amount')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Type
                            </label>

                            <select name="type" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Select Type --</option>
                                <option value="income" {{ old('type') === 'income' ? 'selected' : '' }}>
                                    Income
                                </option>
                                <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>
                                    Expense
                                </option>
                            </select>

                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        @if ($categories->isEmpty())
                            <div class="mb-4 p-4 bg-yellow-100 text-yellow-700 rounded-md">
                                Belum ada category. Silakan buat category terlebih dahulu.
                                <a href="{{ route('categories.create') }}" class="underline font-semibold">
                                    Add Category
                                </a>
                            </div>
                        @endif

                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <label class="font-medium text-sm text-gray-700">
                                    Category
                                </label>

                                <a href="{{ route('categories.create') }}"
                                class="text-sm text-blue-600 hover:underline">
                                    Add New Category
                                </a>
                            </div>

                            <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Select Category --</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }} - {{ ucfirst($category->type) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Transaction Date
                            </label>

                            <input type="date"
                                   name="transaction_date"
                                   value="{{ old('transaction_date', date('Y-m-d')) }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm">

                            @error('transaction_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('transactions.index') }}"
                               class="px-4 py-2 bg-gray-200 rounded-md">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>