@extends('layouts.sbadmin2')
@section('content')

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            {{$judul}}
                        </div>
                        <div class="card-body">
                        <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                            Tambah Pasien
                        </a>
                        <a href="{{ route('pasien.laporan') }}" class="btn btn-warning">
                            Laporan Pasien
                        </a>
                        <br>
                        <br>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr >
                                        <th>ID</th>
                                        <th>kode Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Created_at</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kode_pasien }}</td>
                                            <td>{{ $item->nama_pasien }}</td>    
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->alamat}}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('pasien.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                                {!! Form::open(
                                                    [
                                                        'route' => ['pasien.destroy', $item->id],
                                                        'method' => 'delete',
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger'])!!}
                                                    {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pasien->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
@endsection