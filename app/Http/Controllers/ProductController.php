<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SEO;
use App\Models\Variation;
use App\Models\Image;
use App\Models\Stock;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
    	$product->name = Request('productName');
    	$product->category = Request('category');
    	$product->videoLink = Request('videoLink');
    	$product->price = Request('price');
    	$product->salePrice = Request('salePrice');
    	$product->details = Request('productDetails');
        $product->save();

        $product = Product::latest()->first();
        $seo = new SEO();
    	$seo->title = Request('seoTitle');
    	$seo->description = Request('seoDescription');
        $seo->product_id = $product->id;
        $seo->save();

        for ($i=0; $i<count(Request('colors')); $i++) {
            $variation = new Variation();
            $variation->product_id = $product->id;
            $variation->color = Request('colors')[$i]["color"];
            $variation->save();

            $variation = Variation::latest()->first();

            for($j=0; $j<count(Request('colors')[$i]["products"]); $j++){
                $stock = new Stock();
                $stock->variation_id = $variation->id;
                $stock->size = Request('colors')[$i]["products"][$j]["size"];
                $stock->quantity = Request('colors')[$i]["products"][$j]["quantity"];
                $stock->save();
            }

            for($j=0; $j<count(Request('colors')[$i]["images"]); $j++){
                $image = new Image();
                $image->variation_id = $variation->id;
                $image->name = Request('colors')[$i]["images"][$j]["name"];
                $image->save();
            }
        }
        
        
        return response($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function imageStore(Request $request){
        $path = public_path('tmp/uploads');
      
        if (!file_exists($path)) {
          mkdir($path, 0777, true);
        }
      
        $file = $request->file('image');
      
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
      
        $file->move($path, $name);
      
        return ['name'=>$name];
      }

}
