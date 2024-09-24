<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'description' => 'string|max:255'
            ]
        );
        $data = Response::where('report_id', $id)->first();
        if ($data) {
            $data->description = $validatedData['description'];
            $data->user_id = Auth::user()->id;
            $data->uploaded = Carbon::now();
            $data->save();
        } else {
            Response::create(
                [
                    'user_id' => Auth::user()->id,
                    'report_id' => $id,
                    'description' => $validatedData['description'],
                    'uploaded' => Carbon::now()
                ]
            );
        }

        return redirect()->route('admin.report.detail', ['id'=>$id])->with('success', 'data successfully uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function process($id)
    {
        $report = Report::findOrFail($id);
        if($report->progres_id == 1){
            $report->progres_id = 2;
            $report->save();
        }elseif($report->progres_id == 2){
            $report->progres_id = 3;
            $report->save();
        }else{
            return redirect()->route('home')->with('error', 'terjadi kesalahan');
        }
        $response = $report->progres_id == 1? "laporan akan segera di proses":"laporan berhasil diselesaikan";
        return redirect()->route('admin.report')->with('success', $response);
    }
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
