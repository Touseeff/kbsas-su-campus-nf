@extends('back-end.layout.main')
@section('main-section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
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
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($data == null)
                        @else
                            <input type="hidden" name="user_id" value="{{ $data->academic->user_id }}" id="">
                        @endif

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
                                            <select name="matric_category" class="form-control" style="width: 100%;">
                                                @if ($data == null)
                                                <option value="Computer">
                                                    Computer</option>
                                                <option value="Art">Art
                                                </option>
                                                <option value="Science">
                                                    Science</option>
                                                @else
                                                <option value="Computer" @if ($data->academic->matricCategory == 'Computer') selected @endif>
                                                    Computer</option>
                                                <option value="Art" @if ($data->academic->matricCategory == 'Art') selected @endif>Art
                                                </option>
                                                <option value="Science" @if ($data->academic->matricCategory == 'Science') selected @endif>
                                                    Science</option>
                                                @endif



                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Obtain Marks(only percentage %)</label>
                                            @if ($data == null)
                                            <input type="number" step="0.01" class="form-control"
                                            name="matric_percentage" value=""
                                            id="" aria-describedby="helpId" placeholder="" />
                                            @else
                                            <input type="number" step="0.01" class="form-control"
                                            name="matric_percentage" value="{{ $data->academic->matricPercentage }}"
                                            id="" aria-describedby="helpId" placeholder="" />
                                            @endif

                                        </div>

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Year (Matric Pass)</label>
                                            @if ($data == null)
                                            <input type="number" step="0.01" class="form-control" name="matric_year"
                                            value="" id=""
                                            aria-describedby="helpId" placeholder="" />
                                            @else
                                            <input type="number" step="0.01" class="form-control" name="matric_year"
                                            value="{{ $data->academic->matricYear }}" id=""
                                            aria-describedby="helpId" placeholder="" />
                                            @endif

                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select(Mark sheet/Paca Certificate)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    @if ($data == null)
                                                    <input type="file" value=""
                                                    class="custom-file-input" id="exampleInputFile"
                                                    name="matric_certificate">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile"></label>
                                                    @else
                                                    <input type="file" value="{{ $data->academic->matricCertificate }}"
                                                    class="custom-file-input" id="exampleInputFile"
                                                    name="matric_certificate">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ $data->academic->matricCertificate }}</label>
                                                    @endif

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
                                                <select name="inter_category" class="form-control" style="width: 100%;">
                                                    @if ($data == null)
                                                    <option value="Pre-Medical"
                                                    >Pre-Medical
                                                </option>
                                                <option value="Pre-Engineering"
                                                    >Pre-Engineering
                                                </option>
                                                <option value="Computer Scienc"
                                                   >Computer Scienc
                                                </option>
                                                    @else
                                                    <option value="Pre-Medical"
                                                    @if ($data->academic->InterCategory == 'Pre-Medical') selected @endif>Pre-Medical
                                                </option>
                                                <option value="Pre-Engineering"
                                                    @if ($data->academic->InterCategory == 'Pre-Engineering') selected @endif>Pre-Engineering
                                                </option>
                                                <option value="Computer Scienc"
                                                    @if ($data->academic->InterCategory == 'Computer Scienc') selected @endif>Computer Scienc
                                                </option>
                                                    @endif

                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="" class="form-label">Obtain Marks(only percentage
                                                    %)</label>
                                                    @if ($data == null)
                                                    <input type="number" class="form-control"
                                                    value=""
                                                    name="intermediate_percentage" step="0.01" id=""
                                                    aria-describedby="helpId" placeholder="" />
                                                    @else
                                                    <input type="number" class="form-control"
                                                    value="{{ $data->academic->InterPercentage }}"
                                                    name="intermediate_percentage" step="0.01" id=""
                                                    aria-describedby="helpId" placeholder="" />
                                                    @endif

                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Year (Intermediate Pass)</label>
                                                @if ($data == null)
                                                <input type="number" step="0.01" class="form-control"
                                                name="intermediate_year" value=""
                                                id="" aria-describedby="helpId" placeholder="" />
                                                @else
                                                <input type="number" step="0.01" class="form-control"
                                                name="intermediate_year" value="{{ $data->academic->InterYear }}"
                                                id="" aria-describedby="helpId" placeholder="" />
                                                @endif

                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputFile">Select(Mark sheet/Paca Certificate)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        @if ($data == null)
                                                        <input name="intermediate_certificate"
                                                        value=""
                                                        type="file" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile"></label>
                                                        @else
                                                        <input name="intermediate_certificate"
                                                        value="{{ $data->academic->InterCertificate }}"
                                                        type="file" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label"
                                                        for="exampleInputFile">{{ $data->academic->InterCertificate }}</label>
                                                        @endif

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
