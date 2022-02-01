<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // public function index()
    // {
    //     return Device::all();
    // }
    public function showData($id=null)
    {
        return  $id==null ? Device::all() : Device::find($id) ;
    }
    public function postData(Request $request){
        $device = new Device;
        $device->name = $request->name;
        $device->save();
        return ['status'=>'success'];
    }
    public function updateRecord(Request $request){
        $device = Device::find($request->id);
        $device->name = $request->name;
        $status = $device->save();
        if($status){
            return ['status'=>'success'];
        }
        else{
            return ['status'=>'failed'];
        }
    }
    public function search($data){
        $device = Device::where('name','like','%'.$data.'%')->get();
        if(count($device)>0){
            return $device;
        }
        else{
            return ['status'=>'failed'];
        }
    }
    public function deleteRecord($ids){
        $status = Device::whereIn('id',explode(',',$ids))->delete();
        // $status = $device->delete();
        if($status){
            return ['status'=>'success'];
        }
        else{
            return ['status'=>'failed'];
        }
    }
    // public function deleteMultipleRecord(Request $request){
    //     // return $request;
    //     // $data = [];
    //     foreach($request as $id){
    //         $device = Device::find($id);
    //         $status = $device->delete();
    //     }
    //     if($status){
    //             return ['status'=>'success'];
    //         }
    //         else{
    //             return ['status'=>'failed'];
    //         }
    //     }
    
}
