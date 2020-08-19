
@extends('layouts.dashboard.main')

@section('title', 'Edit Category Hotel')


@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Data Category Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('update_category_hotel', $hotel->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
        
        <div class="row">
          <div class="col-md-7">

 <div class="form-group">
          <label for="negara">Nama Negara</label>
          <input type="text" class="form-control @error('negara') is-invalid @enderror"  name="negara" placeholder="Masukan Nama Negara" value="{{$hotel->negara}}">
          @error('negara')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

          
      

           <button type="submit" class="btn btn-info">Submit</button>
           </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>


@endsection
