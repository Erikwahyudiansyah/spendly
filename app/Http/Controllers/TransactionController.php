<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = transaction::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();
        
        return view('transactions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1'],
            'type' => ['required', 'in:income,expense'],
            'category_id' => ['required', 'exists:categories,id'],
            'transaction_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],
        ]);

        $category = Category::where('id', $request->category_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        Transaction::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'type' => $request->type,
            'transaction_date' => $request->transaction_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        if ($transaction -> user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();
        
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1'],
            'type' => ['required', 'in:income,expense'],
            'category_id' => ['required', 'exists:categories,id'],
            'transaction_date' => ['required', 'date'],
            'description' => ['nullable', 'string'],
        ]);

        $category = Category::where('id', $request->category_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $transaction->update([
            'category_id' => $category->id,
            'title' => $request->title,
            'amount' => $request->amount,
            'type' => $request->type,
            'transaction_date' => $request->transaction_date,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.'); 
    }
}
