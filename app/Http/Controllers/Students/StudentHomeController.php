<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use App\Models\Report;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class StudentHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = new Agent();
        $perPage = $agent->isMobile() ? 4 : 6;
        $information = Informations::all()->sortBy('created_at');
        $report = Report::with('progres', 'category')->paginate($perPage);
        return view('students.home', compact('report','information'));
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
        //
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
