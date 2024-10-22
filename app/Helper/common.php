<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

/* =====
    Get File Path
   =====*/

if (!function_exists('GetStoragePath')) {
    function GetStoragePath($image)
    {
        $img = DefaultImage();
        if (empty($image) && is_null($image) || $image == "") {
            return $img;
        }
        $data = json_decode($image);

        if (isset($data->url)) {
            return $data->url;
        }

        $path = $data->image_path;
        $img_nm = $data->image_name;
        $newpath = str_replace(asset('/'), '', $path);

        if (Storage::disk('public')->exists($path . '/' . $img_nm)) {
            // $img = Storage::disk('public')->url($path . '/' . $prefix . $img_nm);
            $img = Storage::url($path . '/' . $img_nm);
            $img = url('/') . $img;
        } else {
            $img;
        }

        return $img;
    }
}
if (!function_exists('DefaultImage')) {
    function DefaultImage()
    {
        return asset('images/user-gray-icon.svg');
    }
}
/* =====
    Store File and Return path
   =====*/
if (!function_exists('UploadImage')) {
    function UploadImage($image, $image_name = '', $upath = '', $prefix = '')
    {
        $path = ($upath == '') ? 'images' : $upath;

        if (env('STORAGE_PATH') == 'cloud') {
            $storepath = Storage::disk('s3')->path($path);
        } else {
            $storepath = Storage::disk('public')->path($path);
        }

        if (!is_dir($storepath)) {
            File::makeDirectory($storepath, 0775, true);
        }

        $image_name    = ($image_name == '') ? RendomString(40) : $image_name;
        $imageName    = ($prefix != '') ? $prefix . '-' : '';
        $imageName .= $image_name . '.' . $image->getClientOriginalExtension();

        Storage::disk('public')->putFileAs($path . '/', $image, $imageName);

        $post_image = ['image_path' => $path, 'image_name' => $imageName];

        return json_encode($post_image);
    }
}
/* =====
    Delete Image
   =====*/
if (!function_exists('ImageDelete')) {
    function ImageDelete($img, $delete_type = 'folder')
    {
        if ($img == '') {
            return true;
        }
        $data = json_decode($img);
        if (isset($data->url)) {
            return true;
        }
        $path    = $data->image_path;
        $image    = $data->image_name;


        if ($delete_type == 'folder') {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->deleteDirectory($path);
            }
        } else {
            if (Storage::disk('public')->exists($path . '/' . $image)) {
                Storage::disk('public')->delete($path . '/' . $image);
            }
        }
        return true;
    }
}
/* =====
    Generate Random Number
   =====*/
if (!function_exists('RendomString')) {
    function RendomString($size = 10, $type = 'mix')
    {
        /* Type : 'number','string','mix' */
        $size = $size == null ? 10 : $size;
        $code = '';
        if ($type == 'number') {
            $akeys = range('0', '9');
            for ($i = 0; $i < $size; $i++) {
                $code .= $akeys[array_rand($akeys)];
            }
        } elseif ($type == 'string') {
            $akeys = range('A', 'Z');
            $bkeys = range('a', 'z');
            $ckeys = array_merge($akeys, $bkeys);
            for ($i = 0; $i < $size; $i++) {
                $code .= $ckeys[array_rand($ckeys)];
            }
        } else {
            $code = Str::random($size);
        }
        return str_shuffle($code);
    }
}
