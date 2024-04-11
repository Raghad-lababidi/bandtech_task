<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data,$id)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete ($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function productsByUserType()
    {
        // Get all active products
        $products = Product::where('is_active', true)->get();

        //set the price according to user type
        foreach ($products as $product){
            $product->price = $this.getPriceAttribute($product->price);
        }
        return $products;
    }

    public function getPriceAttribute($price)
    {
        // calculate the price based on the user's type
        switch(auth()->user()->type){
            case 'gold' :
                return $price * .80;   //20% off
                break;
            
            case 'silver' :
                 return $price * .90;  //10% off
                 break; 
                 
            case 'normal' :
                 return $price;       //normal price
                 break;     

        }
    }
}
