@extends('layouts.app')
<style>

 .comment {
    resize: none;
    width: 1000px;
    height: 100px;
    
}

</style>
@section('content')

{{-- @foreach ($ulasan as $u) --}}
<form action="/ulasan/store/{{$id}}" method="post">
    {{ csrf_field() }}
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
    {{-- <input type="hidden" name="id" value="{{ $id }}"> <br/> --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <input type="hidden" name="user_id" value="{{ Auth::id() }}"> <br/>
    <input type="hidden" name="restoran_id" value="{{ $id }}"> <br/>
    <div class="form-group row">
        <label class="col-sm-2" for="sks"> Review </label>
        <div class="col-sm-10">
            <textarea rows="4" cols="50" name="review" class="comment" required="required"></textarea>
        </div>
    </div>

    <div class="d-flex text-center">
             <button type="submit" class="btn btn-primary"> Simpan Data </button>
             <a href="/ulasan/{{ $id }}" class="btn btn-primary"> Kembali </a>
    </div>

</form>
{{-- @endforeach --}}
@endsection
