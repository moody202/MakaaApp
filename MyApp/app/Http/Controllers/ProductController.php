<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =Product::latest()->paginate(10);
        return view('components.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price' =>'required',
            'description' =>'required',
            'comment' =>'required',
        ]);

        $product= new Product;
        $product->name =$request->input('name');
        $product->price =$request->input('price');
        $product->description =$request->input('description');
        $product->comment =$request->input('comment');
        $product->save();
        return redirect('products')->with('success','product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return view('components.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view('components.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required',
            'price' =>'required',
            'description' =>'required',
            'comment' =>'required',
        ]);

        $product=Product::find($product);
        $product->name =$request->input('name');
        $product->price =$request->input('price');
        $product->description =$request->input('description');
        $product->comment =$request->input('comment');
        $product->save();
        return redirect('products')->with('success','product Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $product=Product::find($product);
        $product-> delete();
        return redirect()->route('products.index')->with('success', 'Post Removed');

    }
}
