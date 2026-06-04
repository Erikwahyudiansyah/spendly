<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transactions
            </h2>

            <a href="{{ route('transactions.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Add Transaction
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('transactions.index') }}" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700">
                                    Search
                                </label>
                                <input type="text"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Search title.."
                                        class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>   
                                <label class="block mb-1 text-sm font-medium text-gray-700">
                                    Type
                                </label>
                                <select name="type" class="w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">All Types</option>
                                    <option value="income" {{ request('type') === 'income' ? 'selected' : '' }}>
                                        Income
                                    </option>
                                    <option value="expense" {{ request('type') === 'expense' ? 'selected' : '' }}>
                                        Expense
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700">
                                    Category
                                </label>
                                <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">ALL Category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-700">
                                    Date From
                                </label>
                                <input type="date"
                                        name="date_from"
                                        value="{{ request('date_from') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>  
                                <label class="block mb-1 text-sm font-medium text-gray-700">
                                    Date To
                                </label>
                                <input type="date"
                                        name="date_to"
                                        value="{{ request('date_to') }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <div class ="mt-4 flex gap-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md
                                hover:bg-blue-700">
                                Filter
                            </button>
                        
                            <a href="{{ route('transactions.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">
                                Reset
                            </a>
                        </div>   
                    </form>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-3 text-left">Title</th>
                                <th class="py-3 text-left">Category</th>
                                <th class="py-3 text-left">Type</th>
                                <th class="py-3 text-left">Amount</th>
                                <th class="py-3 text-left">Date</th>
                                <th class="py-3 text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr class="border-b">
                                    <td class="py-3">
                                        {{ $transaction->title }}
                                    </td>

                                    <td class="py-3">
                                        {{ $transaction->category->name ?? '-' }}
                                    </td>

                                    <td class="py-3">
                                        @if ($transaction->type === 'income')
                                            <span class="px-2 py-1 text-sm bg-green-100 text-green-700 rounded">
                                                Income
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-sm bg-red-100 text-red-700 rounded">
                                                Expense
                                            </span>
                                        @endif
                                    </td>

                                    <td class="py-3">
                                        Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </td>

                                    <td class="py-3">
                                        {{ $transaction->transaction_date->format('d M Y') }}
                                    </td>

                                    <td class="py-3 text-right">
                                        <a href="{{ route('transactions.edit', $transaction) }}"
                                           class="text-blue-600 hover:underline mr-3">
                                            Edit
                                        </a>

                                        <form action="{{ route('transactions.destroy', $transaction) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus transaction ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-4 text-center text-gray-500">
                                        Belum ada transaction.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>