<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptController extends Controller
{
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

    public static function md5Encrypt($str){
        $hash = md5( $str );
        return( $hash );
    }

    public static function md5Decrypt($hash){
        $str = md5( $hash );

        if($str == $hash){
            return $str;
        }
    }
    function Encryption($data, $secret){
            //Generate a key from a hash   

              $key = md5(utf8_encode($secret), true);   

              $data2 = utf8_encode($data);    

              $iv =utf8_encode("aUrxt1ry");  

              //Take first 8 bytes of $key and append them to the end of $key.   

              $key .= substr($key, 0, 8);      

              //Pad for PKCS7    

              $blockSize = mcrypt_get_block_size('tripledes', 'cbc');
          //    $blockSize = mcrypt_get_block_size('tripledes', 'cbc');     

              //Encrypt data   

             $encData = mcrypt_encrypt('tripledes', 

             $key, $data2, MCRYPT_MODE_CBC, $iv);     

             return urlencode(base64_encode($encData));
             $end = time();
               

     } 
}
