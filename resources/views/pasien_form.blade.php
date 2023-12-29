@extends('layouts.sbadmin2')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Form Data Pasien</h1>
                </div>
                <div class="card-body">
                    {!! Form::model($pasien, ['route' => $route, 'method' => $method]) !!}

                    <div class="form-group mt-1">
                        <label for="my-input">Kode Pasien</label>
                        {!! Form::text('kode_pasien', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{$errors->first('kode_pasien')}}</span>
                    </div>  

                    <div class="form-group mt-3">
                        <label for="my-input">Nama Pasien</label>
                        {!! Form::text('nama_pasien', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{$errors->first('nama_pasien')}}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="my-input">Jenis Kelamin</label>
                        {!! Form::text('jenis_kelamin', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{$errors->first('jenis_kelamin')}}</span>
                    </div>

                    <div class="form-group mt-2">
                        <label for="my-input">Status</label>
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{$errors->first('status')}}</span>
                    </div>

                    <div class="form-group mt-2">
                        <label for="my-input">Alamat</label>
                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{$errors->first('alamat')}}</span>
                    </div>

                    <br>
                    {!! Form::submit($tombol, ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
