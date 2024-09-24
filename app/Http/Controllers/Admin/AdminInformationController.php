<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = Informations::paginate(2);
        return view('admin.information', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.information.form-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
          [
              'title' => ['string', 'required'],
              'description' => ['nullable'],
              'image' => ['required', 'mimes:jpg,jpeg,webp,png'],
          ]
        );
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = $file->storeAs('public/uploads/information', $filename);
        $url = Storage::url($path);
        if(!$url){
            return redirect()->route('admin.information.create')->with('error', 'gagal mengupload image');
        }
        try{
            Informations::create(
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'image' => $url
                ]
            );
            return redirect()->route('admin.information')->with('success', 'data berhasil ditambahkan');
        }catch (Exception $e){
            if(Storage::get($url)){
                Storage::delete($url);
            }
            return redirect()->route('admin.information.create')->with('error', 'Error: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $information = Informations::findOrFail($id);
        return view('admin.information.form-edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $information = Informations::findOrFail($id);
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            ]
        );
        if ($request->has('image') && $request->file('image') != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = $file->storeAs('public/uploads/report_image', $filename);
            $url = Storage::url($path);
            if($url){
                Storage::delete($information->image);
            }
        } else {
            $url = $information->image;
        }
        try {
            $information->image = $url;
            $information->title = $request->input('title');
            $information->description = $request->input('description');
            $information->save();
            return redirect()->route('admin.information')->with('success', 'data updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->input())->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = Informations::findOrFail($id);
            if($data){
                $data->delete();
            }else{
                return redirect()->back()->with('error', 'data tidak ditemukan');
            }
            return redirect()->route('admin.information')->with('info', $data->title.' berhasil dihapus');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'terjadi error '.$e );
        }
    }
}
