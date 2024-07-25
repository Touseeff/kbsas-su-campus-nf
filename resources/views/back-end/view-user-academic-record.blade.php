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
                                        <a href="{{ url('/uploads/matric_certificate/' . $row->matricCertificate) }}" download>
                                            <img width="250px"class="img-fluid img-cs rounded-lg"
                                                src="{{ url('/uploads/matric_certificate/' . $row->matricCertificate) }}" alt="User profile picture">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-8">
                                    <h3 class="text-bold">Matriculation Record</h3>
                                    {{-- <h3 class="profile-username text-center">{{ $row->firstName." ".$row->lastName }}</h3> --}}
                                    {{-- <p class="text-muted text-center">{{ $row->email }}</p> --}}

                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                            <b>Category</b> <a class="float-right">{{ $row->matricCategory }}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Passing Year</b> <a class="float-right">{{ $row->matricYear	}}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Obtain Marks (Precentage)</b> <a class="float-right">{{ $row->matricPercentage}} %</a>
                                        </li>
                                    </ul>
                                    {{-- <div class="row">
                                        <div class="col-4 ">
                                            <a href="{{ url('/user/show') }}" class=" float-right btn btn-primary btn-block"><b>Cancel</b></a>
                                        </div>
                                        <div class="col-4"><a href="#" class=" float-right btn btn-success btn-block"><b>Edit</b></a></div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-4">
                                    <div class="text-center">
                                        <a href="{{ url('/uploads/intermediate_certificate/' . $row->InterCertificate) }}" download>
                                            <img width="250px" class="img-fluid img-cs rounded-lg"
                                                src="{{ url('/uploads/intermediate_certificate/' . $row->InterCertificate) }}" alt="User profile picture">
                                        </a>
                                    </div>

                                </div>
                                <div class="col-8">
                                    <h3 class="text-bold">Intermediate Record</h3>
                                    {{-- <h3 class="profile-username text-center">{{ $row->firstName." ".$row->lastName }}</h3> --}}
                                    {{-- <p class="text-muted text-center">{{ $row->email }}</p> --}}

                                    <ul class="list-group list-group-unbordered mb-3">

                                        <li class="list-group-item">
                                            <b>Category</b> <a class="float-right">{{ $row->InterCategory }}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Passing Year</b> <a class="float-right">{{ $row->InterYear }}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Obtain Marks (Precentage)</b> <a class="float-right">{{ $row->InterPercentage}} %</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-3 m-1 academic_view_btn">
                            <div class="col-4 ">
                                <a href="{{ url('/user/show') }}" class=" float-right btn btn-primary btn-block"><b>Cancel</b></a>
                            </div>
                            <div class="col-4"><a href="{{ url('/academic/edit',['id'=>$row->user_id]) }}" class=" float-right btn btn-success btn-block"><b>Edit</b></a></div>
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
