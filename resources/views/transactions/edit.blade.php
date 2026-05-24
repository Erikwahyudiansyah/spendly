<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Transaction
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Title
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title', $transaction->title) }}"
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
                                   value="{{ old('amount', $transaction->amount) }}"
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
                                <option value="income" {{ old('type', $transaction->type) === 'income' ? 'selected' : '' }}>
                                    Income
                                </option>
                                <option value="expense" {{ old('type', $transaction->type) === 'expense' ? 'selected' : '' }}>
                                    Expense
                                </option>
                            </select>

                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-sm text-gray-700">
                                Category
                            </label>

                            <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $transaction->category_id) == $category->id ? 'selected' : '' }}>
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
                                   value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}"
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
                                      class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $transaction->description) }}</textarea>

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
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>