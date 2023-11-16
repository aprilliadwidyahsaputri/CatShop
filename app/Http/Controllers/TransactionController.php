<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.transaction', compact('transactions'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('transaction.transaction-entry', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'category_id' => 'required',
            'harga' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Transaction::create([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/transaction');
    }

    public function edit($id_transaction)
    {
        $categories = Category::all();
        $transaction = Transaction::find($id_transaction);
        return view('transaction.transaction-edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, $id_transaction)
    {
        $this->validate($request, [
            'nama' => 'required',
            'category_id' => 'required',
            'harga' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $transaction = Transaction::find($id_transaction);

        $transaction->update([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/transaction');
    }

    public function delete($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        return view('transaction.transaction-hapus', compact('transaction'));
    }

    public function destroy($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $transaction->delete();
        return redirect('/transaction');
    }

}

