@extends('layouts.app')

@section('content')
    <form action="/resto/store" method="post">
        {{ csrf_field() }}

        <div class="container">
            <div class="row">
                <div class='col'>
                    <div class="form-group">
                        <div class="col-sm-2 control-label"><b>Deskripsi </b></div>
                        <div class="col-sm-4 input-group date" id="deskripsi">
                            <input type="text" class="form-control" name="deskripsi" required="required"> <br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col'>
                    <div class="form-group">
                        <div class="col-sm-2 control-label"><b>Lokasi </b></div>
                        <div class="col-sm-4 input-group date" id="lokasi">
                            <input type="text" class="form-control" name="lokasi" required="required"> <br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col'>
                    <div class="form-group">
                        <div class="col-sm-2 control-label"><b>Kategori </b></div>
                        <div class="col-sm-4 input-group date" id="kategori">
                            <input type="text" class="form-control" name="kategori" required="required"> <br />
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="container">
                <input type="submit" class="btn btn-primary" value="Simpan Data">
                <a href="/" class="btn btn-primary"> Kembali </a>
            </div>
        </div>
    </form>
@endsection
