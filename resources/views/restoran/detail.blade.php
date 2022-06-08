@extends('layouts.app')

@section('content')
@foreach($user as $u)
@if($u->id == $id)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< Updated upstream
            <a href="/" class="fa fa-angle-left"></a>
=======
                <a href="/" class="fa fa-angle-left fa-3x"></a>
>>>>>>> Stashed changes
                <div class="card text-center">
                    <div class="card-header">
                        {{-- <p>{{ $u->id }}</p> --}}
                        @foreach($resto as $r)
                        @if($r->user_id == $u->id)
                        <h5 class="card-title">{{ $u->name }}</h5>
                        <p class="card text-center">{{ $r->kategori }} </p>
                        <p class="card text-center">{{ $r->lokasi }} </p>
                        <p class="card text-center">{{ $r->deskripsi }} </p>
                        <a href="/ulasan/{{$r->user_id}}" class="btn btn-primary" > Reviews</a>
                        {{-- <div class="card text-center"><a href="/checkinout" class="btn btn-primary">Check in/out</a></div> --}}
                        @endif
                        @endforeach
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
                            <input type="text" name="checkin" value="<?php echo (isset($checkin_clicked))?$checkin_clicked:'';?>">
                            <button name="checkin" class="btn btn-primary">Check in</button>
                            <input type="text" name="checkout" value="<?php echo (isset($checkout_clicked))?$checkout_clicked:'';?>">
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

<<<<<<< Updated upstream
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
=======
                    <div class="row">
                        @foreach($menu as $m)
                        @if($m->restoran_id == $id)
                        <div class="col-sm-6 mt-1 mb-1">
                            <div class="card">
                                <div class="card-body">
                                    {{-- {{ $m->restoran_id }} --}}
                                    {{-- {{$m->gambar}} --}}
                                    <img src="{{ asset('data_file/'.$m->gambar) }} " width="50px" height="50px">
                                    <h5 class="card-title">{{ $m->nama }}</h5>
>>>>>>> Stashed changes
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @if( Auth::id() == $id)
                        <form action="/menu/store/{{$id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-2 control-label"><b>Menu baru </b></div>
                                <b>File Gambar</b><br/>
                                <input type="file" name="file">
                                <div class="col-sm-4 input-group date" id="menu">
                                    <input type="text" class="form-control" name="menu" required="required"> <br />
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $id }}">
                            <input type="submit" class="btn btn-primary" value="Tambah menu">
                        </form>
                        @endif
                        {{-- <form action="/upload/proses" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <b>File Gambar</b><br/>
                                <input type="file" name="file">
                            </div>

                            <div class="form-group">
                                <b>Keterangan</b>
                                <textarea class="form-control" name="keterangan"></textarea>
                            </div>

                            <input type="submit" value="Upload" class="btn btn-primary">
                        </form> --}}
                    </div>
                </div>
            </div>
    </div>
</div>
@endif
@endforeach
@endsection
