@extends('layouts.app')

@section('title')
    Hapus Category | Catshop Admin
@endsection

@section('content')
    <h3>Hapus Transaction</h3>
    <div class="form-login">
        <h4>Ingin Menghapus Data ?</h4>
        <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin: 20px auto;">
            <a href={{ url('/transaction/destroy/' . $transaction->id_transaction) }}>
                Yes
            </a>
        </button>
        <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%; margin: 20px auto;">
            <a href="/transaction">
                No
            </a>
        </button>
    </div>
@endsection
