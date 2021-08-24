<?php

namespace App\Http\Controllers;

use App\Facade\Paypal;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class AdminController extends Controller
{



    public function Logout(){
    	Auth::logout();
    	return  view('auth/login');

    }

    public function products(){
        $products = Product::orderBy('id', 'DESC')->get();
        return view('backend/products.product', compact('products'));
    }

    public function addNewProduct(){
        return view('backend/products.newproduct');
    }

    public function storeNewProduct(Request $request){
        $validatedData = $request->validate([
           'title' => 'required|string',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
             'thumbnail' => 'required|file'
        ]);

        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        $thumbnail = $request->file('thumbnail');
        $fileName = $thumbnail->getClientOriginalName();
        $fileExtension = $thumbnail->getClientOriginalExtension();
        $thumbnail->move('product-images', $fileName);
        $product->thumbnail = 'product-images/'. $fileName;
        $product->save();

        $notification = array([
            'message' => 'Product created successfully',
            'alert-type'=> 'success'
        ]);
        return redirect()->route('products')->with($notification);


    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('backend/products.editProducts', compact('product'));
    }

    public function updateProduct(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]+[\.[0-9][0-9]?$/',
            'thumbnail' => 'file'
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        if ($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $fileName = $thumbnail->getClientOriginalName();
            $thumbnail->move('product-images', $fileName);
            $product->thumbnail = 'product-images/'. $fileName;
            $product->save();
        }

        $notification = array([
            'message' => 'Product updated successfully',
            'alert-type'=> 'success'
        ]);
        return redirect()->route('products')->with($notification);
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();

        $notification = array([
            'message' => 'Product deleted successfully',
            'alert-type' => 'info'
        ]);

        return redirect()->back()->with($notification);
    }

}
