@extends('master')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css') }}">
@endsection
@section('js')
<script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jQueryUI/jquery-ui.min.1.12.1.js') }}"></script>
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
                <h3 class="card-title">Edit News</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::model($news, ['method' => 'PATCH','route' => ['news.update', $news->id]]) !!}
                <div class="card-body row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="title">Title:</label>
                      <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $news->title or old('title') }}" >
                    </div>
                    <div class="form-group">
                      <label for="url_key">URL key:</label>
                      <input name="url_key" type="text" class="form-control" id="url_key" placeholder="Url key" value="{{ $news->url_key or old('url_key') }}">
                    </div>
                    <div class="form-group">
                      <label for="author">Author:</label>
                      <input name="author" type="text" class="form-control" id="author" value="{{ $news->author }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="author_email">Author email:</label>
                      <input name="author_email" type="text" class="form-control" id="author_email" value="{{ $news->author_email }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="language">View count:</label>
                      <input name="view_count" type="text" class="form-control" id="view_count" value="{{ $news->view_count }}" >
                    </div>
                    <div class="form-group">
                      <label for="language">Language:</label>
                      {!! Form::select('language', $languages, $news->language, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                      <label for="publish_date">Publish date:</label>
                        <input name="publish_date" type="text" class="form-control" id="publish_date" value="{{ $news->publish_date or old('publish_date') }}">
                        <script>
                          $(function() {
                            $('input[name="publish_date"]').daterangepicker({
                              timePicker: true,
                              autoUpdateInput: false,
                              locale: {
                                format: 'MM/DD/YYYY HH:mm',
                                cancelLabel: 'Clear'
                              }
                            });
                            $('input[name="publish_date"]').on('apply.daterangepicker', function(ev, picker) {
                              $(this).val(picker.startDate.format('MM/DD/YYYY HH:mm') + ' - ' + picker.endDate.format('MM/DD/YYYY HH:mm'));
                            });
                            $('input[name="publish_date"]').on('cancel.daterangepicker', function(ev, picker) {
                              $(this).val('');
                            });
                          });
                          </script>
                    </div>
                    <div class="form-group">
                      <label for="status">Status:</label>
                      <select class="form-control" name="status" id="status">
                        <option value="1" @if($news['status'] == 1) selected="selected" @endif>Active</option>
                        <option value="0" @if($news['status'] == 0) selected="selected" @endif>Inactive</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="short_description">Short description:</label>
                      <textarea name="short_description" id="short_description" class="form-control" rows="10">{{ $news->short_description or old('short_description') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="content">Content:</label>
                      <textarea name="content" id="content" class="form-control" rows="10" cols="80">{{ $news->content or old('content') }}</textarea>
                      <script>
                        $(function() {
                          // CKEDITOR.replace( 'content' );
                          ClassicEditor
                            .create( document.querySelector( '#content' ))
                            .catch( error => {
                              console.error( error );
                          } );
                        });
                      </script>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="tags">Tags:</label>
                          <select name="tags[]" id="tags" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" >
                            @foreach($tags as $tag)
                              <option value="{{ $tag->id }}" @if(in_array($tag->id, $selected_tags)) selected="selected" @endif>{{ $tag->label }} <samll>({{ $tag->code }})</small></option>
                            @endforeach
                          </select>
                        </div>
                        <script type="text/javascript">
                          $(function () {
                            //Initialize Select2 Elements
                            $('.select2').select2();
                          })
                        </script>
                        <div class="col-md-6">
                          <label for="tags">Add New Tag:</label>
                          <input name="new_tags" type="text" class="form-control" id="new_tags" value="{{ old('new_tags') }}">
                          <p class="help-block">Tag seperator by "<b>,</b>" .Example: tag1,tag2....</p>
                        </div>
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