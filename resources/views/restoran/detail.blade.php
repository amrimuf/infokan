@extends('layouts.app')

@section('content')
@foreach($resto as $r)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">{{ $r->name }}</h5>
                        <p class="card text-center">{{ $r->kategori }} </p>
                        <p class="card text-center">{{ $r->lokasi }} </p>
                        <p class="card text-center">{{ $r->deskripsi }} </p>
                        <a href="/ulasan/{{$r->user_id}}" class="btn btn-primary" > Reviews</a>
                        {{-- <div class="card text-center"><a href="/checkinout" class="btn btn-primary">Check in/out</a></div> --}}
                        
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
                        <h2>Check in/out</h2>
                        <form action="#" method="GET">
                            <input type="text" name="checkin" value="<?php echo (isset($checkin_clicked))?$checkin_clicked:'';?>">
                            <button name="checkin" class="btn btn-primary">Check in</button>
                            <input type="text" name="checkout" value="<?php echo (isset($checkout_clicked))?$checkout_clicked:'';?>">
                            <button name="checkout" class="btn btn-primary">Check out</button>
                            {{-- <a href="/" class="btn btn-primary"> Kembali</a> --}}
                            <input type="submit" class="btn btn-primary" value="Simpan Data">
                        </form>
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
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $m->nama }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        <form action="/menu/store/{{$r->id}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-2 control-label"><b>Menu baru </b></div>
                                <div class="col-sm-4 input-group date" id="menu">
                                    <input type="text" class="form-control" name="menu" required="required"> <br />
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $r->user_id }}">
                            <input type="submit" class="btn btn-primary" value="Tambah menu">
                        </form>   
                    </div>
                </div>
            </div>
    </div>
</div>
@endforeach
@endsection
