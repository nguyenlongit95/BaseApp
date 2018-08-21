@extends('master')

@section('css')

@endsection
@section('js')

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    <!-- general form elements -->

                    @include('layouts.errors')

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Telco</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(array('route' => 'autochargings.telcopostcreate','method'=>'POST')) !!}
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Meta Title:</label>
                                    <input name="name" type="text" class="form-control" id="meta_title" placeholder="Name" value="{{ old('name') }}" >
                                </div>
                                <div class="form-group">
                                    <label for="key">Key Descriptions:</label>
                                    <input name="meta_description" type="text" class="form-control" id="key" placeholder="Enter key" value="{{ old('key') }}">
                                </div>

                                <div class="form-group">
                                    <label for="icon">Key Words:</label>
                                    <input name="meta_keywords" type="text" class="form-control" id="icon" placeholder="Enter icon" value="{{ old('icon') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="value">Page Title:</label>
                                    <input type="text" name="page_title" class="form-control" />
                                </div>



                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
