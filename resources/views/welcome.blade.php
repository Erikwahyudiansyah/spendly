<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spendly - Personal Expense Tracker</title>
    <meta name="description" content="Spendly adalah aplikasi pencatat pemasukan dan pengeluaran pribadi berbasis Laravel 12.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white">
    <header class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="text-2xl font-bold">Spendly</div>

        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-300 hover:text-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-sm font-semibold">
                    Register
                </a>
            @endauth
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-24 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <section>
            <p class="text-blue-400 font-semibold mb-4">Personal Expense Tracker</p>

            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                Kelola pemasukan dan pengeluaran dengan lebih mudah.
            </h1>

            <p class="text-gray-300 text-lg mb-8">
                Spendly membantu kamu mencatat transaksi, mengelola kategori, dan memantau saldo keuangan pribadi melalui dashboard yang sederhana.
            </p>

            <div class="flex gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 rounded-lg font-semibold hover:bg-blue-700">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 rounded-lg font-semibold hover:bg-blue-700">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-white/10 rounded-lg font-semibold hover:bg-white/20">
                        Login
                    </a>
                @endauth
            </div>
        </section>

        <section class="bg-white text-slate-900 rounded-2xl shadow-xl p-6">
            <div class="grid gap-4">
                <div class="p-5 bg-slate-100 rounded-xl">
                    <p class="text-sm text-slate-500">Total Income</p>
                    <h3 class="text-2xl font-bold text-green-600">Rp 9.000.000</h3>
                </div>

                <div class="p-5 bg-slate-100 rounded-xl">
                    <p class="text-sm text-slate-500">Total Expense</p>
                    <h3 class="text-2xl font-bold text-red-600">Rp 1.050.000</h3>
                </div>

                <div class="p-5 bg-slate-100 rounded-xl">
                    <p class="text-sm text-slate-500">Balance</p>
                    <h3 class="text-2xl font-bold text-blue-600">Rp 7.950.000</h3>
                </div>
            </div>
        </section>
    </main>

    <footer class="max-w-7xl mx-auto px-6 py-8 text-sm text-gray-400">
        © {{ date('Y') }} Spendly. Built with Laravel 12.
    </footer>
</body>
</html>