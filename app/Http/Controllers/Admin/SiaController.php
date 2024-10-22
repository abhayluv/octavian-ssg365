<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiaLicence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiaController extends Controller
{
    public $sia_model;

    public function __construct()
    {
        $this->sia_model = new SiaLicence;
    }

    public function index(Request $request)
    {
        $query = $request->query();   
        $title = 'Manage Sia Lincence';
      
        $filterData['search'] = isset($query['search']) ? $query['search'] : '';
        
        $sia_data = $this->sia_model->getList($filterData);
        
        return view('admin.sialicence.index', compact('title', 'sia_data'));
    }

    public function create()
    {
        $title = 'Create Sia Lincence';
        return view('admin.sialicence.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'licence_name' => 'required',
            'logo' => 'required',
        ]);

        $data = [
            'licence_name' => $request->licence_name,
            'status' => $request->status
        ];
        
        if ($request->hasFile('logo')) {      
            $foldername = 'sia_logos';
            $image = $request->file('logo');
            $path = Storage::putFile('public/' . $foldername, $image); 
            $data['logo'] = str_replace('public/', '', $path);
        }
                
        $store = $this->sia_model->insertData($data);

        return redirect()->route('admin.sia_licence.index')->with('success', 'Licence Created Successfully');
    }

    public function edit($id)
    {  
        $title = 'Edit Sia Licence';
        $sia = $this->sia_model->singleData($id);
        return view('admin.sialicence.edit', compact('title', 'sia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'licence_name' => 'required',
        ]);

        $sia = $this->sia_model->singleData($id);

        $data = [
            'licence_name' => $request->licence_name,
            'status' => $request->status
        ];

        if ($request->hasFile('logo')) {
            if (!empty($sia->image)) {
                $existingImagePath = storage_path('app/public/') . $sia->image;
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
        
            $foldername = 'sia_logos';
            $image = $request->file('logo');
            $path = Storage::putFile('public/' . $foldername, $image); 
            $data['logo'] = str_replace('public/', '', $path);
        }


        $update = $this->sia_model->updateData($data, ['id' => $id]);

        return redirect()->route('admin.sia_licence.index')->with('success', 'Licence Updated Successfully');
    }

    public function destroy($id)
    {
        $sialicence = $this->sia_model->singleData($id);
        if($sialicence)
        {
            $sialicence->delete();
        }
        return redirect()->route('admin.sia_licence.index')->with('success', 'Licence Record Deleted Successfully');
    }
}
