<section class="main softcard-page">
        <div class="blockContent row">
          <div class="col-sm-12">
              <h3 class="panel-title">Mua thẻ game</h3>
              <p>Mua thẻ game hoặc thẻ điện thoại là do nhà phát hành cung cấp, để mua thẻ quý khách cần phải đồng ý với các điều khoản như sau: Thẻ của chúng tôi hoàn toàn được bảo mật từ nhà cung cấp, nếu thẻ bị lỗi thì sẽ được giải quyết dựa trên thời gian sử dụng thực của thẻ. Chúng tôi chỉ đổi thẻ khác khi thời gian thẻ bị sử dụng xảy ra trước khi thẻ được xuất khỏi hệ thống</p>
          </div>
          <div class="col-sm-7 right-seperate">
            <div class="card-game-panel">
              <div class="form-frontpage">
                @if(count($categories))
                  <ul class="nav nav-tabs">
                  <?php $first = true; ?>
                  @foreach ($categories as $cate)
                    <li @if($first) class="active" @endif><a data-toggle="tab" href="#panel-sc-{{ $cate->id }}">{{ $cate->name }}</a></li>
                  <?php $first = false; ?>
                  @endforeach
                  </ul>
                  <div class="tab-content">
                  @if(isset($products) && count($products))
                    <?php $first = true; $flag=true; ?>
                    @foreach($products as $cate_id => $product)
                    <div class="text-center tab-pane fade in @if($first) active @endif" id="panel-sc-{{ $cate_id }}">
                      <div class="tnap-group border-active">
                        @if(count($product))
                        @foreach($product as $pro)
                        <div class="btn btn-xmd btn-default softcard-btn @if($flag) btn-primary @endif" data-toggle="tab" href="#panel-sc-option-{{ $pro->id }}" data-sc-id="{{ $pro->id }}">
                          @if(isset($thumb[$pro->id]['url']))
                          <img src="{{ asset('storage/app').'/'.$thumb[$pro->id]['url'] }}" alt="{{ $thumb[$pro->id]['alt'] }}" width="65" height="33" />
                          @else
                          <img src="{{ asset('storage/app/softcard/images/default.jpg') }}" alt="{{ $pro->name }}" width="65" height="33" />
                          @endif
                        </div>
                        <?php $flag = false; ?>
                        @endforeach
                        @else
                        <p class="text-danger bg-info text-center">Danh mục hiện tại không có sản phẩm!!</p>
                        @endif
                      </div>
                    </div>
                    <?php $first = false; ?>
                    @endforeach
                  @endif
                  </div>
                  <div class="text-left tab-content">
                    <label><strong>Chọn số tiền:</strong></label>
                    @if(isset($options) && count($options))
                      <?php $first = true; ?>
                      @foreach($options as $product_id => $items)
                      <div class="tnap-group tab-pane fade in @if($first) active @endif" id="panel-sc-option-{{ $product_id }}">
                        @if(count($items))
                          @foreach($items as $item)
                            <div id="item-{{ $item['sku'] }}" class="btn btn-xmd btn-default sc-item-btn @if(array_key_exists($item['sku'], $added_items)) btn-primary @endif" title="{{ $item['name'] }}" data-id="{{ $item['id'] }}" data-sku="{{ $item['sku'] }}" @if(array_key_exists($item['sku'], $added_items)) data-row="{{ $added_items[$item['sku']] }}" @else data-row="" @endif>
                              <span>{{ number_format($item['value'],0,',','.').'đ' }}</span>
                            </div>
                          @endforeach
                        @else
                          <p class="text-danger bg-info text-center">Hiện tại không có mệnh giá nào cho loại thẻ này!!</p>
                        @endif
                      </div>
                      <?php $first = false; ?>
                      @endforeach
                    @else
                      <p class="text-danger bg-info text-center">Hiện tại không có mệnh giá nào cho loại thẻ này!!</p>
                    @endif
                  </div>
                @else
                  <p class="text-danger bg-info text-center">Danh mục hiện tại không có sản phẩm!!</p>
                @endif

              </div>
            </div>
          </div>
          
          <div class="col-sm-5">
            <div class="row">
              <div class="right-pay" id="shopping-cart-wrapper">
                {!! $shopping_cart !!}
              </div>
            </div>
          </div>

          <div class="overlay" style="display: none;">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        </div>

</section>
