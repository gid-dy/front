<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Store;
use Validator;
use Image;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

             if(empty($data['store_id'])){
                 return redirect()->back()->with('flash_message_error', 'Select Under category option!');
             }
             if (Product::where('product_code', $request->product_code)->exists()){
                return redirect()->back()->with('flash_message_error', 'Product code already exists!');
            }
            if(empty($data['price'])){
                return redirect()->back()->with('flash_message_error', 'Price cannot be empty!');
            }

            $validator = Validator::make($request->all(), [
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'product_code' => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $products = new Product;
            $products->store_id = $data['store_id'];
            $products->product_name = $data['product_name'];
            $products->product_code = $data['product_code'];
            if (!empty($data['description'])) {
                $products->description = $data['description'];
            }else{
                $products->description = '';
            }
            $products->price = $data['price'];
            $products->stock = $data['stock'];

             //upload image
             if($request->hasFile('image')){
                 $image_tmp = $request->file('image');
                 if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                    //store image name in tours table
                    $products->image =$filename;
                 }

            }
             //dd($products);
            $products->save();
            return redirect('/view-products')->with('flash_message_success','Product has been added successfully!');
        }
        $stores = Store::get();
        return view('admin.products.add')->with(compact('stores'));
    }

    public function viewProducts()
    {
        $product = Product::get();

        return view('admin.products.view_products')->with(compact('product'));
    }

    public function editProduct(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                }
            }else{
                $filename = $data['current_image'];
            }

            Product::where(['id'=>$id])->update([
                'store_id'=>$data['store_id'],
                'product_name'=>$data['product_name'],
                'description'=>$data['description'],
                'product_code'=>$data['product_code'],
                'price'=>$data['price'],
                'stock'=>$data['stock'],
                'image'=>$filename,
            ]);
            return redirect()->back()->with('flash_message_success', 'Product has been updated Successfully');
        }
        $productDetails = Product::where(['id'=>$id])->first();
        $stores = Store::get();
        $stores_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($stores as $store) {
            if($store->id==$productDetails->store_id){
                $selected ="selected";
            }else{
                $selected = " ";
            }
            $stores_dropdown .= "<option value='".$store->id."' ".$selected.">".$store->name."</option>";
        }
        return view('admin.products.edit_product')->with(compact('productDetails','stores_dropdown'));
    }

    public function destroyProduct($id)
    {
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully!');
    }
}
