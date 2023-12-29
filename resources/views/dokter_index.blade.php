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
                        <a href="{{ route('dokter.create') }}" class="btn btn-primary">
                            Tambah Dokter
                        </a>
                        <a href="{{ route('dokter.laporan') }}" class="btn btn-warning">
                            Laporan Dokter
                        </a>
                        <br>
                        <br>
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>kode Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Nomor Hp</th>
                                        <th>Spesialis</th>
                                        <th>Created_at</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dokter as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kode_dokter }}</td>
                                            <td>{{ $item->nama_dokter }}</td>    
                                            <td>{{ $item->nomor_hp }}</td>
                                            <td>
                                                <div>{{ $item->spesialis->nama }}</div>
                                                <div>{{ $item->spesialis->keterangan }}</div>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('dokter.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                                {!! Form::open(
                                                    [
                                                        'route' => ['dokter.destroy', $item->id],
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
                            {{ $dokter->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
@endsection