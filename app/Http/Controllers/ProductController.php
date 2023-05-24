<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $prods = Product::get();
        if(request()->segment(1) == 'api') return response()->json([
            "error" => false,
            "list" => $prods,
        ]);
        return view('product.index', ['list' => $prods]);
    }

    public function create()
    {
        return view('product.form', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'product'
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000'
        ]);

        $prod = new Product;
        $prod->name = $request->name;
        $prod->price = $request->price;
        $prod->save();

        //Session::flash('msg', 'Tambah berhasil');

        return redirect('/product')->with('msg', 'Tambah berhasil');
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function edit($id)
    {
        return view('product.form', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "product/$id",
            'data' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000'
        ]);

        $prod = Product::find($id);
        $prod->name = $request->name;
        $prod->price = $request->price;
        $prod->save();
        return redirect('/product')->with('msg', 'Edit berhasil');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        // atau
        /* $prod = Product::find($id);
        $prod->delete(); */
        return redirect('/product')->with('msg', 'Hapus berhasil');
    }

}