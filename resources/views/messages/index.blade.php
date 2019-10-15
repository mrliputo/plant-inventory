@extends('layouts.admin_app')

@section('content')

@include('includes.messages')

<div class="content-label">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
        <p>Pesan Masuk</p>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 top-button top-button-admin pull-right">
        <a href="javascript:void(0);" onclick="if(confirm('Anda akan menghapus semua pesan. Lanjutkan?')) {$(this).find('form').submit()};" >
            <button class="main-button button-red">Bersihkan Pesan</button>
                {!! Form::open(['action' => ['MessagesController@dropAll'], 'method' => 'DELETE']) !!}
                {!! Form::close() !!}
        </a>
    </div>
</div>

<div class="clear"></div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 form-search">
    {!! Form::open(['action' => 'SearchController@messageSearch', 'method' => 'GET']) !!}
        {!! Form::search('s', '', ['placeholder' => 'Masukkan nama pengirim atau isi pesan...', 'class' => 'col-lg-11 col-md-11 col-sm-11 col-xs-10']) !!}
        {!! Form::submit('Cari', ['class' => 'col-lg-1 col-md-1 col-sm-1 col-xs-2']) !!}
    {!! Form::close() !!}
</div>

<div class="clear"></div>

@if(count($messages) > 0)

<div class="col-lg-offset-1 col-lg-10 panel panel-default content table-responsive">
    <table class="table table-hover main-table">
        <thead>
            <tr>
                <th class="col-lg-3">Nama</th>
                <th class="col-lg-6">Pesan</th>
                <th class="col-lg-3">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ substr($message->content, 0, 40) . '...' }}</td>
                <td>
                    <a href="{{ route('messages.show', $message->id) }}">
                        <button class="button-small button-green">Lihat</button>
                    </a>
                    <a href="javascript:void(0);" onclick="if(confirm('Anda yakin ingin menghapus?')) {$(this).find('form').submit()};" >
                        <button class="button-small button-red">Hapus</button>
                        {!! Form::open(['action' => ['MessagesController@destroy', $message->id], 'method' => 'DELETE']) !!}
                        {!! Form::close() !!}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

{{ $messages->links() }}

@else

<div class="well well-form col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-12">
    Tidak ada data.
</div>

@endif

@endsection