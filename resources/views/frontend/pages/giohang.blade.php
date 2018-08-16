{!! Form::open(array('route' => 'softcard.getcheckout','method'=>'GET','enctype'=>'multipart/form-data')) !!}
<ul class="side-order">
  <li class="clearfix cell-header">
  	<strong>Giỏ hàng</strong>
  	<span class="btn btn-danger delete-cart btn-sm float-right">Xoá giỏ hàng</span>
  </li>
  @if(Cart::count())
  @foreach(Cart::content() as $row)
  <li class="clearfix" id="item-{{ $row->id }}"><span class="label"><b>{{ $row->name }}</b> (-{{ $row->options->discount }}%)</span>
    <div class="form-frontpage form-sm inline-control">
      <span class="form-group">
        <input class="form-control normal-control shopping-cart-qty" type="number" min="1" max="99" value="{{ $row->qty }}" data-row="{{ $row->rowId }}"" data-id="{{ $row->id }}" />
      </span>
    </div>
    <div class="cell-value">
    	<!-- <span>{{ number_format($row->price,0,',','.') }}</span> -->
    	<span class="cell-total">{{ number_format($row->total,0,',','.') }}</span>
    	<span class="cell-delete-item text-danger" data-sku="{{ $row->id }}" data-row="{{ $row->rowId }}"><i class="fa fa-times-circle" title="Xoá sản phẩm"></i></span>
    </div>
  </li>
  @endforeach

  <li class="clearfix" id="shopping-cart-subtotal">
  	<span class="label"></span>
  	<span class="cell-value">{{ Cart::subtotal() }}</span>
  </li>
  <li class="clearfix total-order" id="shopping-cart-total">
  	<span class="label">Tổng</span>
  	<span class="cell-value">{{ Cart::total() }}</span>
  </li>
  <li class="cell-footer"><strong>Phương thức thanh toán:</strong></li>
  <li class="clearfix ">
  	<label><input type="radio" name="payment-method" value="e-wallet" checked="checked" />Ví điện tử</label>
  </li>
  <li class="cell-footer">
    <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>

      <button class="col-sm-12 button btn btn-third" type="submit" >THANH TOÁN</button>
  </li>


  @else
  <li class="text-danger bg-info text-center">Empty shopping card!!</li>
  @endif
</ul>
{!! Form::close() !!}
