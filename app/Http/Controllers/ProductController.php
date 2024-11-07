<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    //
    public function index( Request $request ) {

        $perPage = $request->perPage ?? 4;
        $sortBy = $request->sortBy ?? 'name';
        $order = $request->order ?? 'asc';
        $search = $request->search;

        $products = Product::orderBy( $sortBy, $order )->simplePaginate( $perPage );

        return view( 'index', ['products' => $products] );
    }

    public function create( Request $request ) {
        return view( 'create' );
    }

    public function store( Request $request ) {

        // dd($request);

        $request->validate( [
            'product_id'  => 'required',
            'name'        => 'required',
            'description' => 'nullable',
            'price'       => 'required',
            'stock'       => 'nullable',
            'image'       => 'nullable',
        ] );

        Product::create( [
            "product_id"  => $request->input( 'product_id' ),
            "name"        => $request->input( 'name' ),
            "description" => $request->input( 'description' ),
            "price"       => $request->input( 'price' ),
            "stock"       => $request->input( 'stock' ),
            "image"       => $request->input( 'image' ),
        ] );

        return redirect()->route( 'products.index' )->with( 'success', 'Product created' );

    }

    public function show( $id ) {

        // $id = $request->id;

        $product = Product::findOrFail( $id );

        return view( 'show', compact( 'product' ) );
    }

    public function edit( $id ) {
        $product = Product::findOrFail( $id );

        return view( 'edit', compact( 'product' ) );
    }

    public function update( Request $request, $id ) {

        $request->validate( [
            'name'        => 'required',
            'description' => 'nullable',
            'price'       => 'required',
            'stock'       => 'nullable',
            'image'       => 'nullable',
        ] );

        $product = Product::findOrFail( $id );

        $product->update( [
            "name"        => $request->input( 'name' ),
            "description" => $request->input( 'description' ),
            "price"       => $request->input( 'price' ),
            "stock"       => $request->input( 'stock' ),
            "image"       => $request->input( 'image' ),
        ] );

        return redirect()->back()->with( 'success', 'Product Update Successfully' );
    }

    public function delete( $id ) {
        $product = Product::findOrFail( $id );
        $product->delete();
        return redirect()->back()->with( 'success', 'Product Deleted Successfully' );
    }
}
