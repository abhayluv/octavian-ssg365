<?php

namespace App\Http\Controllers\Admin;

use App\Models\IntroScreen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class IntroScreenController extends Controller
{
    public $intro_screen_model;

    public function __construct()
    {
        $this->intro_screen_model = new IntroScreen;
    }
    public function index()
    {
        $title = "Intro Screen";
        $intro_screen_data = $this->intro_screen_model->getAllData();
        return view('admin.intro_screen.index', compact('title', 'intro_screen_data'));
    }

    public function save(Request $request)
    {
        $data = [];

        foreach ($request->image as $index => $image) {
            $dataEntry = [
                'title' => $request->title[$index] ?? null,
                'id' => $request->id[$index] ?? null,
            ];

            if (!empty($dataEntry['id'])) {
                $existingRecord = $this->intro_screen_model->findById($dataEntry['id']);

                if ($existingRecord && !empty($existingRecord->image)) {
                    // $oldImagePath = storage_path('app/public/' . $existingRecord->image);
                    // if (file_exists($oldImagePath)) {
                    //     unlink($oldImagePath);
                    // }
                    ImageDelete($existingRecord->image, '');
                }
            }


            if ($request->hasFile('image') && $request->file('image')[$index]) {
                // $foldername = 'intro_images';
                // $uploadedImage = $request->file('image')[$index];
                // $path = Storage::putFile('public/' . $foldername, $uploadedImage);
                // $dataEntry['image'] = str_replace('public/', '', $path);
                $dataEntry['image'] = UploadImage($request->file('image')[$index], '', '', 'intro-screen');
            }

            $data[] = $dataEntry;
        }

        foreach ($data as $entry) {
            $this->intro_screen_model->updateOrCreateData($entry);
        }

        return redirect()->back()->with('success', 'Data Saved Successfully');
    }


    public function destroy($id)
    {
        $existingRecord = $this->intro_screen_model->findById($id);

        if ($existingRecord) {
            if ($existingRecord && !empty($existingRecord->image)) {
                // $oldImagePath = storage_path('app/public/' . $existingRecord->image);

                // if (file_exists($oldImagePath)) {
                //     unlink($oldImagePath);
                // }
                ImageDelete($existingRecord->image, '');
            }

            $existingRecord->delete();

            return redirect()->back()->with('success', 'Data Deleted Successfully');
        }
    }
}
