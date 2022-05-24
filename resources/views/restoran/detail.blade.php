@extends('layouts.app')

@section('content')
@foreach($resto as $r)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $r->name }}</h5>
                    <p class="card-text">{{ $r->kategori }} </p>
                    <p class="card-text">{{ $r->lokasi }} </p>
                    <p class="card-text"><a href="#" class="btn btn-primary">Check in</a></p>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        @foreach($menu as $m)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $m->nama }}</h5>
                                    <p class="card-text">{{ $r->deskripsi }}</p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
