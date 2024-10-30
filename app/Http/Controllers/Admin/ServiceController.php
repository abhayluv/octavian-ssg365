<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ServiceMaster;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public $service_model;

    public function __construct()
    {
        $this->service_model = new ServiceMaster;
    }

    public function index(Request $request)
    {
        $query = $request->query();
        $title = 'Manage Service';
        $filterData['search'] = isset($query['search']) ? $query['search'] : '';

        $service_data = $this->service_model->getList($filterData);

        return view('admin.service.index', compact('title', 'service_data'));
    }

    public function create()
    {
        $title = 'Create Service';
        return view('admin.service.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'image' => 'required'
        ]);

        $data = [
            'ser_id' => $this->getUniqueId(),
            'name' => $request->service_name,
            'status' => $request->status
        ];

        $data['image'] = '';
        if ($request->hasFile('image')) {
            // $foldername = 'service_image';
            // $image = $request->file('image');
            // $path = Storage::putFile('public/' . $foldername, $image); 
            // $data['image'] = str_replace('public/', '', $path);

            $data['image'] = UploadImage($request->file('image'), '', '', 'service');
        }

        $store = $this->service_model->insertData($data);

        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Created Successfully');
    }

    public function edit($id)
    {
        $ser_id = base64_decode($id);
        $title = 'Edit Service';
        $service = $this->service_model->singleDataByWhere(['ser_id' => $ser_id]);
        return view('admin.service.edit', compact('title', 'service'));
    }

    public function update(Request $request, $id)
    {
        $ser_id = base64_decode($id);
        $request->validate([
            'service_name' => 'required',
        ]);

        $data = [
            'name' => $request->service_name,
            'status' => $request->status
        ];

        $service = $this->service_model->singleDataByWhere(['ser_id' => $ser_id]);

        if ($request->hasFile('image')) {
            if (!empty($service->image)) {
                // $existingImagePath = storage_path('app/public/') . $service->image;
                // if (file_exists($existingImagePath)) {
                //     unlink($existingImagePath);
                // }
                ImageDelete($service->image, '');
            }

            // $foldername = 'service_image';
            // $image = $request->file('image');
            // $path = Storage::putFile('public/' . $foldername, $image);
            // $data['image'] = str_replace('public/', '', $path);
            $data['image'] = UploadImage($request->file('image'), '', '', 'service');
        }

        $update = $this->service_model->updateData($data, ['ser_id' => $ser_id]);

        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Data Updated Successfully');
    }

    public function destroy($id)
    {
        $ser_id = base64_decode($id);
        $service = $this->service_model->singleDataByWhere(['ser_id' => $ser_id]);
        if ($service) {
            if (!empty($service->image)) {
                // $existingImagePath = storage_path('app/public/') . $service->image;
                // if (file_exists($existingImagePath)) {
                //     unlink($existingImagePath);
                // }
                ImageDelete($service->image, '');
            }
            $service->delete();
        }
        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Data Deleted Successfully');
    }

    public function getUniqueId()
    {
        $random_string = RendomString(15, 'number');
        $checkId = $this->service_model->singleDataByWhere(['ser_id' => $random_string]);
        if (!empty($checkId)) {
            $this->getUniqueId();
        }
        return $random_string;
    }
}
