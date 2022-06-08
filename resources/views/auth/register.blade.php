@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div>Are you signing up as a restaurant?</div>
                            <div class="form-check">
                                <input class="resto form-check-input" type="radio" name="is_restoran" id="flexRadioDefault1" value="1" required="required">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="nonresto form-check-input" type="radio" name="is_restoran" id="flexRadioDefault2" value="0">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  No
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="nama col-md-4 col-form-label text-md-right">{{ __('Your Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="form-resto d-none">
                            <div class="form-group row">
                                <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="lokasi" value="{{ old('Address') }}" autocomplete="Address" autofocus>
    
                                    @error('Address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Kategori" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Kategori" type="text" class="form-control @error('Kategori') is-invalid @enderror" name="kategori" value="{{ old('Kategori') }}" autocomplete="Kategori" autofocus>
    
                                    @error('Kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" autocomplete="deskripsi" autofocus></textarea>
    
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".resto").click(function(){
    $(".nama").text("Restaurant Name");
  });
  $(".nonresto").click(function(){
    $(".nama").text("Your Name");
  });
});
</script>
@endsection
