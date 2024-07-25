@extends('back-end.layout.main')
@section('main-section')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

                <a class="btn btn-primary" href="{{ route('user.create') }}">Add User</a>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Bordered Table</h3>
                </div>
                {{-- message --}}
                @if (session('delete_message'))
                <div class="alert alert-success" id="alert-message">
                    {{ session('delete_message') }}
                </div>
            @endif
                {{-- message --}}
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">S/no</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th >Profile Image</th>
                        <th class="text-center" colspan="3">Staus</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $row['firstName']." ".$row['lastName'] }}</td>
                            <td>{{ $row['email'] }}</td>
                            <td>
                                <img class="rounded-circle " src="{{ url('/uploads/user_profiles/' . $row['profileImage']) }}" alt="profile image" max-width="100px" sizes="" srcset="">
                            </td>

                            <td class="text-center " ><a class="btn btn-dark" href="{{ url("/user/view",['id'=>$row['id']]) }}">view</a></td>
                            <td><a class="btn btn-success" href="">Edit</a></td>
                            <td class="text-center"><a class="btn btn-danger" href="{{ url('/user/delete',['id'=>$row['id']]) }}">Delete</a></td>
                          </tr>
                          @php
                              $count++;
                          @endphp
                        @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card -->


              <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>




          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @endsection









