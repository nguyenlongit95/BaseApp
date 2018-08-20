@extends("frontend.master")

@section('meta-tags')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
  Đổi thẻ cào, mua thẻ điện thoại, thẻ game online
@endsection

@section('customstyle')
<link rel="stylesheet" href="{{ asset('assets/css/softcard.css') }}" type="text/css">
@endsection

@section('content')
@include('frontend.widgets.slider')
<section class="main">
    <div class="section">
      <div class="container">
        <div class="fullColumn">
          <div class="blockTitle text-center bg-shadowimg">
            <h3><span class="text-uppercase">Nạp tiền đơn giản chỉ với vài thao tác</span></h3>
          </div>
          <div class="blockContent">
            <div class="tabpage">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#card-game"><span class="tab-icon card-game"></span><span class="title">
                      <div class="sub-title">Mua</div>
                      <div>Mã thẻ</div></span></a></li>
                <li><a data-toggle="tab" href="#phone-pay"><span class="tab-icon phone-pay"></span><span class="title">
                      <div class="sub-title">Nạp tiền</div>
                      <div>Điện thoại</div></span></a></li>
                <li><a data-toggle="tab" href="#card-pay"><span class="tab-icon card-pay"></span><span class="title">
                      <div class="sub-title">Tẩy thẻ</div>
                      <div>Chậm</div></span></a></li>
                <li><a data-toggle="tab" href="#game-pay"><span class="tab-icon game-pay"></span><span class="title">
                      <div class="sub-title">Nạp tiền</div>
                      <div>Game</div></span></a></li>
                <li><a data-toggle="tab" href="#internet-pay"><span class="tab-icon internet-pay"></span><span class="title">
                      <div class="sub-title">Nạp cước</div>
                      <div>Internet / k+</div></span></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="card-game">
                  {!! $muamathe_html !!}
                </div>
                <div class="tab-pane fade" id="phone-pay">
                  {!! $napcham_html !!}
                </div>
                <div class="tab-pane fade" id="card-pay">
                  {!! $taythecham_html !!}
                </div>
                <div class="tab-pane fade" id="game-pay">
                  <div class="blockContent row">
                    <div class="col-sm-12 text-danger text-center">
                      <h3 class="panel-title">Sản phẩm đang trong thời gian phát triển.</h3>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="internet-pay">
                  <div class="blockContent row">
                    <div class="col-sm-12 text-danger text-center">
                      <h3 class="panel-title">Sản phẩm đang trong thời gian phát triển.</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection


@section('js-footer')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('body').on('click','.softcard-btn',function(e){
    if(!$(this).hasClass('btn-primary')){
      $('.softcard-btn').removeClass('btn-primary');
      $(this).addClass('btn-primary');
    }else{

    }
  });
  
  $('body').on('click','.sc-item-btn',function(e){
    ele = $(this);
    itemSku = ele.data('sku');
    itemId = ele.data('id');
    row = '';
    if(ele.hasClass('btn-primary')){
      ele.removeClass('btn-primary');
      type = 'remove';
      row = ele.data('row');
    }else{
      ele.addClass('btn-primary');
      type = 'add';
    }
    $.ajax({
      url: '{{ route("softcard.ajaxpost") }}',
      method: 'POST',
      data: {type:type,id:itemId,row:row},
      beforeSend:function(){
        $('.overlay').show();
      },
      success:function(data){
        data = $.parseJSON(data);
        if(type=='add'){
          ele.data('row',data.row);
        }
        $('#shopping-cart-wrapper').html(data.shopping_cart);
        $('.overlay').fadeOut();
      }
    });
  });

  $('body').on('change','.shopping-cart-qty',function(e){
    rowId = $(this).data('row');
    qty = $(this).val();
    itemId = $(this).data('id');
    $.ajax({
      url: '{{ route("softcard.ajaxpost") }}',
      method: 'POST',
      data: {type:'update',row:rowId,qty:qty},
      beforeSend:function(){
        $('.overlay').show();
      },
      success:function(data){
        data = $.parseJSON(data);
        $('#shopping-cart-wrapper').html(data.shopping_cart);
        $('.overlay').fadeOut();
      }
    });
  });

  $('body').on('click','.delete-cart',function(e){
    $.ajax({
      url: '{{ route("softcard.ajaxpost") }}',
      method: 'POST',
      data: {type:'delete'},
      beforeSend:function(){
        $('.overlay').show();
      },
      success:function(data){
        data = $.parseJSON(data);
        $('.sc-item-btn').removeClass('btn-primary');
        $('#shopping-cart-wrapper').html(data.shopping_cart);
        $('.overlay').fadeOut();
      }
    });
  });

  $('body').on('click','.cell-delete-item',function(e){
    sku = $(this).data('sku');
    row = $(this).data('row');
    $.ajax({
      url: '{{ route("softcard.ajaxpost") }}',
      method: 'POST',
      data: {type:'remove',row:row},
      beforeSend:function(){
        $('.overlay').show();
      },
      success:function(data){
        data = $.parseJSON(data);
        $('#item-'+sku).removeClass('btn-primary');
        $('#shopping-cart-wrapper').html(data.shopping_cart);
        $('.overlay').fadeOut();
      }
    });
  });
  

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

  $(document).ready(function(){
    $(document).on('change','select.telco' , function(){
        var rowID = $(this).attr('data-row-tt');
        var defaultAmount = $('.defaultAmount[data-telco='+$(this).val()+']').attr('data-amount');
        var lsAmount = defaultAmount.split(',');
        var option = '';
        $.each(lsAmount, function( index, value ) {
            option += '<option value="'+value+'">'+value+' đ</option>';
        });
        $(".amount[data-row-tt="+rowID+"]").html(option);
    });


    $(document).on('click','.taythe-act_del',function(){
        var id = $(this).attr('data-row-tt');
        $(".irow[data-row-tt="+id+"]").remove();
    });
    $("#taythe-addRow").click(function(){
        if( $('#tt-list-row > .irow').size() >= 10 )
        {
            alert("Không được vượt quá 10 dòng!");
        }else{
            var dataRow = $("#taythe-dataRow").clone().html();
            dataRow = dataRow.replace(/{timestamp}/g, Date.now());
            $("#tt-list-row").append(dataRow);
        }
    });
  });
</script>

@endsection
