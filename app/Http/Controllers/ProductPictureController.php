<?php

namespace App\Http\Controllers;

use App\Models\ProductPicture;
use Illuminate\Http\Request;

class ProductPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_picture = ProductPicture::all();
        return [
            "status" => 1,
            "data" => $product_picture
        ];
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
        if (strcmp($request->picturefile, "x")!=0){
            $file = $request->picturefile;
            $image_parts = explode(",",$file);
            $image_base64 = base64_decode($image_parts[1]);
            $fn = explode('img/',$request->img);
            if (!is_dir('img/')) {
                // dir doesn't exist, make it
                mkdir('img/');
            }
            file_put_contents('img/' . $fn[1], $image_base64);
        }
        unset($request->picturefile); // delete picture file attribute
        $product_picture = ProductPicture::create($request->all());
        return [
            "status" => 1,
            "data" => $product_picture,
            "msg" => "Product picture added successfully"
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductPicture  $productPicture
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPicture $productPicture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductPicture  $productPicture
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPicture $productPicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductPicture  $productPicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPicture $productPicture)
    {
        $productPicture->update($request->all());

        return [
            "status" => 1,
            "data" => $productPicture,
            "msg" => "Product picture updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductPicture  $productPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPicture $productPicture)
    {
        $productPicture->delete();
        return [
            "status" => 1,
            "data" => $productPicture,
            "msg" => "Product picture deleted successfully"
        ];
    }
}
