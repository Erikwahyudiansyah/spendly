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