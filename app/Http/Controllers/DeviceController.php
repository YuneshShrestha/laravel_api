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
}
