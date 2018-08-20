@extends('frontend.app')
@section('breadcrumbs', Breadcrumbs::render('taythenhanh'))
@section('content')

    <section class="main">
        <div class="section">
            <div class="container">
                <div class="fullColumn">
                    <div class="blockContent">
                        <div class="right-seperate">
                            <div class="card-game-panel">
                                <h3 class="panel-title">Tẩy thẻ nhanh</h3>
                                <p>Chú ý: Nạp chậm là hình thức khách hàng đưa yêu cầu nạp lên website, chúng tôi sẽ tìm thời điểm
                                    khuyến mãi tốt nhất để nạp. Chiết khấu chậm là 20%. Khi quý khách nạp 100k sẽ chỉ phải thanh
                                    toán 80k. Thời gian nạp sẽ từ 30 phuýt đến 5 tiếng. Quý khách có thể hủy nạp nếu không muốn
                                    đợi lâu.</p>
                                <p>Chỉ áp dụng cho các thuê bao trả sau.</p>
                                <br>
                                <div class="form-frontpage form-sm">
                                    <div class="row-group">
                                        @include('frontend.errors.errors')
                                        <form action="{{ route('frontend.charging.postCharging')  }}" method="POST" >
                                            <div id="list-row">
                                                <div  class="irow row-group">
                                                    <div class="col-sm-2 select">
                                                        <select class="telco form-control" name="telco[]" data-row="1" required autofocus>

                                                            @foreach( $lsTelco as $telco )
                                                                <option value="{{ $telco->key }}">{{ $telco->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="code[]" data-row="1" class="form-control" type="text" placeholder="Mã thẻ" required autofocus>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input name="serial[]" data-row="1" class="form-control" type="text" placeholder="Serial" required autofocus>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        @foreach( $lsTelco as $telco )
                                                            <input type="hidden" class="defaultAmount" data-telco="{{ $telco->key }}" data-amount="{{$telco->value}}" >
                                                        @endforeach
                                                        <select id="lsAmount" name="amount[]" data-row="1" class="amount form-control" required autofocus>
                                                            @foreach($lsAmount as $amount)
                                                                <option value="{{$amount}}">{{ $amount }} đ</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div><button type="button" id="addRow" class="btn btn-success " style="float:left"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</button></div>
                                            <br>
                                            <div class="text-center">

                                                <button type="submit" class="btn btn-warning btn-lg"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Gửi thông tin</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::check())
                        <h3 class="panel-title">Lịch sử tẩy thẻ nhanh</h3>

                        <table id="example1" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>TT</th>
                                <th>Mã Nạp</th>
                                <th>Seri</th>
                                <th>Mạng</th>
                                <th>Khai</th>
                                <th>Thực</th>
                                <th>Phí</th>
                                <th>Phạt</th>
                                <th>Nhận</th>
                                <th>Ngày</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $listHistory as $itemc )
                                <tr>

                                    <td>{{$itemc->id}}</td>
                                    <td>@if($itemc['status'] == 1)<span class="label label-success">Xong</span> @else <span class="label label-warning">Chờ</span> @endif</td>
                                    <td>{{$itemc->code}}</td>
                                    <td>{{$itemc->serial}}</td>
                                    <td>{{$itemc->telco}}</td>
                                    <td>{{number_format($itemc->declared_value)}}</td>
                                    <td>{{$itemc->real_value}}</td>
                                    <td>{{$itemc->fees}}%</td>
                                    <td>{{$itemc->penalty}}</td>
                                    <td>{{number_format($itemc->amount)}} {{$itemc->currency_code}}</td>
                                    <td>{{$itemc->created_at}}</td>

                                </tr>
                            @endforeach

                            </tbody>


                        </table>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <div id="dataRow" class="hidden">
        <div class="irow row-group " data-row="{timestamp}">
            <div class="col-sm-2 select">
                <select class="telco form-control" name="telco[]"  data-row="{timestamp}" required autofocus>
                    @foreach( $lsTelco as $telco )
                        <option value="{{ $telco->key }}">{{ $telco->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <input name="code[]"  data-row="{timestamp}" class="form-control" type="text" placeholder="Mã thẻ" required autofocus>
            </div>
            <div class="col-sm-3">
                <input name="serial[]"  data-row="{timestamp}" class="form-control" type="text" placeholder="Serial" required autofocus>
            </div>
            <div class="col-sm-2">
                <select name="amount[]"  data-row="{timestamp}" class="amount form-control" required autofocus>
                    @foreach($lsAmount as $amount)
                        <option value="{{$amount}}">{{ $amount }} đ</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <button type="button" class="button-red act_del" data-row="{timestamp}">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>


@endsection




@section('js-footer')

    <script>
        $(document).ready(function(){
            $(document).on('change','select.telco' , function(){
                var rowID = $(this).attr('data-row');
                var defaultAmount = $('.defaultAmount[data-telco='+$(this).val()+']').attr('data-amount');
                var lsAmount = defaultAmount.split(',');
                var option = '';
                $.each(lsAmount, function( index, value ) {
                    option += '<option value="'+value+'">'+value+' đ</option>';
                });
                $(".amount[data-row="+rowID+"]").html(option);
            });


            $(document).on('click','.act_del',function(){
                var id = $(this).attr('data-row');
                $(".irow[data-row="+id+"]").remove();
            });
            $("#addRow").click(function(){
                if( $('#list-row > .irow').size() >= 10 )
                {
                    alert("Không được vượt quá 10 dòng!");
                }else{
                    var dataRow = $("#dataRow").clone().html();
                    dataRow = dataRow.replace(/{timestamp}/g, Date.now());
                    $("#list-row").append(dataRow);
                }
            });
        });
    </script>

@endsection
