<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Karyawanmd;

class InputDataController extends Controller
{
    public function index(){
        return view('main.inputdata');
    }

    public function store(Request $request){
        // dd($request->all());
        $start = microtime(true);
        $request->validate([
            'nama' => ['required', 'string'],
            'nik' => ['required', 'string', ],
            'npwp' => ['required', 'string', ],
            'jbtn' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'tgngn' => ['required', 'integer'],
            'penghasilan' => ['required', 'integer'],
            'pajakhasil' => ['required', 'integer'],
            'stats' => ['required', 'boolean']
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'nik' => InputDataController::md5Encrypt($request->nik),
            'npwp' => InputDataController::md5Encrypt($request->npwp),
            'jbtn' => $request->jbtn,
            'alamat' => InputDataController::md5Encrypt($request->alamat) ,
            // 'alamat' => encryptIt($request->alamat),
            'tgngn' => $request->tgngn,
            'penghasilan' => $request->penghasilan,
            'pajakhasil' => $request->pajakhasil,
            'stats' => $request->stats,
        ]);
        Karyawanmd::create([
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'alamat' => $request->alamat,
            'stats' => $request->stats
        ]);
        $end = microtime(true);
        $waktu = round($end-$start,2)."Seconds";
        return redirect('inputdata')->with('success','Data Berhasil Di Inputkan selama',$waktu);
    }

    public static function md5Encrypt($str){
        $hash = md5( $str );
        return $hash;
    }

    public static function md5Decrypt($var,$str){
        $start = microtime(true);
        $hash = $str;
        $decrypts = Karyawanmd::select( $var )->where('stats','=',1)->Get();
        foreach($decrypts as $decrypt){
            $decrypt[$var];

            if (md5($decrypt[$var]) == $hash){
                return $decrypt[$var];
            }else{
                // echo 'Failure';
            }
            
        }
        $end = microtime(true); 
        $final = round($end-$start,2)."Seconds";
        echo $final;
        // if(md5($decrypt[$var]) != $hash) {
        //     echo $decrypt;
        // }
        
        
    }
    // public function show(){
        
    //     $karyawans = Karyawan::where('stats','=',1)->get();
    //     return view('main.datamd5',[
    //         'karyawans' => $karyawans
    //     ]);
    // }
}
