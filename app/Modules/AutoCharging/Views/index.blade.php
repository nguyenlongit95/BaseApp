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
<style>

.modal-dialog {
    max-width: 1000px;
    margin: 1.75rem auto;
}

</style>
<div class="modal fade" id="ChargingModal" tabindex="-1" role="dialog" aria-labelledby="ChargingModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="CharigngAjaxContent"></div>
        </div>
    </div>
</div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.errors')
                <div class="card">

                    <div class="card-header" style="border-bottom: 0">
                        <h3 class="card-title">List Auto CardCharging</h3>

                        <div class="card-tools " style="float: left;position: relative;right: 0px;left: 20px;">
                            <div class="input-group input-group-sm dataTables_filter" style="">
                                <form action="" name="formSearch" method="GET" class="form-inline" >
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control" placeholder="User " />
                                    </div>
                                    <div class="form-group">
                                        <select name="telco" class="form-control">
                                            <option>VIETTEL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="amount" class="form-control">
                                            <option>10000</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="" style="">
                                            <input type="hidden" name="control" value="search" />
                                            <button type="submit" value="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="float-right" style="">
                            <a href="{{ url($backendUrl.'/autochargings/history') }}"><button class="btn btn-success"><i class="fa fa-history" aria-hidden="true"></i> History Charging</button></a>
                            <a href="{{ url($backendUrl.'/autochargings/settings') }}"><button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Settings</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ url($backendUrl.'/chargings/actions') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body" style="padding-top: 0;">
                            <div class="row"><div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                        <tr>
                                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" id="checkall">
                                                    <span class="lbl"></span> </label>
                                            </th>
                                            <th>Trạng thái</th>
                                            <th>Khách hàng</th>
                                            <th>Mã nạp</th>
                                            <th>Sơ-ri</th>
                                            <th>Nhà mạng</th>
                                            <th>Mệnh giá</th>
                                            <th>Phí</th>
                                            <th>Nhận về</th>
                                            <th>Đơn hàng</th>
                                            <th>Hình thức</th>
                                            <th>Request ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $chargings as $charging )
                                            <tr class="irow" data-id="{{ $charging->id }}">
                                                <td class="center"><label class="pos-rel">
                                                        <input type="checkbox" class="ace mycheckbox" value="{{ $charging->id }}" name="check[]">
                                                        <span class="lbl"></span> </label>
                                                </td>
                                                <td>
                                                    @if($charging->status == 1)
                                                        <label class="badge badge-success">SUCCESS</label>
                                                    @elseif($charging->status == 0)
                                                        <label class="badge badge-warning">PENDING</label>
                                                    @else
                                                        <label class="badge badge-danger">FAILED</label>
                                                    @endif
                                                </td>
                                                <td>{{ $charging->user_info }}</td>
                                                <td>{{ $charging->code }}</td>
                                                <td>{{ $charging->serial }}</td>
                                                <td>{{ $charging->telco }}</td>
                                                <td>{{ number_format($charging->value).' '.$charging->currency_code }}</td>
                                                <td>{{ $charging->fees }} %</td>
                                                <td>{{ number_format($charging->amount).' '.$charging->currency_code}}</td>
                                                <td>{{ $charging->order}}</td>
                                                <td>{{ $charging->api_provider}}</td>
                                                <td>{{ $charging->request_id}}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div></div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <select name="action" class="form-control">
                                                    <option value=""></option>
                                                    <option value="on">Bật đã chọn</option>
                                                    <option value="off">Tắt đã chọn</option>
                                                    <option value="delete">Xóa đã chọn</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-warning"><i class="ace-icon fa fa-check-circle bigger-130"></i> Thực hiện</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="float-right" id="dynamic-table_paginate">
                                        <?php $chargings->setPath('chargings'); ?>
                                        <?php echo $chargings->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div></form>

                    <!-- Delete form -->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $(".deleteClick").click(function(){
                                var link = $(this).attr('link');
                                var name = $(this).attr('name');
                                $("#deleteForm").attr('action',link);
                                $("#deleteMes").html("Delete : "+name+" ?");
                            });
                        });
                    </script>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm" action="" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="deleteMes" class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <input type="hidden" name="_method" value="delete" />
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete form-->

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


