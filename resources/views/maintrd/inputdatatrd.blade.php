@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white"><h5 class="py-2 text-decoration-underline" style="color: #00235D">TripleDES</h5></div>
</div>
{{-- END Title Form --}}

{{-- Form --}}
<form action="{{ route('inputdatatrd') }}" method="post" class="container-fluid px-5 py-2">
    <div class="head-form">
        <div class="row">                
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4"
                style="border-top-left-radius: 10px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="stats" value="{{ 1 }}"/>
                <div class="row">              
                    <div class="col-md-12 bg-white">
                    <div class="">                
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" aria-describedby="emailHelp">
                    </div>              
                    </div>
                </div>    
                </div>        
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-right-radius: 10px;">
                <div class="row">
                    <div class="col-md-12 bg-white">
                    <div class="">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" aria-describedby="emailHelp">
                    </div> 
                    </div>
                </div>
                </div>
                <div class="container col-md-4 px-4 pb-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp') }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="jbtn" value="{{ old('jbtn') }}">
                            <option selected>PILIH DATA</option>
                            <option value="1">B1</option>
                            <option value="2">B2</option>
                            <option value="3">ASN</option>
                            <option value="3">Non ASN</option>
                            </select>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"  aria-describedby="emailHelp" style="resize: none; height:8vh;"></textarea>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="exampleInputEmail1" class="form-label">Jumlah Tanggungan</label>
                            <select class="form-select" aria-label="Default select example" name="tgngn" value="{{ old('tgngn') }}">
                            <option selected>PILIH DATA</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            </select>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4"
                style="border-bottom-left-radius: 10px;">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="penghasilan" class="form-label">Penghasilan</label>
                            <input type="text" class="form-control" id="penghasilan" name="penghasilan" value="{{ old('penghasilan') }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4" style="border-bottom-right-radius: 10px;">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="pajakhasil" class="form-label">Pajak Penghasilan</label>
                            <input type="text" class="form-control" id="pajakhasil" name="pajakhasil" value="{{ old('pajakhasil') }}" aria-describedby="emailHelp">
                            <div class="btn-form text-end py-4">
                                <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                            </div>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
            </div>
    </div>  
</form>
{{-- END Form --}}
@endsection