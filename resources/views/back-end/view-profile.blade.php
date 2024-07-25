@extends('back-end.layout.main')
@section('main-section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- Main content -->


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center">
                                        <img width="200px" height="200px" class=" img-fluid img-cs rounded-lg"
                                            src="{{ url('/uploads/user_profiles/' . $data['profileImage']) }}" alt="User profile picture">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h1 class="bold text-center">{{ $data->firstName." ".$data->lastName }}</h1>
                                    <p class="text-muted text-center">{{ $data->email }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                            <b>Contact Number</b> <a class="float-right">{{ $data->phoneNumber }}</a>
                                        </li>

                                    </ul>
                                    <div class="row academic_view_btn">
                                        <div class="col-4 ">
                                            <a href="{{ url('/dashboard') }}" class=" float-right btn btn-primary btn-block"><b>Cancel</b></a>
                                        </div>
                                        <div class="col-4"><a href="{{ url('/user/edit',['id'=>$data->id]) }}" class=" float-right btn btn-success btn-block"><b>Edit</b></a></div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.col -->

                    <!-- /.col -->
                </div>




                <!-- /.row -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    @endsection
