<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Vendor;
use Image;
use Validator;

class StoreController extends Controller
{
     public function create(Request $request)
     {
         if($request->isMethod('post')){
             $data = $request->all();
             $validator = Validator::make($request->all(), [

             ]);
             if($validator->fails()){
                 return redirect()->back()->withErrors($validator)->withInput();
             }

             $store = new Store;
             $store->name = $data['name'];
             $store->vendor_id = $data['vendor_id'];

             if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/stores/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                    //store image name in stores table
                    $store->image =$filename;

                }

            }
            //dd($store);
             $store->save();

             return redirect()->back()->with('flash_message_success', 'Store added Successfully!');
          }
          $vendors = Vendor::all();
         return view('admin.stores.add')->with(compact('vendors'));
     }

    public function viewStore(Request $request)
    {
        $stores = Store::get();
        return view('admin.stores.view_stores')->with(compact('stores'));
    }

    public function editStore(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/stores/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                }
            }else{
                $filename = $data['current_image'];
            }

            Store::where(['id'=>$id])->update([
                'name'=>$data['name'],
                'vendor_id'=>$data['vendor_id'],
                'image'=>$filename,
            ]);
            return redirect()->back()->with('flash_message_success', 'Store has been updated Successfully');
        }
        $storeDetails = Store::where(['id'=>$id])->first();
        $vendors = Vendor::get();
        $vendors_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($vendors as $vendor) {
            if($vendor->id==$storeDetails->vendor_id){
                $selected ="selected";
            }else{
                $selected = " ";
            }
            $vendors_dropdown .= "<option value='".$vendor->id."' ".$selected.">".$vendor->name."</option>";
        }
        return view('admin.stores.edit_store')->with(compact('storeDetails','vendors_dropdown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyStore($id)
    {
        Store::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Store has been deleted successfully!');
    }
}
