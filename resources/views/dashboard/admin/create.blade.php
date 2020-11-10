@extends('layouts.dashboard.main')
@section('title', 'Create Admin')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create Admin</h6>
           
            
          </div>
          
            <div class="card-body">
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                 
                     @foreach($users as $user)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                      <td>
                      <form action="{{route('store_admin')}}" method="post"> 
                        @csrf
                        <button type="submit" class="btn btn-success btn-circle btn-sm" name="email" value="{{$user->email}}">
                        <i class="fas fa-plus"></i>
                        </button>
                      </form>      
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
              <div class="card-footer py-3">
             
              
          </div>
          </div>
      </div>



@endsection
@push('footer')
  <script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
  </script>
@endpush