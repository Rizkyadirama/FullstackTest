<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();
        return view('category.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'namaCategory'     => 'required'            
        ]);
                   
    
        $cat = Category::create([
            'nama_kategori'     => $request->namaCategory                     
        ]);
    
        if($cat){
            //redirect dengan pesan sukses
            return redirect()->route('category.index')->with(['success' => 'Kategori berhasil ditambah']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('category.index')->with(['error' => 'Gagal menambahkan kategori']);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required'
        ]);

        $cat = Category::findOrFail($id);
        $cat->update([
            'nama_kategori' => $request->nama
        ]);

        if($cat){
            return redirect()->route('category.index')->with(['success' => 'Kategori berhasil diupdate']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('category.index')->with(['error' => 'Kategori gagal diupdate']);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);

        $cat->delete();

        if($cat){
            //redirect dengan pesan sukses
            return redirect()->route('category.index')->with(['success' => 'Kategori berhasil dihapus']);
         }else{
           //redirect dengan pesan error
           return redirect()->route('category.index')->with(['error' => 'Kategori gagal dihapus']);
         }
       
    }
}
