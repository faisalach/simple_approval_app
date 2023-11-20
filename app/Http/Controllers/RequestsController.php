<?php

namespace App\Http\Controllers;

use App\Models\RequestHistories;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
			'tanggal_mulai_cuti' => ['required', 'date'],
			'tanggal_akhir_cuti' => ['required', 'date'],
			'alasan' => ['required'],
		]);

        $data                       = new Requests;
        $data->tanggal_mulai_cuti   = $request->input("tanggal_mulai_cuti");
        $data->tanggal_akhir_cuti   = $request->input("tanggal_akhir_cuti");
        $data->alasan_cuti          = $request->input("alasan");
        $data->status               = "pending";

        if($data->save()){
            $history                = new RequestHistories;
            $history->request_id    = $data->id;
            $history->status        = $data->status;
            $history->save();

            return redirect("/requests");
        }else{
            return back()->withErrors([
                'tanggal_mulai_cuti' => 'Failed, Please Try Again.',
            ])->onlyInput('tanggal_mulai_cuti');
        }
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        $requests   = Requests::all();

        $data               = [];
        $data["requests"]   = $requests;
        $data["user"]       = Auth::user();
        return view("show",$data);
    }

    /**
     * Update the resource in storage.
     */
    public function approved(Request $request,$id)
    {
        $data                       = Requests::find($id);
        $data->status               = "approved";

        if($data->save()){
            $history                = new RequestHistories;
            $history->request_id    = $data->id;
            $history->status        = $data->status;
            $history->save();

            return redirect("/requests");
        }else{
            return back()->withErrors([
                'error' => 'Failed, Please Try Again.',
            ]);
        }
    }

    public function rejected(Request $request,$id)
    {
        $data                       = Requests::find($id);
        $data->status               = "rejected";

        if($data->save()){
            $history                = new RequestHistories;
            $history->request_id    = $data->id;
            $history->status        = $data->status;
            $history->save();

            return redirect("/requests");
        }else{
            return back()->withErrors([
                'error' => 'Failed, Please Try Again.',
            ]);
        }
    }
}
