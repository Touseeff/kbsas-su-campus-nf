@extends('back-end.layout.header')
<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            {{-- <center> --}}
            <div class="col-3"></div>
            <div class="col-6 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-center">Sign In</h3>
                    </div>
                    <br>

                    @if (session('message'))
                        <div class="alert alert-danger" id="alert-message">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{-- @if (session('message'))
                        <div class="alert alert-{{ session('message')}}">
                            {{ session('message') }}
                        </div>
                    @endif --}}


                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ url('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter eamil address">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ url('/') }}">
                                Cancel
                            </a>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer pb-3">
                            <a class="text-dark" href="">Don't have an account yet?</a>
                            <a href="{{ url('/user/create') }}">Create Account</a>
                            <br>
                            {{-- <p>I forgot my password</p> --}}
                            <a class="pt-5" href="{{ url('user/forgot') }}">I forgot my password</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>

            {{-- </center> --}}
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@extends('back-end.layout.footer-script')
