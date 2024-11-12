<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        $all = Complaint::all();
        $pending = Complaint::where( 'status',  'pending')->count();
        $proses = Complaint::where( 'status',  'proses')->count();
        $selesai = Complaint::where( 'status',  'selesai')->count();

        return view('dashboard.index',[
            'all'=>  $all,
            'pending' => $pending,
            'process' => $proses,
            'done' => $selesai
        ]);
    function allProcessComplaints(): Factory|View {

    }
    }


}
