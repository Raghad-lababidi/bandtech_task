<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {
    }

    public function index()
    {
      try {
          $products = $this->productService->all();
          return $this->sendResponse('Products retrieved successfully',$products);
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }

    public function store(Request $request)
    {
        //Validate product data
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'price' => 'required|numeric',
            'slug' => 'required|string'
        ]);

        try {
          $product = $this->productService->create($data);
          return $this->sendResponse('Product stored successfully',$product);
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }

    public function show($id)
    {
      try {
          $product = $this->productService->find($id);
          return $this->sendResponse('Product retrieved successfully',$product);
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'image' => 'string',
            'price' => 'numeric',
            'slug' => 'string'
        ]);

      try {
          $product = $this->productService->update($data, $id);
          return $this->sendResponse('Product updated successfully',$product);
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }

    public function destroy($id)
    {
      try {
          $this->productService->delete($id);
          return $this->sendResponse('Product deleted successfully');
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }

    public function productsByUserType()
    {
      try {
          $products = $this->productService->productsByUserType();
          return $this->sendResponse('Products retrieved successfully',$products);
      } catch (Exception $e) {
         return $this->sendError( $ex->getMessage(),$ex->getCode());
      }
    }
}
