@extends('layouts.app')
<style>

 .comment {
    resize: none;
    width: 1000px;
    height: 100px;
    
}

</style>
@section('content')



    {{-- <div class="form-group row">
        <label class="col-sm-2" for="nrp">NRP </label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" name="nrp" required="required">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2" for="nilaiangka"> Nilai Angka </label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" name="nilaiangka" required="required">
        </div>
    </div> --}}
@foreach ($ulasan as $u)
<form action="/ulasan/update/{{$u->user_id}}" method="post">
    {{ csrf_field() }}
<input type="hidden" name="id" value="{{ $u->id }}"> <br/>
    <div class="form-group row">
        <label class="col-sm-2"> Review </label>
        <div class="col-sm-10">
            <textarea rows="4" cols="50" name="review" class="comment" required="required">{{ $u->review }}</textarea>
        </div>
    </div>

    <div class="d-flex text-center">
             <button type="submit" class="btn btn-primary"> Simpan Data </button>
             <a href="/ulasan/{{$u->user_id}}" class="btn btn-primary"> Kembali </a>
    </div>

</form>
@endforeach

@endsection
