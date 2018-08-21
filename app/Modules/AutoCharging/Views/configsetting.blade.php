@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminlte/plugins/fastclick/fastclick.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("tr.irow").click(function(){
                var id = $(this).attr('data-id');
                $( "#CharigngAjaxContent" ).html('');
                $.get( "/admin/ajax/charging/"+id, function( data ) {
                    $( "#CharigngAjaxContent" ).html( data );
                });
                $("#ChargingModal").modal();
            });
        });
    </script>
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
                            <h3 class="card-title">Update Settings</h3>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body" style="padding-top: 0;">
                            <div class="row"><div class="col-sm-12">

                                    <!-- -->
                                    @foreach($autoChargingSetting as $autoChargingSetting)
                                        {!! Form::model($autoChargingSetting, ['method' => 'PATCH','route' => ['autochargins.setting.update', $autoChargingSetting->id]]) !!}
                                        <div class="card-body row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">#:</label>
                                                    <input name="id" disabled="" type="text" class="form-control" id="id" placeholder="id" value="{{ $autoChargingSetting->id }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="key">Tiêu Đề Web:</label>
                                                    <input name="meta_title" type="text" class="form-control" id="meta_title" placeholder="Enter key" value="{{ $autoChargingSetting->meta_title }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="icon">Chi Tiết Tiêu Đề</label>
                                                    <input name="meta_description" type="text" class="form-control" id="meta_description" placeholder="Enter icon" value="{{ $autoChargingSetting->meta_description	 }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Từ Khóa</label>
                                                    <input name="meta_keywords" class="form-control" value="{{ $autoChargingSetting->meta_keywords }}" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="value">Tiêu Đề</label>
                                                    <input name="page_title" class="form-control" value="{{ $autoChargingSetting->page_title }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Chi Tiết</label>
                                                    <textarea name="description" class="form-control ckeditor">{{ $autoChargingSetting->description }}</textarea>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        {!! Form::close() !!}
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

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
