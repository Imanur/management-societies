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
            @if(Session::has('failed'))
            <div class="alert alert-danger" role="alert">
              {{ Session::get('failed') }}
            </div>
            @endif
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
            <form action="{{ url('admin/societies/edit/' .  $society->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="NIK" value="{{ $society->nik }}" @disabled($society->nik)>
                        @error('nik')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" placeholder="Fullname" value="{{ $society->fullname }}">
                        @error('fullname')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="pob">Birth Of Place</label>
                        <input type="text" class="form-control @error('pob') is-invalid @enderror" name="pob" id="pob" placeholder="Birth Of Place" value="{{ $society->pob }}">
                        @error('pob')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="dob">Birth Of Date</label>
                        <input type="text" class="custom-select datepicker @error('pob') is-invalid @enderror" name="dob" id="dob" placeholder="Birth Of Date" value="{{ $society->dob }}">
                        @error('dob')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="profession">Profession</label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" id="profession" placeholder="Profession" value="{{ $society->profession }}">
                        @error('profession')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" id="religion" placeholder="Religion" value="{{ $society->religion }}">
                        @error('religion')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror   
                      </div>
                      
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" placeholder="Gender" value="{{ $society->gender }}">
                        @error('gender')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="col-sm-6">
                        <label for="marital_status">Marital Status</label>
                        <input type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" id="marital_status" placeholder="Marital Status" value="{{ $society->marital_status }}">
                        @error('marital_status')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror 
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6">   
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality" placeholder="Nationality" value="{{ $society->nationality }}">

                          @error('nationality')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror 
                    </div>
                    <div class="col-sm-6">
                        <label for="photo">Photo</label>
                        <div class="input-group">
                          <label for="photo" class="form-label"></label>
                              <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo" value="{{ $society->photo }}" onchange="previewImg()">
                              @error('photo')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror 
                        </div>
                      </div>
                        
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="address">Address</label>
                      <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address">{{ $society->address }}</textarea> 
                        @error('address')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                       @enderror    
                    </div>
                    @if($society->photo)
                    <img src="{{ url('storage/'.$society->photo) }}" class="img-preview img-fluid col-sm-1" alt="photo-ktp" >
                    @else
                    <img class="img-preview img-fluid" alt="photo-ktp">
                    @endif
                    @error('photo')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror 
                  </div>
              

                <div class="footer">
                    <button type="submit" class="btn btn-primary btn-md">Update</button>
                </div>
              </form>
          </div>
          
        </div>
  
      </section>
    </div>
  
    <footer class="main-footer">
    
      Copyright &copy; @php echo date('Y') @endphp  All rights reserved.

    </footer>
 
  </div>

  <script>
    function previewImg(){
        const image = document.querySelector('#photo')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const readImage = new FileReader()
        readImage.readAsDataURL(image.files[0])

        readImage.onload = function(e){
            imgPreview.src = e.target.result
        }
    }
  </script>


@endsection