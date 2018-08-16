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
      @include('layouts.errors')

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit: {{ $slider->slider_name }}</h3>
        </div>

        <!-- form start -->
        {!! Form::model($slider, ['method' => 'PATCH','route' => ['sliders.update', $slider->id],'enctype'=>'multipart/form-data']) !!}
        <div class="card-body row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="slider_name">Name:</label>
              <input name="slider_name" type="text" class="form-control" id="slider_name" placeholder="Name" value="{{ $slider->slider_name or old('slider_name') }}" >
            </div>

            <div class="form-group">
              <label for="slider_image">Images:</label>
              <img src="{{ asset('storage/app/'.$slider->slider_image) }}" alt="" class="img-thumbnail" width="200" height="100" />
              <input type="file" name="slider_image" class="form-control form-control-sm">
            </div>

            <!-- <div class="form-group">
              <label for="slider_url">Url:</label>
              <input name="slider_url" type="text" class="form-control" id="slider_url" placeholder="Slider Url" value="{{ $slider->slider_url or old('slider_url') }}" >
            </div> -->
            
            <div class="form-group">
              <label for="slider_btn_text">Button name:</label>
              <input name="slider_btn_text" type="text" class="form-control" id="slider_btn_text" placeholder="Button Name" value="{{ $slider->slider_btn_text or old('slider_btn_text') }}" >
            </div>
            
            <div class="form-group">
              <label for="slider_btn_url">Button Url:</label>
              <input name="slider_btn_url" type="text" class="form-control" id="slider_btn_url" placeholder="Button Url" value="{{ $slider->slider_btn_url or old('slider_btn_url') }}" >
            </div>

            <div class="form-group">
              <label for="slider_text">Text:</label>
              <textarea name="slider_text" id="slider_text" class="form-control" rows="5">{{ $slider->slider_text or old('slider_text') }}</textarea>
            </div>

            <div class="form-group">
              <label for="sort_order">Sort Order:</label>
              <input name="sort_order" type="text" class="form-control" id="sort_order" placeholder="Sort Order" value="{{ $slider->sort_order or old('sort_order') }}" >
            </div>

            <div class="form-group">
              <label for="status" style="width: 100%">Enable:</label>
              <input name="status" id="status" type="checkbox" value="1" data-toggle="toggle" style="display: none;" @if($slider->status == 1) checked="checked" @endif>
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

    </div>
  </div>
</section>
<!-- /.content -->
@endsection