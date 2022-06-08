@extends('layouts.app')

@section('content')
@foreach($user as $u)
@if($u->id == $id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="/" class="fa fa-angle-left"></a>
                <div class="card text-center">
                    <div class="card-header">
                        {{-- <p>{{ $u->id }}</p> --}}
                        @foreach($resto as $r)
                        @if($r->user_id == $u->id)
                        <h5 class="card-title">{{ $u->name }}</h5>
                        <p class="card text-center">{{ $r->kategori }} </p>
                        <p class="card text-center">{{ $r->lokasi }} </p>
                        <p class="card text-center">{{ $r->deskripsi }} </p>
                        <a href="/ulasan/{{$r->user_id}}" class="btn btn-primary"> Reviews</a>
                        {{-- <div class="card text-center"><a href="/checkinout" class="btn btn-primary">Check in/out</a></div> --}}
                        @endif
                        <!-- ($r->user_id == $u->id) -->
                        @endforeach
                        <!-- ($resto as $r) -->
                        <?php
                        if(isset($_GET['checkin']))
                        {
                            date_default_timezone_set('Asia/Jakarta');
                            $checkin_clicked = date('Y-m-d H:i:s');

                        }
                        else if(isset($_GET['checkout']))
                        {
                            date_default_timezone_set('Asia/Jakarta');
                            $checkout_clicked = date('Y-m-d H:i:s');
                        }

                        ?>
                        @if(Auth::user()->is_restoran !== 1)
                        <h5>Check in/out</h5>
                        <form action="#" method="GET">
                            <input type="text" name="checkin"
                                value="<?php echo (isset($checkin_clicked))?$checkin_clicked:'';?>">
                            <button name="checkin" class="btn btn-primary">Check in</button>
                            <input type="text" name="checkout"
                                value="<?php echo (isset($checkout_clicked))?$checkout_clicked:'';?>">
                            <button name="checkout" class="btn btn-primary">Check out</button>
                            {{-- <a href="/" class="btn btn-primary"> Kembali</a> --}}
                            <input type="submit" class="btn btn-primary" value="Simpan Data">
                        </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        @foreach($menu as $m)
                        @if($m->restoran_id == $id)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    {{-- {{ $m->restoran_id }} --}}
                                    {{-- {{$m->gambar}} --}}
                                    <img src="{{ asset('data_file/'.$m->gambar) }} " width="50px" height="50px">
                                    <h5 class="card-title">{{ $m->nama }}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if(Auth::user()->is_restoran == 1)
                        @if( Auth::id() == $id)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/menu/store/{{$id}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <span>File Gambar</span><br />
                                            <input type="file" name="file" accept="image/png, image/jpeg"
                                                required="required">
                                            <div class="form-group">
                                                <span>Nama Menu</span>
                                                <input type="text" class="form-control" name="menu" required="required">
                                            </div> <!-- formgroup -->
                                        </div> <!-- formgroup -->
                                        <div class="text-center">
                                            <input type="hidden" name="user_id" value="{{ $id }}">
                                            <input type="submit" class="btn btn-primary " value="Tambah menu"></br>
                                        </div> <!-- text-center -->
                                    </form>

                                </div> <!-- card-body -->
                                @endif <!-- Auth::id() == $id -->
                            </div> <!-- card -->
                        </div> <!-- col-sm-6 -->
                    </div> <!-- row -->

                    @endif <!-- Auth::user()->is_restoran == 1 -->

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection