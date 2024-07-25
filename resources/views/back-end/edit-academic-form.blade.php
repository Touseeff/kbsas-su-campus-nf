@extends('back-end.layout.main')
@section('main-section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Academic Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        @if (!Session::get('user_id'))
                        <a class="btn btn-primary" href="{{ url('/academic/create') }}">Add Academic Records</a>
                        @endif

                        </ol>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- Main content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/academic/add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- matric start --}}
                        <div class="card card-default">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Add Matric Details</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Catigory</label>
                                            <select name="matric_category" class="form-control select2" style="width: 100%;">
                                                <option value="Science" selected="selected">Science</option>
                                                {{-- <option>Science</option> --}}
                                                <option value="Art">Art</option>
                                                <option value="Conputer">Computer</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Obtain Marks(only percentage %)</label>
                                            <input type="number" step="0.01"  class="form-control" name="matric_percentage" id=""
                                                aria-describedby="helpId" placeholder="" />
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year (Matric Pass)</label>
                                            <select name="matric_year" class="form-control select2" style="width: 100%;">
                                                <option value="2024" selected="selected">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select(Mark sheet/Paca Certificate)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="matric_certificate">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            {{-- matric end --}}
                            {{-- inter start --}}
                            <div class="card card-default">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title ">Add Intermediate Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Catigory</label>
                                                <select name="intermediate_category" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Pre-Medical</option>
                                                    {{-- <option>Science</option> --}}
                                                    <option value="Pre-Engineering">Pre-Engineering</option>
                                                    <option value="Pre-Conputer Science">Pre-Computer Science</option>
                                                    <option value="Pre-Art">Pre-Art< /option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="" class="form-label">Obtain Marks(only percentage
                                                    %)</label>
                                                <input type="number" class="form-control" name="intermediate_percentage" step="0.01" id=""
                                                    aria-describedby="helpId" placeholder="" />
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year (Intermediate Pass)</label>
                                                <select name="intermediate_year" class="form-control select2" style="width: 100%;">
                                                    <option value="2024" selected="selected">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputFile">Select(Mark sheet/Paca Certificate)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="intermediate_certificate" type="file" class="custom-file-input"
                                                            id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                {{-- inter end --}}
                            </form>
                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                </div>
                @if ($errors->Any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif
            </div>
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
