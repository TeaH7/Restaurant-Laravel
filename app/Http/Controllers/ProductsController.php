<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->paginate(20);
        return view('admin.products.index' , ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create' , ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'name' => 'required|max:20',
            'ingredients' => 'required|max:50',
            'price' => 'required',
            'description' => 'required|max:100',
            'image' => 'required|image' ,
            'category_id' => 'required',
            'is_special' => 'required'
        ]);

        $data['slug'] = Str::slug($data['name'] , "-");
        $data['image'] = request()->file('image')->store('/images');

        Products::create($data);
        return redirect()->route('admin-products')->with('success' , 'Added succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {

        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $categories = Category::all();
        return view('admin.products.edit' , [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {

        $data = $request->validate([
            'name' => 'max:20',
            'ingredients' => 'max:50',
            'price' => '',
            'description' => 'max:100',
            'image' => 'image' ,
            'category_id' => '',
            'is_special' => ''
        ]);


        if($request->file('image')){
            $data['image'] = request()->file('image')->store('/images');
        }


        $data['slug'] = Str::slug($data['name'] , "-");

        $products->update($data);
        return redirect()->route('admin-products')->with('success' , 'Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {

        $product->delete();
        return redirect()->route('admin-products')->with('success' , 'Deleted succesfully');
    }
}
