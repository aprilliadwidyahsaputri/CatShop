@extends('layouts.app')

@section('title')
Categories | Catshop Admin
@endsection

@section('content')
<h3>Categories</h3>
<button type="button" class="btn btn-tambah">
  <a href="/category/tambah">Tambah Data</a>
</button>
<button type="button" class="btn">
  <a href="">Cetak</a>
</button>
<table class="table-data">
  <thead>
    <tr>
      <th>Photo</th>
      <th>Categories</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $category)
    <tr>
      <td><img src="{{ asset('img_categories/' . $category->gambar)  }}" alt="" width="300px"></td>
      <td>{{ $category->nama }}</td>
      <td>Rp. {{ number_format($category->harga) }}</td>
      <td>
        <a href="/category/edit/{{ $category->id_categories }}">Edit</a>
        <a href="/category/hapus/{{ $category->id_categories }}">Hapus</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4" align="center">Tidak ada data</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection
