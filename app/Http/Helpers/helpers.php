<?php

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