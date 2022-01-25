<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // function index disini untuk menampilkan pada bagian yang akan dilihat user
    public function index(){
        $prod = Product::latest()->paginate(4);
        return view('user.index', compact('prod'));
    }

    //function ini untuk menampilkan list product dari sisi tim internal
    public function listForInternal(){
        $prod = Product::all();
        return view('product.index', compact('prod'));
    }

    public function create()
    {
        $option = Category::all();
        return view('product.input', compact('option'));
    }


    public function store(Request $request)
{
    $this->validate($request, [
        'image'     => 'required|image|mimes:png,jpg,jpeg',
        'nama'     => 'required',
        'desk'   => 'required',
        'harga'   => 'required',
        'kategori'   => 'required',
    ]);

    $cek = Product::where('nama_product','=',$request->nama)->count();
    if($cek > 0){
        return redirect()->route('product.index')->with(['error' => 'Product dengan nama tersebut sudah ada']);
    }else{

    //upload image
    $image = $request->file('image');
    $image->storeAs('public/product', $image->hashName());

    $prod = Product::create([
        'image'         => $image->hashName(),
        'nama_product'  => $request->nama,
        'deskripsi'     => $request->desk,
        'harga'         => $request->harga,
        'nama_kategori' => $request->kategori
    ]);

    if($prod){
        //redirect dengan pesan sukses
        return redirect()->route('product.index')->with(['success' => 'Product berhasil ditambahkan']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('product.index')->with(['error' => 'Gagal menambah data product']);
    }
    }
}



}
