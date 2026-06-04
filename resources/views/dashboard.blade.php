<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-500">Total Income</p>
                        <h3 class="mt-2 text-2xl font-bold text-green-600">
                            Rp {{ number_format($totalIncome, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-500">Total Expense</p>
                        <h3 class="mt-2 text-2xl font-bold text-red-600">
                            Rp {{ number_format($totalExpense, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-500">Balance</p>
                        <h3 class="mt-2 text-2xl font-bold text-blue-600">
                            Rp {{ number_format($balance, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">
                            Recent Transactions
                        </h3>

                        <a href="{{ route('transactions.index') }}"
                           class="text-blue-600 hover:underline">
                            View All
                        </a>
                    </div>

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="py-3 text-left">Title</th>
                                <th class="py-3 text-left">Category</th>
                                <th class="py-3 text-left">Type</th>
                                <th class="py-3 text-left">Amount</th>
                                <th class="py-3 text-left">Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($recentTransactions as $transaction)
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500">
                                        Belum ada transaksi.
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