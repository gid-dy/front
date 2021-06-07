<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use App\Store;
use Validator;
use Illuminate\Http\Request;

class StoreLocationController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [

            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $location = new StoreLocation;
            $location->store_id = $data['store_id'];
            $location->lat = $data['lat'];
            $location->lng = $data['lng'];
            $location->save();

            return redirect()->back()->with('flash_message_success', 'Store Location added Successfully!');
         }
         $stores = Store::all();
        return view('admin.storeLocations.add')->with(compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewStoreLocation(Request $request)
    {
        $locations = StoreLocation::get();
        return view('admin.storeLocations.view_storelocations')->with(compact('locations'));
    }


    public function editStoreLocation(Request $request, $id=null)
    
        {
            if($request->isMethod('post')){
                $data = $request->all();
    
                
    
                StoreLocation::where(['id'=>$id])->update([
                    'store_id'=>$data['store_id'],
                    'lat'=>$data['lat'],
                    'lng'=>$data['lng'],
                ]);
                return redirect()->back()->with('flash_message_success', 'Store has been updated Successfully');
            }
            $storelocationDetails = StoreLocation::where(['id'=>$id])->first();
            $stores = Store::get();
            $stores_dropdown ="<option value='' selected disabled>Select</option>";
            foreach ($stores as $store) {
                if($store->id==$storelocationDetails->store_id){
                    $selected ="selected";
                }else{
                    $selected = " ";
                }
                $stores_dropdown .= "<option value='".$store->id."' ".$selected.">".$store->name."</option>";
            }
            return view('admin.storeLocations.edit_storelocation')->with(compact('storelocationDetails','stores_dropdown'));
        }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreLocation $storeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreLocation  $storeLocation
     * @return \Illuminate\Http\Response
     */
    public function destroyStorelocation($id)
    {
        StoreLocation::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Store Location has been deleted successfully!');
    }
}
