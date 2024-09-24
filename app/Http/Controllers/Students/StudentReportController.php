<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Progress;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class StudentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        $category = Category::where('is_active', true)->get();
        $progress = Progress::all();
        $selected_progress = $id??0;
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 6 : 12;
        $id?
            $report = Report::with('progres', 'category')->where('progres_id', $id)->paginate($perPage):
            $report = Report::with('progres', 'category')->paginate($perPage);
        $category_id = 0;
        return view('students.report.search-report', compact('category', 'report', 'progress', 'selected_progress','category_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('is_active', true)->get();
        return view('students.add-report', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'title' => 'required|string',
                'description' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg,webp',
                'location' => 'required|string'
            ]
        );
        if ($request->has('image') && $request->file('image') != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->storeAs('public/uploads/report_image', $filename);
            $url = Storage::url($path);
        } else {
            $url = null;
        }
        try {
            Report::create(
                [
                    'category_id' => $request->input('category_id'),
                    'progres_id' => 1,
                    'user_id' => \Auth::user()->id,
                    'image' => $url,
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'location' => $request->input('location'),
                    'uploaded' => Carbon::now(),
                ]
            );
            return redirect()->route('student.history')->with('success', 'data uploaded successfully');
        } catch (\Exception $e) {
            if ($url != null) {
                Storage::delete($url);
            }
            return redirect()->route('student.report.create')->withInput($request->input())->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::with('user', 'category', 'progres', 'response')->findOrFail($id);
        return view('students.report.detail-page', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::findOrFail($id);
        $category = Category::where('is_active', true)->get();
        return view('students.report.edit-report', compact('report', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::findOrFail($id);
        $request->validate(
            [
                'category_id' => 'required',
                'title' => 'required|string',
                'description' => 'required',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
                'location' => 'required|string'
            ]
        );
        if($report->progres_id == 3){
            return redirect()->route('student.home')->with('info', 'Progress sudah selesai');
        }
        if ($request->has('image') && $request->file('image') != null) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = $file->storeAs('public/uploads/report_image', $filename);
            $url = Storage::url($path);
            if($url){
                Storage::delete($report->image);
            }
        } else {
            $url = $report->image;
        }
        try {
            $report->category_id = $request->input('category_id');
            $report->image = $url;
            $report->title = $request->input('title');
            $report->description = $request->input('description');
            $report->location = $request->input('location');
            $report->uploaded = Carbon::now();
            $report->save();
            return redirect()->route('student.history')->with('success', 'data updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('student.report.create')->withInput($request->input())->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function search(Request $request, string $id)
    {
        $query = $request->input('query');
        $category_id = $request->input('category');
        $progress = Progress::all();
        $selected_progress = $id;

        // Menginisialisasi query untuk pencarian
        $reportQuery = $id != 0?Report::with('category', 'progres')->where('progres_id', $selected_progress):Report::with('category', 'progres');

        // Menambahkan klausa pencarian jika ada query
        if ($query) {
            $reportQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('location', 'like', '%' . $query . '%');
            });
        }

        // Menambahkan klausa pencarian untuk kategori jika ada
        if ($category_id && $category_id != 0) {
            $reportQuery->where('category_id', $category_id);
        }
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 6 : 12;
        // Mendapatkan data laporan dengan membatasi ke 6 per halaman
        $report = $reportQuery->paginate($perPage);

        // Mengambil data kategori yang aktif
        $category = Category::where('is_active', true)->get();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('students.report.search-report', compact('report', 'category', 'category_id', 'selected_progress', 'progress'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
