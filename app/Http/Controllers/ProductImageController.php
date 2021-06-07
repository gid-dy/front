<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Image;
use App\Product;
use Image;


class ProductImageController extends Controller
{
    public function addImage(Request $request, $id = null)
    {
        $productDetails = Product::with('productimages')->where(['id'=>$id])->first();

        if($request->isMethod('post')){
            $data = $request->all();
           if($request->hasFile('image')){
            $files = $request->file('image');
               foreach($files as $file){
                //upload image
                 $image = new Product_Image;
                 $extension = $file->getClientOriginalExtension();
                 $fileName = rand(111,999999).'.'.$extension;

                 $large_image_path = 'images/backend_images/products/'.$fileName;

                 //Resize Images
                 Image::make($file)->save($large_image_path);

                 $image->image =$fileName;
                 $image->product_id = $data['product_id'];
                 $image->save();
               }
               return redirect('add-product-image/'.$id)->with('flash_message_success', 'Image has been added successfully');
            }
        }
        $productimages = Product_Image::where(['product_id' => $id])->get();
        $productimages = json_decode(json_encode($productimages));

        return view('admin.products.add_image')->with(compact('productDetails','productimages'));
    }

    public function deleteAltimage($id = null)
    {
        $productimage = Product_Image::where(['id'=>$id])->first();
        
        $large_image_path = 'images/backend_images/products/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$productimage->image)){
            unlink($large_image_path.$productimage->image);
        }

        Product_Image:: where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Image has been deleted successfully!');
    }
}
