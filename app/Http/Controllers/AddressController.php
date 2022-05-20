<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getDistrict(Request $request) {
        $provinceId = $request->provinceId;
        $districts = District::where('provinceId', $provinceId)->get();
        $output = '';
        foreach($districts as $district) {
            $output .= '
                <option style="font-size: 18px;background-color: #272E48;" value="'. $district->id .'">'. $district->name .'</option>
            ';
        }

        return json_encode($output);
    }

    public function getVillage(Request $request) {
        $districtId = $request->districtId;
        $villages = Village::where('districtId', $districtId)->get();
        $output = '';
        foreach($villages as $village) {
            $output .= '
                <option style="font-size: 18px;background-color: #272E48;" value="'. $village->id .'">'. $village->name .'</option>
            ';
        }

        return json_encode($output);
    }
}
