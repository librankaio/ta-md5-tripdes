<?php

namespace App\Http\Controllers;

use App\Models\Karyawantrd;
use Illuminate\Http\Request;
use app\Http\Controllers\EncryptController;

class InputDataTrdController extends Controller
{
    public function index(){
        return view('maintrd.inputdatatrd');
    }

    public function show(){
        $datas = Karyawantrd::paginate(10);
        return view('maintrd.datatrd',[
            'datas' => $datas,
        ]);
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

        Karyawantrd::create([
            'nama' => $request->nama,
            'nik' => InputDataTrdController::tripDesEncrypt($request->nik),
            'npwp' => InputDataTrdController::tripDesEncrypt($request->npwp),
            'jbtn' => $request->jbtn,
            'alamat' => InputDataTrdController::tripDesEncrypt($request->alamat) ,
            // 'alamat' => encryptIt($request->alamat),
            'tgngn' => $request->tgngn,
            'penghasilan' => $request->penghasilan,
            'pajakhasil' => $request->pajakhasil,
            'stats' => $request->stats,
        ]);
        $end = microtime(true);
        echo round($end-$start,5)."MiliSeconds";
        return redirect('inputdatatrd')->with('success','Data Berhasil Di Inputkan selama',$waktu);
    }

    public static function tripDesEncrypt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }

    public static function tripDesDecrypt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
}
