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
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.errors')
                <div class="card">

                    <div class="card-header" style="border-bottom: 0">
                        <h3 class="card-title">Danh sách thuê bao nạp chậm</h3>
                        <div class="float-right" style="margin-right: 150px">
                            <a href="{{ url($backendUrl.'/mtopup/settings') }}"><button class="btn btn-success"><i class="fa fa-plus-circle"></i> Settings</button></a>
                            <a href="{{ url($backendUrl.'/mtopup/history') }}"><button class="btn btn-success"><i class="fa fa-plus-circle"></i> History</button></a>
                        </div>
                        <div class="card-tools ">
                            <div class="input-group input-group-sm dataTables_filter" style="width: 150px;">
                                <form action="" name="formSearch" method="GET" >
                                    <input type="text" name="keyword" class="form-control float-right" placeholder="Search" style="padding-right: 42px;">
                                    <div class="input-group-append" style="margin-left: 110px">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <form action="{{ url($backendUrl.'/chargings/actions') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body" style="padding-top: 0;">
                            <div class="row"><div class="col-sm-12">
                                    <table id="tablez" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Paygate</th>
                                            <th>Payment Status</th>
                                            <th>User note</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $orders as $order )
                                            <tr class="irow" data-id="{{ $order->id }}">
                                                <td class="center">{{ $order->order_no }}</td>
                                                <td>
                                                    @if($order->order_status == 'pending')
                                                        <label class="badge badge-success">Pending</label>
                                                    @else
                                                        <label class="badge badge-dark">UNKNOWN</label>
                                                    @endif
                                                </td>
                                                <td>{{ $order->type }}</td>
                                                <td>{{ $order->userinfo }}</td>
                                                <td>{{ number_format($order->amount) }} VND</td>
                                                <td>{{ $order->currency }}</td>
                                                <td>{{ $order->paygate_code }}</td>
                                                <td>{{ $order->payment_status }}</td>
                                                <td>{{ $order->user_note }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ url($backendUrl.'/chargings/'.$order->id.'/edit') }}"> <i title="Sửa" class="ace-icon fa fa-pencil bigger-130"></i> </a>  |

                                                        <a href="#" link="{{ url($backendUrl.'/order/'.$order->id) }}" class="deleteClick red id-btn-dialog2" data-toggle="modal" data-target="#deleteModal" > <i title="Delete" class="ace-icon fa fa-trash-o bigger-130"></i></a>

                                                    </div>
                                                </td>
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
                                        <?php $orders->setPath('orders'); ?>
                                        <?php echo $orders->render(); ?>
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
