@extends('layouts.app')

@section('title')
    Transaction | Catshop Admin
@endsection

@section('content')
    <h3>Transaction</h3>
    <button type="button" class="btn btn-tambah">
        <a href="/transaction/tambah">Tambah Data</a>
    </button>
    <table class="table-data">
        <thead>
            <tr>
                <th style="width: 20%">Nama</th>
                <th>Jenis Kucing</th>
                <th style="width: 20%">Harga</th>
                <th style="width: 20%">Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->nama }}</td>
                    <td>{{ $transaction->category->nama }}</td>
                    <td>Rp. {{ number_format($transaction->harga) }}</td>
                    <td>{{ $transaction->tanggal }}</td>
                    <td>
                        <a href="/transaction/edit/{{ $transaction->id_transaction }}">Edit</a>
                        <a href="/transaction/hapus/{{ $transaction->id_transaction }}">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
