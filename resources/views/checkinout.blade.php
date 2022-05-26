@extends('layouts.app')

@section('content')

<?php
if(isset($_GET['click']))
{
    date_default_timezone_set('Asia/Jakarta');
    $date_clicked = date('Y-m-d H:i:s');
    
}

?>
    <h2>Check in/out</h2>
    <form action="#" method="GET">
        <input type="text" name="checkin" class="checkin" value="<?php echo (isset($date_clicked))?$date_clicked:'';?>">
        <button name="checkin" class="checkin btn btn-primary">Check in</button>
        <button name="checkout" class="checkout btn btn-primary">Check out</button>
        <a href="/" class="btn btn-primary"> Kembali</a>
        <input type="submit" class="btn btn-primary" value="Simpan Data">
    </form>

@endsection