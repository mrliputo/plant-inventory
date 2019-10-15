@extends('layouts.admin_app')

@section('content')

@include('includes.messages')

<div class="content-label">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
        <p>Daftar Tanaman</p>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-button top-button-admin pull-right">
        <a href="{{ route('tree.create') }}"><button class="main-button">Tambah Tanaman</button></a>
    </div>
</div>

<div class="clear"></div>

<div class=" col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 form-search">
    {!! Form::open(['action' => 'SearchController@speciesSearch', 'method' => 'GET']) !!}
        {!! Form::search('s', '', ['placeholder' => 'Masukkan nomor registrasi tanaman...', 'class' => 'col-lg-11 col-md-11 col-sm-11 col-xs-10']) !!}
        {!! Form::submit('Cari', ['class' => 'col-lg-1 col-md-1 col-sm-1 col-xs-2']) !!}
    {!! Form::close() !!}
</div>

<div class="clear"></div>

@if(count($tree) > 0)

<div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12 col-lg-10 panel panel-default content table-responsive">
    <table class="table table-hover main-table">
        <thead>
            <tr>
                <th class="col-lg-2">No. Reg</th>
                <th class="col-lg-3">Nama Ilmiah</th>
                <th class="col-lg-3">Nama Lokal</th>
                <th class="col-lg-4">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($tree as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><em>{{ $item->species->spesies }}</em></td>
                <td>{{ $item->species->nama_lokal }}</td>
                <td>
                    <a href="{{ route('tree.show', $item->id) }}">
                        <button class="button-small button-green">Lihat</button>
                    </a>
                    <a href="{{ route('tree.edit', $item->id) }}">
                        <button class="button-small button-blue">Edit</button>
                    </a>
                    <a href="javascript:void(0);" onclick="if(confirm('Anda yakin ingin menghapus?')) {$(this).find('form').submit()};" >
                        <button class="button-small button-red">Hapus</button>
                        {!! Form::open(['action' => ['TreeController@destroy', $item->id], 'method' => 'DELETE']) !!}
                        {!! Form::close() !!}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

{{ $tree->links() }}

@else

<div class="well well-form col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
    Tidak ada data.
</div>

@endif

@endsection
