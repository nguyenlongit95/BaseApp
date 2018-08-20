<section class="main">
    <div class="blockContent">
        <div class=" right-seperate">
            <div class="card-game-panel">
                <h3 class="panel-title">Tẩy thẻ chậm</h3>
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
                            <div id="tt-list-row">
                            <div  class="irow row-group">
                                    <div class="col-sm-2 select">
                                        <select class="telco form-control" name="telco[]" data-row-tt="1" required autofocus>
                                            @foreach( $lsTelco as $telco )
                                            <option value="{{ $telco->key }}">{{ $telco->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="code[]" data-row-tt="1" class="form-control" type="text" placeholder="Mã thẻ" required autofocus>
                                    </div>
                                    <div class="col-sm-3">
                                        <input name="serial[]" data-row-tt="1" class="form-control" type="text" placeholder="Serial" required autofocus>
                                    </div>
                                    <div class="col-sm-2">
                                        @foreach( $lsTelco as $telco )
                                            <input type="hidden" class="defaultAmount" data-telco="{{ $telco->key }}" data-amount="{{$telco->value}}" >
                                        @endforeach
                                        <select id="lsAmount" name="amount[]" data-row-tt="1" class="amount form-control" required autofocus>
                                            @foreach($lsAmount as $amount)
                                            <option value="{{$amount}}">{{ $amount }} đ</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div style="position: absolute;"><button type="button" id="taythe-addRow" class="btn btn-success " style="float:left"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</button></div>
                                <div class="text-center">

                                    <button type="submit" class="btn btn-second"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Gửi thông tin</button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="taythe-dataRow" class="hidden">
<div class="irow row-group " data-row-tt="{timestamp}">
    <div class="col-sm-2 select">
        <select class="telco form-control" name="telco[]"  data-row-tt="{timestamp}" required autofocus>
            @foreach( $lsTelco as $telco )
                <option value="{{ $telco->key }}">{{ $telco->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">
        <input name="code[]"  data-row-tt="{timestamp}" class="form-control" type="text" placeholder="Mã thẻ" required autofocus>
    </div>
    <div class="col-sm-3">
        <input name="serial[]"  data-row-tt="{timestamp}" class="form-control" type="text" placeholder="Serial" required autofocus>
    </div>
    <div class="col-sm-2">
        <select name="amount[]"  data-row-tt="{timestamp}" class="amount form-control" required autofocus>
            @foreach($lsAmount as $amount)
                <option value="{{$amount}}">{{ $amount }} đ</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-2">
        <button type="button" class="button-red taythe-act_del" data-row-tt="{timestamp}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
    </div>
</div>
</div>
