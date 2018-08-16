@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>

@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.errors')
                <div class="card">

                    <div class="card-header" style="border-bottom: 0">
                        <h3 class="card-title">Mtopup Settings</h3>
                        <div class="float-right" style="">
                            <a href="{{ url($backendUrl.'/mtopup/telcos/create') }}"><button class="btn btn-success"><i class="fa fa-plus-circle"></i> New Telco</button></a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div id="Settings">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" id="checkall">
                                            <span class="lbl"></span> </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Key</th>
                                    <th>Number Format</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Value</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $telcos as $telco )
                                    <tr>
                                        <td class="center"><label class="pos-rel">
                                                <input type="checkbox" class="ace mycheckbox" value="{{ $telco->id }}" name="check[]">
                                                <span class="lbl"></span> </label>
                                        </td>
                                        <td>{{ $telco->name }}</td>
                                        <td>{{ $telco->key }}</td>
                                        <td>{{ $telco->number_format }}</td>
                                        <td>{{ $telco->icon}}</td>
                                        <td>
                                            <div class="Switch Round disabled @if($telco->status == 1) On @else Off @endif " style="vertical-align:top;margin-left:10px;">
                                                <div class="Toggle" ></div>
                                        </td>
                                        <td>{{ $telco->value }}</td>
                                        <td>{{ $telco->created_at }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ url($backendUrl.'/mtopup/telcos/'.$telco->id.'/edit') }}"> <i title="Sửa" class="ace-icon fa fa-pencil bigger-130"></i> </a>  |

                                                <a href="#" name="{{ $telco->name }}" link="{{ url($backendUrl.'/mtopup/telcos/'.$telco->id) }}" class="deleteClick red id-btn-dialog2" data-toggle="modal" data-target="#deleteModal" > <i title="Delete" class="ace-icon fa fa-trash-o bigger-130"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>


                            </table>
                        </div>
                        <form action="" method="POST" >
                            <div class="card-body row">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>DISCOUNT:</th>
                                        @foreach( $groups as $group )
                                            <th>{{ $group->name }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $telcos as $telco )
                                        <tr>
                                            <td>{{ $telco->name  }} Trả Trước( % ):</td>
                                            @foreach( $groups as $group )
                                                <td><input type="number" class="form-control FeesAjax" data-telco="{{ $telco->key }}" data-telco-type="tratruoc" data-group="{{ $group->id }}" data-key="discount" value="{{ $fees->getValueByGroupandTelco($group->id,$telco->key,'tratruoc','discount') }}" /></td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td>{{ $telco->name  }} Trả Sau ( % ):</td>
                                            @foreach( $groups as $group )
                                                <td><input type="number" class="form-control FeesAjax" data-telco="{{ $telco->key }}" data-telco-type="trasau" data-group="{{ $group->id }}" data-key="discount" value="{{ $fees->getValueByGroupandTelco($group->id,$telco->key,'trasau','discount') }}" /></td>
                                            @endforeach
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                            {!! csrf_field() !!}
                        </form>
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

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".FeesAjax").on('input propertychange change', function(){
                $.ajax({
                    url: "{{ url('/').'/'.$backendUrl.'/mtopup/update-fees' }}",
                    type : "post",
                    dataType:"text",
                    data : {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        val : $(this).val(),
                        telco:$(this).attr('data-telco'),
                        telco_type: $(this).attr('data-telco-type'),
                        group : $(this).attr('data-group'),
                        key: $(this).attr('data-key')
                    },
                    success:function(data) {
                        console.log(data);
                    }
                }).done(function() {

                });
            });
        });
    </script>
@endsection
