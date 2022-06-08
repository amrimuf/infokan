@extends('layouts.app')

@section('content')
    @foreach ($resto as $r)
        <form action="/resto/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $r->user_id }}">

            <div class="container">
                <div class="row">
                    <div class='col'>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><b>Deskripsi </b></div>
                            <div class="col-sm-4 input-group date" id="deskripsi">
                                <input type="text" class="form-control" name="deskripsi" required="required"
                                    value="{{ $r->deskripsi }}"> <br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><b>Lokasi </b></div>
                            <div class="col-sm-4 input-group date" id="lokasi">
                                <input type="text" class="form-control" name="lokasi" required="required"
                                    value="{{ $r->lokasi }}"> <br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><b>Kategori </b></div>
                            <div class="col-sm-4 input-group date" id="kategori">
                                <input type="text" class="form-control" name="kategori" required="required"
                                    value="{{ $r->kategori }}"> <br />
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                    </div>
                    <br>
                    <div class="row">
                        <a href="/resto/delete/{{ $r->id }}"
                            onclick="return confirm('Are you sure want to delete this restaurant?')" class="btn btn-danger"
                            role="button">Hapus</a>
                    </div>
                </div>
            </div>
        </form>
        <br>
    @endforeach
@endsection
