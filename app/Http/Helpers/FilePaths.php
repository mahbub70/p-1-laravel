<?php

namespace App\Http\Helpers;

use Exception;
use Illuminate\Support\Facades\Config;

class FilePaths {

    public $paths;
    public $storeDrive;
    
    public function __construct()
    {
        $this->paths = Config::get('assets.paths');
        $this->storeDrive = Config::get('assets.file-store-drive');
    }

    public function get(string $key_name): string 
    {
        if(array_key_exists($key_name, $this->paths)) return $this->getPathUsingKey($key_name);
        throw new Exception("File Path Not Registered With Declared Name [$key_name]. Register Key Name in Asset Configuration File");
    }

    public function getAllPaths(): array
    {
        return $this->paths;
    }

    public function getPathUsingKey(string $key_name): string
    {
        return $this->storeDriveFix($this->paths[$key_name]['path']);
    }

    public function defaultPlaceholder(): string
    {
        return $this->storeDriveFix(Config::get('assets.placeholder'));
    }

    public function storeDriveFix(string $path_key = null): string 
    {
        $path_prefix = asset('/');
        if($this->storeDrive == 'storage') $path_prefix = asset('storage') . "/";
        return $path_prefix . ltrim($path_key,"/");
    }
}