@extends('back-end.layout.main')
@section('main-section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
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
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title text-center">Edit User Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('/user/update',['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">First Name</label>
                                                {{-- <input type="text" name="role_type" value="{{ $data->role_type }}" class="form-control" id="exampleInputRoleType" placeholder="Enter role type"> --}}
                                                i
                                                <input type="text" name="first_name" value="{{ $data->firstName }}"
                                                    class="form-control" id="exampleInputName1"
                                                    placeholder="Enter first name">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Last Name</label>
                                                <input type="text" value="{{ $data->lastName }}" name="last_name"
                                                    class="form-control" id="exampleInputName1"
                                                    placeholder="Enter last name">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" value="{{ $data->email }}" name="email" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Enter eamil address">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="number" name="phone_number" class="form-control" value="{{ $data->phoneNumber }}"
                                                    id="exampleInputEmail1" placeholder="Enter number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{-- <label for="exampleI nputPassword1">Password</label> --}}
                                                <input hidden type="password" name="password" value="{{ $data->password }}" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{-- <label for="exampleInputPassword1">Confirm Password</label> --}}
                                                <input hidden type="password" name="password_confirmation" class="form-control"
                                                    id="exampleInputphoneNumber" placeholder="Password">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" value="{{ $data->profileImage}}" name="profile_image" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">{{ $data->profileImage }}</label>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-primary" href="{{ url('/') }}">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
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
