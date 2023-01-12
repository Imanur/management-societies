@extends('layouts.tdashboard')

@section('dash')

<div class="wrapper">
   
  @include('layouts.navbar')
    
  @include('layouts.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{ $breadcrumb }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
  
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $breadcrumb }}</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Nik</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Profession</th>
                <th>Religion</th>
                <th>Status</th>
                <th>Nationality</th>
                <th>Age</th>
                <th>Photo</th>
              </tr>
              </thead>
              @php
              $no = 1;
              use Carbon\Carbon;
              @endphp
              <tbody>
               
              <tr>
                <td>{{ $society->nik }}</td>
                <td>{{ strtoupper($society->fullname) }}</td>
                <td>{{ strtoupper($society->gender) }}</td>
                <td>{{ strtoupper($society->pob) }}, {{ date('d-m-Y',strtotime($society->dob)) }}</td>
                <td>{{ strtoupper($society->address) }}</td>
                <td>{{ strtoupper($society->profession) }}</td>
                <td>{{ strtoupper($society->religion) }}</td>
                <td>{{ strtoupper($society->marital_status) }}</td>
                <td>{{ strtoupper($society->nationality) }}</td>
                <td>{{ Carbon::parse($society->dob)->age}} </td>
                <td><a href="{{ url('storage/'.$society->photo) }}"><img src="{{ url('storage/'.$society->photo) }}" width="30px" height="40px" alt="ktp-photo"></a></td>
              </tr>
              
              </tbody>
            </table>
          </div>
          
        </div>
  
      </section>
    </div>
  
    <footer class="main-footer">
    
      Copyright &copy; @php echo date('Y') @endphp  All rights reserved.

    </footer>
 
  </div>


@endsection