@extends('frontend.master')

@section('content')
<style>
.row-group{ margin-bottom: 0px; }
.form-group { margin-bottom: 5px; }
</style>
<section class="main">
        <div class="section">
          <div class="container">
            <div class="fullColumn">
              <div class="blockTitle text-center bg-shadowimg">
                <h3><span class="text-uppercase">Nạp tiền đơn giản chỉ với vài thao tác</span></h3>
              </div>
              <div class="blockContent">
                <div class="col-sm-12 right-seperate">
                  <div class="card-game-panel">
                    <h3 class="panel-title">Mua thẻ game</h3>
                    <p>Chú ý: Nạp chậm là hình thức khách hàng đưa yêu cầu nạp lên website, chúng tôi sẽ tìm thời điểm khuyến mãi tốt nhất để nạp. Chiết khấu chậm là 20%. Khi quý khách nạp 100k sẽ chỉ phải thanh toán 80k. Thời gian nạp sẽ từ 30 phuýt đến 5 tiếng. Quý khách có thể hủy nạp nếu không muốn đợi lâu.</p>
                    <p>Chỉ áp dụng cho các thuê bao trả sau.</p><br>
                      @include('frontend.errors.errors')
                    <form action="{{ route('frontend.mtopup.postMtopup') }}" method="POST" name="formNapcham" >
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
                      <div class="text-left">
                        <div class="title"><strong>Phương thức thanh toán:</strong></div>
                        <div class="row">
                          <div class="col-sm-4">

                          </div>
                        </div>
                        <div class="list-banks-detail"></div>
                        <ul class="list-banks">
                            <li class="toggleArea justOpen open" data-toggle="bank0"><span><img src="./assets/images/paygate/ewallet.png" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/paygate/onepay.png" alt="bank"/></span></li>
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
