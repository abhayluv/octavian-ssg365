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
            'service_name' => $request->service_name,
            'status' => $request->status
        ];
        
        if ($request->hasFile('image')) {      
            $foldername = 'service_image';
            $image = $request->file('image');
            $path = Storage::putFile('public/' . $foldername, $image); 
            $data['image'] = str_replace('public/', '', $path);
        }
        
        $store = $this->service_model->insertData($data);

        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Created Successfully');
    }

    public function edit($id)
    {   
        $title = 'Edit Service';
        $service = $this->service_model->singleData($id);
        return view('admin.service.edit', compact('title', 'service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required',
        ]);

        $data = [
            'service_name' => $request->service_name,
            'status' => $request->status
        ];

        $service = $this->service_model->singleData($id);

        if ($request->hasFile('image')) {
            if (!empty($service->image)) {
                $existingImagePath = storage_path('app/public/') . $service->image;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
        
            $foldername = 'service_image';
            $image = $request->file('image');
            $path = Storage::putFile('public/' . $foldername, $image); 
            $data['image'] = str_replace('public/', '', $path);
        }

        $update = $this->service_model->updateData($data, ['id' => $id]);
        
        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Data Updated Successfully');
    }

    public function destroy($id)
    {
        $service = $this->service_model->singleData($id);
        if($service)
        {
            if (!empty($service->image)) {
                $existingImagePath = storage_path('app/public/') . $service->image;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $service->delete();
        }
        return redirect()->route('admin.manage_service.index')->with('success', 'Serivce Data Deleted Successfully');
    }
}
