@extends('frontend.app')
@section('breadcrumbs', Breadcrumbs::render('napnhanh'))
@section('content')
    <style>
        .row-group{ margin-bottom: 0px; }
        .form-group { margin-bottom: 5px; }
    </style>
    <section class="main">
        <div class="section">
            <div class="container">
                <div class="fullColumn">
                    <div class="blockContent">
                        <div class="col-sm-12 right-seperate">
                            <div class="card-game-panel">
                                <h3 class="panel-title">Nạp Topup điện thoại nhanh</h3>
                                <p>Chú ý: Nạp chậm là hình thức khách hàng đưa yêu cầu nạp lên website, chúng tôi sẽ tìm thời điểm khuyến mãi tốt nhất để nạp. Chiết khấu chậm là 20%. Khi quý khách nạp 100k sẽ chỉ phải thanh toán 80k. Thời gian nạp sẽ từ 30 phút đến 5 tiếng. Quý khách có thể hủy nạp nếu không muốn đợi lâu.</p>
                                <p>Chỉ áp dụng cho các thuê bao trả sau.</p><br>
                                @include('frontend.errors.errors')
                                <form action="{{ route('frontend.topup.postTopup') }}" method="POST" name="formNapcham" >
                                    <div class="form-frontpage form-sm">
                                        <div id="list-row">
                                            <div class="irow row-group">
                                                <div class="form-group col-sm-3">
                                                    <div class="row" style="padding-right: 15px">
                                                        <label>Số điện thoại:</label><span class="telco-icon telco-icon-right full-width">
                                                        <input name="phone_number[]" data-row="1" class="inputRow number_phone form-control normal-control" placeholder="Nhập số đt..." required></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="row" style="padding-right: 15px">
                                                        <label>Số tiền nạp:</label>
                                                        <select name="amount[]" data-row="1" class="inputRow amount form-control normal-control" required>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="row" style="padding-right: 15px">
                                                        <label>Loại:</label>
                                                        <select name="telco_type[]" data-row="1" class="inputRow telco_type form-control">
                                                            <option value="tratruoc">Trả trước</option>
                                                            <option value="trasau">Trả sau</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="row" style="padding-right: 15px">
                                                        <div>Phải trả:</div>
                                                        <div class="fees normal-control" data-row="1" >VNĐ</div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <div class="row" style="padding-right: 15px">
                                                        <label>Cho gộp:</label>
                                                        <div class="checkbox-control">
                                                            <input name="mix[]" type="checkbox" checked >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-1">
                                                </div>
                                            </div>

                                        </div>

                                        <div><button type="button" id="addRow" class="btn btn-success " style="float:left"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</button></div>

                                        <div class="clearfix"></div>
                                        <div class="text-left" style="margin-top:15px;">
                                            <div class="title"><strong>Phương thức thanh toán:</strong></div>
                                            <div class="row">
                                                <div class="col-sm-4">

                                                </div>
                                            </div>
                                            <div class="list-banks-detail"></div>
                                            <ul class="list-banks" style="margin-top:10px;">

                                                {{--<li><input type="radio" name="CartOrder" value="1"><img src="./assets/images/paygate/ewallet.png" alt="bank"/></li>--}}
                                                {{--<li><input type="radio" name="CartOrder" value="1"><img src="./assets/images/paygate/onepay.png" alt="bank"/></li>--}}
                                                <li class="toggleArea justOpen open" data-toggle="bank0"><input style="margin-right:10px" class="cwallet" type="radio" name="CartOrder" value="1"></span><img height="85px" src="./assets/images/paygate/ewallet.png" alt="bank"/></li>
                                                <li class="toggleArea justOpen" data-toggle="bank1"><input style="margin-right:10px"  class="onepay" type="radio" name="CartOrder" value="0"></span><img height="85px" src="./assets/images/paygate/onepay.png" alt="bank"/></li>
                                            </ul>
                                            <script>
                                                var radioOption = document.querySelectorAll('.method-item input[type="radio"]')
                                                radioOption.forEach(function(el, index) {
                                                    el.addEventListener("click", function(evt) {
                                                        alert('index: ' +  index);
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary btn-lg btn-block" style=""><i class="fa fa-cart-plus" aria-hidden="true"></i> Thanh toán</button></div>
                        {{ csrf_field() }}
                        </form>
                    </div>

                    {{--@if(Auth::check())--}}
                        {{--<h3 class="panel-title">Lịch sử nạp chậm</h3>--}}


                        {{--<table id="tablez" class="table">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Trạng thái</th>--}}
                                {{--<th>Mạng</th>--}}
                                {{--<th>Thuê bao</th>--}}
                                {{--<th>Số ĐT</th>--}}
                                {{--<th>Muốn nạp</th>--}}
                                {{--<th>Đã nạp</th>--}}
                                {{--<th>Chiết khấu</th>--}}
                                {{--<th>Phải trả</th>--}}
                                {{--<th>T.toán</th>--}}
                                {{--<th>Cho gộp</th>--}}
                                {{--<th>Ngày tạo</th>--}}
                                {{--<th>Hành động</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach( $listmtopups as $listmtopup )--}}
                                {{--<tr class="irow" data-id="">--}}

                                    {{--<td>--}}
                                        {{--@if($listmtopup->status == 'completed')--}}
                                            {{--<span class="label label-success">Hoàn thành</span>--}}
                                        {{--@elseif($listmtopup->status == 'pending')--}}
                                            {{--<span class="label label-warning">Chờ nạp</span>--}}
                                        {{--@elseif($listmtopup->status == 'none')--}}
                                            {{--<span class="label label-warning">Chưa rõ</span>--}}
                                        {{--@elseif($listmtopup->status == 'wrong')--}}
                                            {{--<span class="label label-danger">Nạp lỗi</span>--}}
                                        {{--@elseif($listmtopup->status == 'canceled')--}}
                                            {{--<span class="label label-danger">Hủy</span>--}}
                                        {{--@else--}}
                                            {{--<span class="label label-dark">Chưa rõ</span>--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td>{{ $listmtopup->telco }}</td>--}}
                                    {{--<td>{{ $listmtopup->telco_type }}</td>--}}
                                    {{--<td>{{ $listmtopup->phone_number }}</td>--}}
                                    {{--<td>{{ number_format($listmtopup->declared_value)}}</td>--}}
                                    {{--<td>--}}

                                        {{--<span> {{number_format($listmtopup->completed_value)}}/{{number_format($listmtopup->declared_value)}}</span>--}}

                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="{{ ($listmtopup->completed_value/$listmtopup->declared_value)*100 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ ($listmtopup->completed_value/$listmtopup->declared_value)*100 }}%">--}}
                                                {{--{{ ($listmtopup->completed_value/$listmtopup->declared_value)*100 }}%--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                    {{--<td>{{ $listmtopup->discount }}%</td>--}}
                                    {{--<td>{{ number_format($listmtopup->amount).' '.$listmtopup->currency_code }}</td>--}}
                                    {{--<td>{{ $listmtopup->payment_status }}</td>--}}
                                    {{--<td>@if ($listmtopup->mix == 1) Có @else Không @endif</td>--}}
                                    {{--<td>{{ date('d-m-Y',strtotime($listmtopup->created_at)) }}</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="action-buttons">--}}
                                            {{--<a href="#" link="{{ url('/listmtopup/'.$listmtopup->id) }}" class="deleteClick red id-btn-dialog2" data-toggle="modal" data-target="#deleteModal" > <i title="Delete" class="ace-icon fa fa-trash-o bigger-130"></i></a>--}}

                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}

                            {{--</tbody>--}}


                        {{--</table>--}}

                    {{--@endif--}}

                </div>
            </div>
        </div>
    </section>
    <div id="dataRow" class="hidden">
        <div class="irow row-group " data-row="{timestamp}">
            <div class="row-group">
                <div class="form-group col-sm-3">
                    <div class="row" style="padding-right: 15px">
            <span class="telco-icon  telco-icon-right full-width">
            <input name="phone_number[]" data-row="{timestamp}" class="inputRow number_phone form-control normal-control" placeholder="Nhập số đt..." required></span>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="row" style="padding-right: 15px">
                        <select name="amount[]" data-row="{timestamp}" class="inputRow amount form-control normal-control" required>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="row" style="padding-right: 15px">
                        <select name="telco_type[]" data-row="{timestamp}" class="inputRow telco_type form-control">
                            <option value="tratruoc">Trả trước</option>
                            <option value="trasau">Trả sau</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="row" style="padding-right: 15px">
                        <div class="fees normal-control" data-row="{timestamp}">N/A</div>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <div class="row" style="padding-right: 15px">
                        <div class="checkbox-control">
                            <input name="mix[]" type="checkbox" checked>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-1">
                    <div class="row" style="padding-right: 15px">
                        <button type="button" class="button-red act_del" data-row="{timestamp}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-footer')

    <script>

        $(document).ready(function(){
            $(document).on('change', '.inputRow', function(){
                var rowID = $(this).attr('data-row');
                var number_phone = $('.number_phone[data-row='+rowID+']').val();
                var amount = $('.amount[data-row='+rowID+']').val();
                var telco_type = $('.telco_type[data-row='+rowID+']').val();
                var obj = $(this);
                obj.parent('span').attr('class','telco-icon telco-icon-right full-width');

                if( number_phone.length <= 2 )
                {
                    $(".amount[data-row="+rowID+"]").html('');
                    $(".fees[data-row="+rowID+"]").html('N/A đ');
                }

                if( number_phone.length > 2 )
                {
                    $.ajax({
                        url: "{{ url('/mtopup/ajax/getDiscount') }}",
                        type : "get",
                        dataType:"text",
                        data : {
                            'number_phone':number_phone,
                            'amount':amount,
                            'telco_type':telco_type,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data) {
                            if( data  )
                            {
                                data = $.parseJSON(data);
                                console.log(data);
                                var telco = data.telco;
                                var lsValue = data.lsValue;
                                var discount  = amount - (data.discount*amount)/100;
                                if( telco )
                                {
                                    obj.parent('span').attr('class','telco-icon telco-icon-right full-width');
                                    obj.parent('span').addClass('icon-'+telco);

                                    var lsAmount = lsValue.split(',');
                                    var option = '';
                                    $.each(lsAmount, function( index, value ) {
                                        option += '<option value="'+value+'">'+value+' đ</option>';
                                    });
                                    $(".amount[data-row="+rowID+"]").html(option);
                                    $(".amount[data-row="+rowID+"]").val(amount);
                                    $(".fees[data-row="+rowID+"]").html(discount+' đ');
                                }

                            }
                        }
                    }).done(function() {

                    });
                }

                console.log(rowID);
                console.log(number_phone + '_' + amount + '_' + telco_type);
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
