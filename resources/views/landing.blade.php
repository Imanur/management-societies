@extends('layouts.template')
@section('section')

<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <div class="h1"><b>{{ $b }}</b></div>
      </div>
      <div class="card-body">
            <p class="login-box-msg">{{ $p }}</p>
          <div class="row">
            <div class="col-12">
              <a href="{{ url('login') }}" class="btn btn-info btn-block">Now</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection