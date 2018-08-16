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
                <h3 class="card-title">Create Tag</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form action="{{ url($backendUrl.'/tags/list/store') }}" method="POST"> -->
              {!! Form::open(array('route' => 'tagslist.store','method'=>'POST')) !!}
                <div class="card-body row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label">Tag Label:</label>
                      <input name="label" type="text" class="form-control" id="label" placeholder="Tag Label" value="{{ old('label') }}" >
                    </div>
                    <div class="form-group">
                      <label for="code">Tag Code:</label>
                      <input name="code" type="text" class="form-control" id="code" placeholder="Tag Code" value="{{ old('code') }}">
                    </div>
                    <div class="form-group">
                      <label for="author">Author:</label>
                      <input name="author" type="text" class="form-control" id="author" value="{{ $author }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="description">Description:</label>
                      <textarea name="description" id="description" class="form-control" rows="10">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="status">Status:</label>
                      <select class="form-control" name="status" id="status">
                        <option value="1" selected="selected">Active</option>
                        <option value="0">Inactive</option>
                      </select>
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