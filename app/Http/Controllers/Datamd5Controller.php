<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class Datamd5Controller extends Controller
{
    public function index(){
        
        $karyawans = Karyawan::where('stats','=',1)->paginate(10);
        return view('main.datamd5',[
            'karyawans' => $karyawans,
        ]);
    }

    public function showData(){
        
    }
}
