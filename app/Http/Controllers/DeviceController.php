<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function getDevices()
    {
        return Device::all();
    }

    public function getDevice($id)
    {
        return Device::where('id',$id)->first();
    }

    public function getDevicesByLocation()
    {
        $devices =  Device::all();
        return $devices->groupBy('location');;
    }
    public function createDevice(Request $request)
    {
        Device::create([
            'id' => $request->id,
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'status' => $request->status,
            'inspection_date' => $request->inspection_date,
            'location' => $request->location
        ]);
    }
    public function updateDevice(Request $request)
    {
        Device::where('id',$request->id)->update([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'status' => $request->status,
            'inspection_date' => $request->inspection_date,
            'location' => $request->location
        ]);
    }
}
