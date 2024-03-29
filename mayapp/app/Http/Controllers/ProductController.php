<?php

namespace App\Http\Controllers;

use App\Product_model;
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
        //
        $products=Product_model::paginate(5);
        return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'price'=>'required',
            'count'=>'required'

        ]);
        Product_model::create($request->all());
        return redirect()->route('product.index')->with('success','Product Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\productModel  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product_model::findOrFail($id);
        return view('admin.show',compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productModel  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product_model::findOrFail($id);
        return view('admin.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productModel  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'price'=>'required',
            'count'=>'required'
        ]);
        Product_model::findOrFail($id)->update($request->all());
        return redirect()->route('product.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productModel  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product_model::findOrFail($id)->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
