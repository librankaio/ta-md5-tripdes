<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class Datamd5Controller extends Controller
{
    public function index(){
        
        $karyawans = Karyawan::where('stats','=',1)->get();
        return view('main.datamd5',[
            'karyawans' => $karyawans,
        ]);
    }

    public function showData(){
        
    }
}
