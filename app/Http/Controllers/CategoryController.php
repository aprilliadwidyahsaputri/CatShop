<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('categories.categories-entry');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $tujuan_upload = 'img_categories';
        $gambar->move($tujuan_upload, $nama_gambar);

        Category::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $nama_gambar,
        ]);

        return redirect('/category');
    }

    public function edit($id_categories)
    {
        $category = Category::find($id_categories);
        return view('categories.categories-edit', compact('category'));
    }

    public function update(Request $request, $id_categories)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $category = Category::find($id_categories);

        if($request->hasFile('gambar')){

            // File::delete('img_categories/'.$category->gambar);
            File::delete('img_categories/'.$category->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_categories';
            $gambar->move($tujuan_upload, $nama_gambar);
            $category->gambar = $nama_gambar;
        }

        $category->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect('/category');
    }

    public function delete($id_categories)
    {
        $category = Category::find($id_categories);
        return view('categories.categories-hapus', compact('category'));
    }

    public function destroy($id_categories)
    {
        $category = Category::find($id_categories);
        File::delete('img_categories/'.$category->gambar);
        $category->delete();
        return redirect('/category');
    }

    public function cetak()
    {
        $categories = Category::all();
        $pdf = Pdf::loadview('categories.categories-cetak', compact('categories'));
        return $pdf->download('laporan-categories.pdf');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'category_id', 'id_categories');
    }



}

