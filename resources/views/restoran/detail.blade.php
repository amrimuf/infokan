@extends('layouts.app')

@section('content')
@foreach($resto as $r)
    <div>{{ $r->name }}</div>
    <div>{{ $r->deskripsi }}</div>
    <div>{{ $r->lokasi }}</div>
    <div>{{ $r->kategori }}</div>
@endforeach

@foreach($menu as $m)
    <div>{{ $m->nama }}</div>
@endforeach

@endsection