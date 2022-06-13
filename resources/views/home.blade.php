@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group my-flex">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <form action="/cari" method="GET">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="cari"
                                                            placeholder="Cari Restoran" value="{{ old('cari') }}">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="submit" class="btn btn-default" value="CARI">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <h2>Halo, {{ Auth::user()->name }}!</h2>
                                <h5>Your Location:
                                    {{ $data->cityName }},{{ $data->regionName }},{{ $data->countryName }},{{ $data->zipCode }}
                                    </h3>
                                    <p>Latitude: {{ $data->latitude }}, Longitude: {{ $data->longitude }}</p>
                            </div>
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Daftar Restoran
                                @if (Auth::user()->is_restoran == 1)
                                <a href="/resto/add" class="btn btn-sm btn btn-primary">Add Restaurant</a>
                                @endif
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <div class="row">
                                    @foreach ($user as $u)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $u->name }}</h5>
                                                {{-- <p>{{ $u->id }}</p> --}}
                                                @foreach ($resto as $r)
                                                @if ($r->user_id == $u->id)
                                                <p class="card-text">Alamat: {{ $r->lokasi }}</p>
                                                <a href="/resto/view/{{ $u->id }}" class="btn btn-primary">View
                                                    Details</a>
                                                @if (Auth::id() == $u->id)
                                                <a href="/resto/edit/{{ $u->id }}" class="btn btn-primary">Edit</a>
                                                @endif
                                                @endif
                                                @endforeach
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
        </div>
        @endsection