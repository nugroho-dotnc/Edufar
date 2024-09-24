<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 6 : 12;
        $category = Category::with("reports")->where('is_active', true)->paginate($perPage);
        return view('admin.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.form-tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string'
        ]);
        Category::create(
            $validatedData
        );
        return redirect()->route('admin.category')->with('success', 'category '.$validatedData['name'].' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = $request->input('query');
        $category = Category::where('name', 'like', '%'.$query.'%')->get();
        if(!$query){
            return redirect()->route('admin.category');
        }
        return view('admin.category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.form-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate(
          [
              'name' => 'string|min:5'
          ]
        );
        $category->name = $validatedData['name'];
        $category->save();
        return redirect()->route('admin.category')->with('success', 'category '.$category->name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = false;
        $category->save();
        return redirect()->route('admin.category')->with('success', 'category '.$category->name.' delete successfully');
    }
}
