@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<br />
<br />
<div class="card w-75 mx-auto">
    <div class="card-header">
        <a href="/resto/view/{{ $id }}" class="btn btn-primary fa fa-angle-left"></a>
        <a href="/ulasan/tambah/{{ $id }}" class="btn btn-primary"> +</a>
        <span>Reviews</span>
    </div>
</div>
@foreach($review as $r)
@if($r->restoran_id == $id)
<div class="card w-75 mx-auto">

    <div class="card-body">
        <h5 class="card-title">
            @foreach($user as $u)
            @if($r->user_id == $u->id)
            {{ $u->name }}
            @endif
            @endforeach
        </h5>
        <p class="card-text">
            @if($r->restoran_id == $id)
            {{ $r->review }}
            @endif
        </p>
        <a href="/ulasan/edit/{{ $r->id }}" class="btn btn-warning">Edit</a>
        |
        <a href="/ulasan/hapus/{{ $r->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
    </div>
</div>
@endif
@endforeach

@endsection