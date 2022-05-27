@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group my-flex">
                                    <div class="input-container">
                                        <input type="text" class="form-control" name="cari" placeholder="Cari Restoran"
                                            value="{{ old('cari') }}">
                                    </div>
                                    <input type="submit" class="btn btn-default" value="CARI">
                                </div>

                                </form>
                            </div>
                            <div class="card-header">Daftar Restoran</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="row">
                                    @foreach ($resto as $r)
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $r->name }}</h5>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to
                                                        additional content.</p>
                                                    <a href="/resto/view/{{ $r->id }}" class="btn btn-primary">View
                                                        Details</a>
                                                        <a href="/resto/view/{{ $r->id }}" class="btn btn-primary">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <form class="form-horizontal" action="#" method="post">
        {{ csrf_field() }}
        <div class="form-group">
                <label for="dtpickerdemo" class="col-sm-2 control-label">Tanggal :</label>
                <div class="col-sm-6">
                    <div class='col-sm-6 input-group date ' id='dtpickerdemo'>
                        <input type='text' class="form-control" name="tgl">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
                <script type="text/javascript">
                    $(function () {
                        $('#dtpickerdemo').datetimepicker({format : "YYYY-MM-DD hh:mm", "defaultDate":new Date() });
                    });
                </script>
        </div>
    </div>
</div>
</form> --}}
@endsection
