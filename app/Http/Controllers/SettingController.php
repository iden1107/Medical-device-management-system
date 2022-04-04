<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function getSetting(){
        return Setting::where('id',1)->first();
    }
    public function updateSetting(Request $request){
        Setting::where('id',1)->update([
            'setting_minutes' => $request->minutes,
        ]);
    }
}
