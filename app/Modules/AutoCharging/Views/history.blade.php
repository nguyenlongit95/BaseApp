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
                        <h3 class="card-title">List CardCharging</h3>
                        <div class="float-right" style="margin-right: 150px">

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
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                        <tr>
                                            <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" id="checkall">
                                                    <span class="lbl"></span> </label>
                                            </th>
                                            <th>Status</th>
                                            <th>User</th>
                                            <th>Code</th>
                                            <th>Serial</th>
                                            <th>Telco</th>
                                            <th>Declared</th>
                                            <th>Real</th>
                                            <th>Fees</th>
                                            <th>Penalty</th>
                                            <th>Amount</th>
                                            <th>Order</th>
                                            <th>Action</th>
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
                                                    @elseif($charging->status == 2)
                                                        <label class="badge badge-warning">WRONGPRICE</label>
                                                    @elseif($charging->status == 3)
                                                        <label class="badge badge-danger">CANNOTUSED</label>
                                                    @elseif($charging->status == 4)
                                                        <label class="badge badge-danger">USED</label>
                                                    @else
                                                        <label class="badge badge-danger">FAILED</label>
                                                    @endif
                                                </td>
                                                <td>{{ $charging->user_info }}</td>
                                                <td>{{ $charging->code }}</td>
                                                <td>{{ $charging->serial }}</td>
                                                <td>{{ $charging->telco }}</td>
                                                <td>{{ number_format($charging->declared_value).' '.$charging->currency_code }}</td>
                                                <td>{{ number_format($charging->real_value).' '.$charging->currency_code}}</td>
                                                <td>{{ $charging->fees }} %</td>
                                                <td>{{ $charging->penalty }}%</td>
                                                <td>{{ number_format($charging->amount).' '.$charging->currency_code}}</td>
                                                <td>{{ $charging->order}}</td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <a href="{{ url($backendUrl.'/chargings/reset/'.$charging->id) }}" data-toggle="tooltip" title="Phục hồi lại thẻ!"> <i class="fa fa-repeat" aria-hidden="true"></i> </a>  |
                                                        <a href="#" name="{{ $charging->name }}" link="{{ url($backendUrl.'/chargings/'.$charging->id) }}" class="deleteClick red id-btn-dialog2"data-toggle="modal" data-target="#deleteModal" > <i title="Delete" class="ace-icon fa fa-trash-o bigger-130"></i></a>
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


