@extends('layouts.app')

@section('content')
<!-- check in out button -->
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
        <a href="/" class="btn btn-primary"> Kembali</a>
        <input type="submit" class="btn btn-primary" value="Simpan Data">
    </form>


@endsection