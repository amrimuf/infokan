@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Restoran</div>
                {{-- <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=112.80009090900423%2C-7.290888589943765%2C112.8056162595749%2C-7.2877331992866585&amp;layer=mapnik&amp;marker=-7.289313557925458%2C112.80285358428955" style="border: 1px solid black"></iframe><br/><small></small> map tapi user location masih manual--}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($resto as $r)
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">{{ $r->name }}</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="/resto/view/{{ $r->id }}" class="btn btn-primary">View Details</a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
