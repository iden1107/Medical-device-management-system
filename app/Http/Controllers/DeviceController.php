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
}
