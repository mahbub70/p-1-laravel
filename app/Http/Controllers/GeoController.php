<?php

namespace App\Http\Controllers;

use App\Http\Helpers\JSON;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeoController extends Controller
{
    public function getDistrictsOnDivision(Request $request) {

        $validator = Validator::make($request->all(),[
            'division'      => "required|integer",
        ]);

        if($validator->fails()) {
            return JSON::error($validator->errors()->all(),[],400);
        }

        $validated = $validator->validate();

        $division_id = $validated['division'];

        return JSON::success(
            ['Data fetch successfully!'],
            get_geo_districts_on_division($division_id),
            200
        );
    }

    public function getUpazilasOnDistrict(Request $request) {

        $validator = Validator::make($request->all(),[
            'district'      => "required|integer",
        ]);

        if($validator->fails()) {
            return JSON::error($validator->errors()->all(),[],400);
        }

        $validated = $validator->validate();

        $district_id = $validated['district'];

        return JSON::success(
            ['Data fetch successfully!'],
            get_geo_upazilas_on_district($district_id),
            200
        );
    }
}
