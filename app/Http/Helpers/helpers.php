<?php

use App\Http\Helpers\FilePaths;
use Illuminate\Support\Facades\Config;

function get_geo_divisions() {

    if(cache()->driver('file')->has('geo_divisions')) {
        $divisions_json_content = cache()->driver('file')->get('geo_divisions');
    }else {
        $divisions_json_content = json_decode(file_get_contents(resource_path('country/divisions.json')),true);
        cache()->driver('file')->put('geo_divisions',$divisions_json_content,3600);
    }
    return $divisions_json_content;
}

function get_geo_districts() {

    if(cache()->driver('file')->has('geo_districts')) {
        $districts_json_content = cache()->driver('file')->get('geo_districts');
    }else {
        $districts_json_content = json_decode(file_get_contents(resource_path('country/districts.json')),true);
        cache()->driver('file')->put('geo_districts',$districts_json_content,3600);
    }
    return $districts_json_content;

}

function get_geo_districts_on_division($division) {

    $districts = [];
    
    if(!is_numeric($division)) {
        $division = get_geo_division_id_by_name($division);
        if($division == false) return [];
    }

    $districts = array_filter(get_geo_districts(),function($item) use ($division) {
        if($item['division_id'] == $division) {
            return $item;
        }
    });

    return $districts;
}


function get_geo_division_id_by_name($name) {
    $divisions = get_geo_divisions();
    $division = array_filter($divisions, function($item) use ($name) {
        if(strtolower($item['name']) == strtolower($name)) {
            return $item;
        }
    });

    if(count($division) > 0) {
        return array_shift($division)['id'];
    }

    return false;
}

function get_geo_division_info_by_id($id) {
    $divisions = get_geo_divisions();
    $division = array_filter($divisions, function($item) use ($id) {
        if($item['id'] == $id) {
            return $item;
        }
    });

    if(count($division) > 0) {
        return array_shift($division) ?? false;
    }

    return false;
}

function get_geo_upazilas() {

    if(cache()->driver('file')->has('geo_upazilas')) {
        $upazilas_json_content = cache()->driver('file')->get('geo_upazilas');
    }else {
        $upazilas_json_content = json_decode(file_get_contents(resource_path('country/upazilas.json')),true);
        cache()->driver('file')->put('geo_upazilas',$upazilas_json_content,3600);
    }
    return $upazilas_json_content;

}

function get_geo_upazilas_on_district($district) {
    $upazilas = [];
    
    if(!is_numeric($district)) {
        $district = get_geo_district_id_by_name($district);
        if($district == false) return [];
    }

    $upazilas = array_filter(get_geo_upazilas(),function($item) use ($district) {
        if($item['district_id'] == $district) {
            return $item;
        }
    });

    return $upazilas;
}

function get_geo_district_id_by_name($name) {
    $districts = get_geo_districts();
    $district = array_filter($districts, function($item) use ($name) {
        if(strtolower($item['name']) == strtolower($name)) {
            return $item;
        }
    });

    if(count($district) > 0) {
        return array_shift($district)['id'];
    }

    return false;
}

function get_geo_district_info_by_id($id) {
    $districts = get_geo_districts();
    $district = array_filter($districts, function($item) use ($id) {
        if($item['id'] == $id) {
            return $item;
        }
    });

    if(count($district) > 0) {
        return array_shift($district) ?? false;
    }

    return false;
}

function get_geo_upazila_info_by_id($id) {
    $upazilas = get_geo_upazilas();
    $upazila = array_filter($upazilas, function($item) use ($id) {
        if($item['id'] == $id) {
            return $item;
        }
    });

    if(count($upazila) > 0) {
        return array_shift($upazila) ?? false;
    }

    return false;
}

function bloodGroups($id = null) {

    $groups = [
        1 => "A+",
        2 => "A-",
        3 => "B+",
        4 => "B-",
        5 => "O+",
        6 => "O-",
        7 => "AB+",
        8 => "AB-"
    ];

    if($id && is_numeric($id)) {
        return $groups[$id] ?? false;
    }
    return $groups;
}

function send_sms_to_phone($phone, $message) {

    $to = $phone;
    $token = "65880033361696703616e4dd08fafd8d20d8bbf94bdc06cdeb34";
    $message = $message;
    $url = "http://api.greenweb.com.bd/api.php?json";
    $data= array(
    'to'=>"$to",
    'message'=>"$message",
    'token'=>"$token"
    ); 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);

    return $smsresult;
}

function get_image($eloquent_record, string $path_key): string
{
    $column_name = "image";
    if(property_exists($eloquent_record, "imageColumn")) $column_name = $eloquent_record->imageColumn;
    $image = $eloquent_record->$column_name;

    $file_paths = new FilePaths();
    if($image) return $file_paths->get($path_key) . "/" . $image;
    return $file_paths->defaultPlaceholder();
}