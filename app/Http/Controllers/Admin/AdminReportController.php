<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Progress;
use App\Models\Report;
use App\Models\Response;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        $category = Category::where('is_active', true)->get();
        $progress = Progress::all();
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 6 : 12;
        $selected_progress = $id??0;
        $id?
            $report = Report::where('progres_id', $id)->paginate($perPage):
            $report = Report::paginate($perPage);

        $category_id = 0;
        return view('admin.report', compact('report', 'category', 'category_id', 'progress', 'selected_progress'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::with('user', 'category', 'response', 'user')->findOrFail($id);
        $response = Response::where('report_id', $id)->first();
        return view('admin.report.detail-page', compact('report',  'response'));
    }
    public function search(Request $request, string $id){
        $query = $request->input('query');
        $category_id = $request->input('category');
        $progress = Progress::all();
        $selected_progress = $id;

        $agent = new Agent();
        $perPage = $agent->isMobile() ? 6 : 12;
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

        // Mendapatkan data laporan dengan membatasi ke 6 per halaman
        $report = $reportQuery->paginate($perPage);

        // Mengambil data kategori yang aktif
        $category = Category::where('is_active', true)->get();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('admin.report', compact('report', 'category', 'category_id', 'selected_progress','progress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
