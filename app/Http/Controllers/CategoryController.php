<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categories()
    {
        // Mengambil semua data kategori
        $categories = Category::all();


        return view('spv.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'name' => 'required|string|max:255', // Pastikan nama kategori wajib diisi dan berupa string
        ]);

        // Menyimpan data kategori baru ke dalam tabel Category
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('spv.category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('spv.category.destroy')->with('succes', 'Category Berhasil Dihapus');
    }
}
