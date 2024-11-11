<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
{
    public $general_setting_model;

    public function __construct()
    {
        $this->general_setting_model = new GeneralSetting;
    }

    public function index()
    {
        $title = "General Settings";
        $general_setting = $this->general_setting_model->getLastInsertedId();
        return view('admin.general_setting.index', compact('title', 'general_setting'));
    }

    public function save(Request $request)
    {
        $general_setting = $this->general_setting_model->singleData($request->general_setting_id);
        if ($general_setting) {
            $data = [
                'login_screen_text' => $request->login_screen_text,
            ];

            if ($request->hasFile('logo')) {
                if (!empty($general_setting->logo)) {
                    // $existingImagePath = storage_path('app/public/') . $general_setting->logo;
                    // if (file_exists($existingImagePath)) {
                    //     unlink($existingImagePath);
                    // }
                    ImageDelete($general_setting->logo, '');
                }

                // $foldername = 'logo';
                // $image = $request->file('logo');
                // $path = Storage::putFile('public/' . $foldername, $image); 
                // $data['logo'] = str_replace('public/', '', $path);
                $data['logo'] = UploadImage($request->file('logo'), '', '', 'general-setting');
            }

            $update = $this->general_setting_model->updateData($data, ['id' => $request->general_setting_id]);

            return redirect()->back()->with('success', 'Data Inserted Successfully');
        } else {
            $request->validate([
                'logo' => 'required',
                'login_screen_text' => 'required'
            ]);

            $data = [
                'login_screen_text' => $request->login_screen_text,
            ];

            if ($request->hasFile('logo')) {
                // $foldername = 'logo';
                // $image = $request->file('logo');
                // $path = Storage::putFile('public/' . $foldername, $image);
                // $data['logo'] = str_replace('public/', '', $path);
                $data['logo'] = UploadImage($request->file('logo'), '', '', 'general-setting');
            }

            $store = $this->general_setting_model->insertData($data);

            return redirect()->back()->with('success', 'Data Inserted Successfully');
        }
    }
}
