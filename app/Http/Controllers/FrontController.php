<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class FrontController extends Controller
{
    function semuaPengaduan() {
        $data = Complaint::all();
        return view('front.semua-pengaduan',[
            'data' => $data
        ]);
    }

    function semuaStatistik() {
        $all = Complaint::all();
        $pending = Complaint::where( 'status',  'pending')->count();
        $proses = Complaint::where( 'status',  'proses')->count();
        $selesai = Complaint::where( 'status',  'selesai')->count();

        return view('front.statistic',[
            'all'=>  $all,
            
            'pending' => $pending,
            'process' => $proses,
            'done' => $selesai
        ]);
    }

 function formPengaduan() {
        return view('front.form-pengaduan');
    }

  function storeComplaint(Request $request) {
    $this->validate($request,[
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'telp' => 'required|numeric|min:10',
        'email' => 'required|email|unique:users',
        'description' => 'required|string|',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile(key: 'image')) {
      $path = 'public/complaints';
      $image = $request->file('image');
      $name = $image->getClientOriginalName();
      $request->File(key: 'image')->storeAs(path: $path, name: $name);
    }


    $user = Auth::user();

    $complaint = new Complaint();
    $complaint->guest_name = $request->name;
    $complaint->guest_telp = $request->telp;
    $complaint->guest_email = $request->email;
    $complaint->description = $request->description;
    $complaint->image = $request->name;
    $complaint->title = $request->title;
    $complaint->user_id = $user ? $user->id : null;

    $complaint->save();

    return redirect()->back()->with('msg', 'Pengaduan anda telah berhasil dikirimkan');

}

}

