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
                        {!! Form::model($telco, ['method' => 'PATCH','route' => ['autochargings.telcopostupdate', $telco->id]]) !!}
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $telco->name or  old('name') }}" >
                                </div>
                                <div class="form-group">
                                    <label for="key">Key:</label>
                                    <input name="key" type="text" class="form-control" id="key" placeholder="Enter key" value="{{ $telco->key or old('key') }}">
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon:</label>
                                    <input name="icon" type="text" class="form-control" id="icon" placeholder="Enter icon" value="{{ $telco->icon or old('icon') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control">{{ $telco->description or old('description')   }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="value">Value:</label>
                                    <input name="value" class="form-control" value="{{ $telco->value or old('value') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <input name="status" id="status" type="checkbox" value="status" data-toggle="toggle" style="display: none;" @if( $telco->status == 1 ) checked="checked" @endif >
                                    <div class="Switch Round @if($telco->status == 1) Off @else On @endif" style="vertical-align:top;margin-left:10px;">
                                        <div class="Toggle"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Nhà cung cấp hỗ trợ nhà mạng:</label>
                                    <?php var_dump($autoChargingProvider); ?>
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
