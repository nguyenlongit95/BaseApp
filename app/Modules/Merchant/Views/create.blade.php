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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tạo đối tác API</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(array('route' => 'merchants.store','method'=>'POST')) !!}
                <div class="card-body row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Tên đối tác:</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}" >
                    </div>
                    <div class="form-group">
                      <label for="user">Khách hàng:</label>
                      <input name="user" type="text" class="form-control" id="user" placeholder="User ID" value="{{ old('user') }}" >
                    </div>

                    <div class="form-group">
                      <label for="partner_id">Partner ID:</label>
                      <input name="partner_id" type="text" class="form-control" id="partner_id" placeholder="Partner ID" value="{{ strrev(time()) }}" >
                    </div>
                    <div class="form-group">
                      <label for="partner_key">Partner Key:</label>
                      <input name="partner_key" type="text" class="form-control" id="partner_key" placeholder="Partner Key" value="{{ md5(now().'NC') }}" >
                    </div>
                    <div class="form-group">
                      <label for="wallet_num">Địa chỉ ví:</label>
                      <input name="wallet_num" type="text" class="form-control" id="wallet_num" placeholder="Ví dụ: 00555666888" value="{{ old('wallet_num') }}" >
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ips">IP đối tác:</label>
                      <input name="ips" type="text" class="form-control" id="ips" placeholder="Các Ip cách nhau bằng dấu phẩy ," value="{{ old('ips') }}">
                    </div>
                    <div class="form-group">
                      <label for="website">Website đối tác:</label>
                      <input name="website" type="text" class="form-control" id="website" placeholder="http://" value="{{ old('website') }}">
                    </div>

                    <div class="form-group">
                      <label for="description">Mô tả về đối tác:</label>
                      <textarea name="description" id="description" class="form-control" placeholder="Mô tả">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="icon">Image:</label>
                      <input name="icon" type="text" class="form-control" id="icon" placeholder="Logo đối tác" value="{{ old('icon') }}">
                    </div>

                    <div class="form-group">
                      <label for="status">Status:</label>
                      <input name="status" id="status" type="checkbox" value="status" data-toggle="toggle" style="display: none;" checked="checked">
                      <div class="Switch Round On" style="vertical-align:top;margin-left:10px;">
                        <div class="Toggle"></div>
                      </div>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm đối tác</button>
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