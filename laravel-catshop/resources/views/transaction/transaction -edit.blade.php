@extends('layouts.app')

@section('title')
    Edit Transaction | Catshop Admin
@endsection

@section('content')
    <h3>Input Transaction</h3>
    <div class="form-login">
        <form action="{{ url('/transaction/update', $transaction->id_transaction) }}" method="post">
            @csrf
            @method('PUT')
            <label for="nama">Nama</label>
            <input class="input" type="text" name="nama" id="nama" placeholder="Nama"
                value="{{ old('nama', $transaction->nama) }}" />
            @error('nama')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="category_id">Jenis Kucing</label>
            <select class="input" name="category_id" id="category_id">
                <option value="">Pilih Jenis Kucing</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id_categories }}"
                        {{ old('category_id', $transaction->category_id) == $category->id_categories ? 'selected' : '' }}>
                        {{ $category->nama }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="harga">Harga</label>
            <input class="input" type="text" name="harga" id="harga" placeholder="Harga"
                value="{{ old('harga', $transaction->harga) }}" />
            @error('harga')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <label for="tanggal">Tanggal</label>
            <input class="input" type="date" name="tanggal" id="tanggal" style="margin-bottom: 20px"
                value="{{ old('tanggal', $transaction->tanggal) }}" />
            @error('tanggal')
                <p style="font-size: 10px; color: red">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
                Edit
            </button>
        </form>
    </div>
@endsection
