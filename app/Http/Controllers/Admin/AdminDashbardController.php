<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AdminDashbardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 4 : 6;
        $report = Report::paginate($perPage);
        $response = Response::all();
        $pending = Report::where('progres_id', '1')->get();
        $process = Report::where('progres_id', '2')->get();
        $done = Report::where('progres_id', '3')->get();
        $data = [
            "pending"=>$pending, "process"=>$process, "done"=>$done, "response"=>$response
        ];
        return view('admin.dashboard', compact('report', 'data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
