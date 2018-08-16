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
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(array('route' => 'products.store','method'=>'POST')) !!}
                <div class="card-body row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name" value="{{ old('name') }}" >
                    </div>
                    <div class="form-group">
                      <label for="url">URL:</label>
                      <input name="url" type="text" class="form-control" id="url" placeholder="Enter Url" value="{{ old('url') }}">
                    </div>
                    <div class="form-group">
                      <label for="url">Catalogs:</label>
                      {!! Form::select('catalog', $lsCat,[], array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                      <div class="row">
                      <div class="col-6 float-left text-center">
                        <label style="display: block;">Image:</label>
                      <input class="form-control" placeholder="Enter image" name="image" type="hidden" value="{{ old('image') }}">
                      <a class="btn btn-default btn_upload_image " file_type="image" selecter="image">Upload <i class="fa fa-cloud-upload"></i></a>
                      <div class="uploaded_image hide">
                        <img src=""><i title="Remove Image" class="fa fa-times"></i>
                      </div>
                      </div>
                      <div class="col-6 text-center">
                        <label style="display: block;">Other Image:</label>
                        <input class="form-control" placeholder="Enter favicon" name="image_other" type="hidden" value="{{ old('image_other') }}">
                        <a class="btn btn-default btn_upload_image " file_type="image" selecter="image_other">Upload <i class="fa fa-cloud-upload"></i></a>
                        <div class="uploaded_image hide">
                          <img src=""><i title="Remove Image" class="fa fa-times"></i>
                        </div>
  
                      </div></div>
                    </div>

                    <div class="form-group">
                      <label for="description">Descriptions:</label>
                      <textarea name="description" id="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="order">Order:</label>
                      <input name="order" type="text" class="form-control" id="order" placeholder="Enter Order" value="{{ old('order') }}">
                    </div>
                    <div class="form-group">
                      <label for="public">Is Public ?</label>
                        <input name="public" type="checkbox" value="public" data-toggle="toggle" style="display: none;">
                        <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">
                            <div class="Toggle"></div>
                        </div>
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