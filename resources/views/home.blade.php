@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Restoran</div>

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
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
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
        <input type="text" name="checkin" class="checkin" value="<?php echo (isset($checkin_clicked))?$checkin_clicked:'';?>">
        <button name="checkin" class="btn btn-primary">Check in</button>
        <input type="text" name="checkout" class="checkout" >
        <button name="checkout" class="btn btn-primary">Check out</button>
        <a href="/" class="btn btn-primary"> Kembali</a>
        <input type="submit" class="btn btn-primary" value="Simpan Data">
    </form>
</div>
@endsection