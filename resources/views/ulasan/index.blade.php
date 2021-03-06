@extends('layouts.app')


@section('content')
<br />
<br />
<div class="card w-75 mx-auto">
    <div class="card-header d-flex align-items-center">
        <a href="/resto/view/{{ $id }}" class="p-2 btn btn-sm btn btn-primary fa fa-angle-left"></a>
        <div class="p-2 flex-fill">Reviews</div>
        @if(Auth::user()->is_restoran !== 1)
        <a href="/ulasan/tambah/{{ $id }}" class="p-2 btn btn-sm btn btn-primary"> +</a>
        @endif

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
        
        @if(Auth::user()->is_restoran !== 1)
        @if (Auth::id() == $r->user_id)
        <a href="/ulasan/edit/{{ $r->id }}" class="btn btn-warning">Edit</a>
        |
        <a href="/ulasan/hapus/{{ $r->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
        @endif
        @endif
        
    </div>
</div>
@endif
@endforeach

@endsection