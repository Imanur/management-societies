@extends('layouts.template')
@section('section')

<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <div class="h1"><b>Sign In</b></div>
      </div>
      <div class="card-body">
            <p class="login-box-msg">Sign In To Your Account!</p>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
            </div>
        @elseif(Session::has('failed'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('failed') }}
        </div>
        @endif
        <form action="{{ url('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
              <a href="{{ url('register') }}" class="btn btn-secondary btn-block">Sign Up</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection