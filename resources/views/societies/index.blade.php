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
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
  
       <div class="container-fluid">
          <div class="col pr-5 pb-4">
            <a href="{{ url('admin/societies/create') }}" class="btn btn-primary btn-md"><i class="fas fa-plus"> </i> Society</a>
            <a href="{{ url('admin/societies/export-csv') }}" class="btn btn-success btn-md"><i class="fas fa-download"> </i> CSV</a>
            <a href="{{ url('admin/societies/import-csv') }}" class="btn btn-warning btn-md" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-upload"> </i> CSV</a>
            <a href="{{ url('admin/societies/export-pdf') }}" class="btn btn-danger btn-md"><i class="fas fa-download"> </i> PDF</a>
            
          </div>
       </div>
       
       @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
               {{ Session::get('success') }}
            </div>
        @endif
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
                <th>No</th>
                <th>Nik</th>
                <th>Name</th>
                <th>Profession</th>
                <th>Religion</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($data as $k => $s)
              <tr>
                <td>{{ ++$k }}</td>
                <td>{{ $s->nik }}</td>
                <td>{{ strtoupper($s->fullname) }}</td>
                <td>{{ strtoupper($s->profession) }}</td>
                <td>{{ strtoupper($s->religion) }}</td>
                <td>
                  <a href="{{ url('admin/societies/'.$s->id) }}" class="badge badge-info btn-sm"><i class="far fa-eye"></i></a>
                  <a href="{{ url('admin/societies/edit/'.$s->id) }}" class="badge badge-warning btn-sm"><i class="far fa-edit"></i></a>
                  <a href="{{ url('admin/societies/delete/'.$s->id) }}" class="badge badge-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach
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


  {{-- Modal Import CSV --}}

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('admin/societies/import-csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection