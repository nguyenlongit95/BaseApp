@extends("frontend.master")
@section('title')
  Đổi thẻ cào, mua thẻ điện thoại, thẻ game online
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
                <li class="active"><a data-toggle="tab" href="#phone-pay"><span class="tab-icon phone-pay"></span><span class="title">
                      <div class="sub-title">Nạp tiền</div>
                      <div>Điện thoại</div></span></a></li>
                <li><a data-toggle="tab" href="#card-pay"><span class="tab-icon card-pay"></span><span class="title">
                      <div class="sub-title">Nạp thẻ</div>
                      <div>Điện thoại</div></span></a></li>
                <li><a data-toggle="tab" href="#card-game"><span class="tab-icon card-game"></span><span class="title">
                      <div class="sub-title">Mua thẻ</div>
                      <div>Game</div></span></a></li>
                <li><a data-toggle="tab" href="#game-pay"><span class="tab-icon game-pay"></span><span class="title">
                      <div class="sub-title">Nạp tiền</div>
                      <div>Game</div></span></a></li>
                <li><a data-toggle="tab" href="#internet-pay"><span class="tab-icon internet-pay"></span><span class="title">
                      <div class="sub-title">Nạp cước</div>
                      <div>Internet / k+</div></span></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="phone-pay">
                  <div class="col-sm-8 right-seperate">
                    <div class="phone-pay-panel">
                      <h3 class="panel-title">Nạp tiền điện thoại</h3>
                      <div class="form-frontpage">           
                        <div class="text-center">
                          <div class="btn-group">
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g1_custom" href="#internet">Nạp trả trước  
                            </div>
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g1_custom" href="#tv">Nạp trả sau  
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g1_custom]");
                          </script>
                        </div>
                        <div class="text-center">
                          <div class="btn-group">
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g2_custom" href="#internet">Nạp nhanh 3%
                            </div>
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g2_custom" href="#tv">Nạp chậm 10%
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g2_custom]");
                          </script>
                        </div>
                        <div class="form-group text-center">
                          <label class="float-label">Số điện thoại:</label>
                          <div class="form-inline"><span class="telco-icon icon-viettel telco-icon-right">
                              <input class="form-control" placeholder="0986..."/></span></div>
                        </div>
                        <div class="text-left">
                          <label><strong>Chọn số tiền:</strong></label>
                          <div class="tnap-group">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g3_custom" href="#tnap_20">20.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g3_custom" href="#tnap_50">50.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g3_custom" href="#tnap_100">100.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g3_custom" href="#tnap_200">200.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g3_custom" href="#tnap_500">500.000đ
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g3_custom]");
                          </script>
                        </div>
                        <div class="text-left">
                          <div class="title"><strong>Phương thức thanh toán:</strong></div>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ ngân hàng nội địa
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Ví điện tử
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Chuyển khoản ATM
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Số dư tài khoản (Yêu cầu đăng nhập)
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ thanh toán quốc tế (Visa/Master)
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="list-banks-detail">
                            <div class="item toggleAreaClass bank1">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/1.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank2">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/2.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank3">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/3.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank4">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/4.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank5">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/5.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank6">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/6.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank7">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/7.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank8">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/8.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank9">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/9.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank10">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/10.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank11">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/11.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank12">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/12.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank13">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/13.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank14">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/14.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank15">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/15.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank16">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/16.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                          </div>
                          <ul class="list-banks">
                            <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/bank/1.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank2"><span><img src="./assets/images/bank/2.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank3"><span><img src="./assets/images/bank/3.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank4"><span><img src="./assets/images/bank/4.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank5"><span><img src="./assets/images/bank/5.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank6"><span><img src="./assets/images/bank/6.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank7"><span><img src="./assets/images/bank/7.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank8"><span><img src="./assets/images/bank/8.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank9"><span><img src="./assets/images/bank/9.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank10"><span><img src="./assets/images/bank/10.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank11"><span><img src="./assets/images/bank/11.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank12"><span><img src="./assets/images/bank/12.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank13"><span><img src="./assets/images/bank/13.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank14"><span><img src="./assets/images/bank/14.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank15"><span><img src="./assets/images/bank/15.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank16"><span><img src="./assets/images/bank/16.jpg" alt="bank"/></span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="right-pay">
                        <ul class="side-order">
                          <li><span class="label">Số tiền nạp:</span><span class="cell-value">100.000 đ</span></li>
                          <li><span class="label">Chiết khấu:</span><span class="cell-value"></span></li>
                          <li><span class="label">Phí thanh toán:</span><span class="cell-value">Luôn luôn miễn phí</span></li>
                          <li><span class="label">Mã khách hàng/ Số thẻ:</span><span class="cell-value"></span></li>
                          <li class="total-order"><span class="label">Tổng</span><span class="cell-value">100.000 đ</span></li>
                          <li class="cell-footer">
                            <div class="col-sm-12 button btn btn-third">THANH TOÁN</div>
                            <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="card-pay">
                  <div class="col-sm-8 right-seperate">
                    <div class="card-pay-panel">
                      <h3 class="panel-title">Mua thẻ điện thoại</h3>
                      <div class="form-frontpage">           
                        <div class="text-center">
                          <div class="tnap-group border-active">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g4_custom" href="#vtel"><i class="telco-icon icon-viettel" style="pointer-events: none"></i>
                              <div class="rightfix">12%</div>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g4_custom" href="#mobi"><i class="telco-icon icon-mobile" style="pointer-events: none"></i>
                              <div class="rightfix">12%</div>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g4_custom" href="#vina"><i class="telco-icon icon-vina" style="pointer-events: none"></i>
                              <div class="rightfix">12%</div>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g4_custom" href="#vnmobile"><i class="telco-icon icon-vietnammobile" style="pointer-events: none"></i>
                              <div class="rightfix">12%</div>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g4_custom" href="#gmobile"><i class="telco-icon icon-gmobile"></i>
                              <div class="rightfix">12%</div>
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g4_custom]");
                          </script>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row" style="padding-right: 15px">
                            <label>Số lượng:</label>
                            <input class="form-control" placeholder="Nhập số lượng..."/>
                          </div>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row">
                            <label>Email nhận mã thẻ:</label>
                            <input class="form-control" placeholder="Nhập email..."/>
                          </div>
                        </div>
                        <div class="text-left">
                          <label><strong>Chọn số tiền:</strong></label>
                          <div class="tnap-group">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g5_custom" href="#tnap_20">20.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#tnap_50">50.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#tnap_100">100.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#tnap_200">200.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#tnap_500">500.000đ
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g5_custom]");
                          </script>
                        </div>
                        <div class="text-left">
                          <div class="title"><strong>Phương thức thanh toán:</strong></div>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ ngân hàng nội địa
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Ví điện tử
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Chuyển khoản ATM
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Số dư tài khoản (Yêu cầu đăng nhập)
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ thanh toán quốc tế (Visa/Master)
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="list-banks-detail">
                            <div class="item toggleAreaClass bank1">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/1.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank2">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/2.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank3">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/3.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank4">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/4.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank5">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/5.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank6">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/6.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank7">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/7.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank8">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/8.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank9">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/9.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank10">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/10.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank11">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/11.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank12">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/12.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank13">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/13.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank14">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/14.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank15">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/15.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank16">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/16.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                          </div>
                          <ul class="list-banks">
                            <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/bank/1.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank2"><span><img src="./assets/images/bank/2.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank3"><span><img src="./assets/images/bank/3.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank4"><span><img src="./assets/images/bank/4.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank5"><span><img src="./assets/images/bank/5.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank6"><span><img src="./assets/images/bank/6.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank7"><span><img src="./assets/images/bank/7.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank8"><span><img src="./assets/images/bank/8.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank9"><span><img src="./assets/images/bank/9.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank10"><span><img src="./assets/images/bank/10.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank11"><span><img src="./assets/images/bank/11.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank12"><span><img src="./assets/images/bank/12.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank13"><span><img src="./assets/images/bank/13.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank14"><span><img src="./assets/images/bank/14.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank15"><span><img src="./assets/images/bank/15.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank16"><span><img src="./assets/images/bank/16.jpg" alt="bank"/></span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="right-pay">
                        <ul class="side-order">
                          <li><span class="label">Số tiền nạp:</span><span class="cell-value">100.000 đ</span></li>
                          <li><span class="label">Chiết khấu:</span><span class="cell-value"></span></li>
                          <li><span class="label">Phí thanh toán:</span><span class="cell-value">Luôn luôn miễn phí</span></li>
                          <li><span class="label">Mã khách hàng/ Số thẻ:</span><span class="cell-value"></span></li>
                          <li class="total-order"><span class="label">Tổng</span><span class="cell-value">100.000 đ</span></li>
                          <li class="cell-footer">
                            <div class="col-sm-12 button btn btn-third">THANH TOÁN</div>
                            <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="card-game">
                  <div class="col-sm-8 right-seperate">
                    <div class="card-game-panel">
                      <h3 class="panel-title">Mua thẻ game</h3>
                      <div class="form-frontpage">           
                        <div class="text-center">
                          <div class="tnap-group border-active">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g5_custom" href="#gamevtel"><i class="telco-icon icon-zing" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#gamemobi"><i class="telco-icon icon-vtc" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#gamevina"><i class="telco-icon icon-soha" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#gamevnmobile"><i class="telco-icon icon-appota" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g5_custom" href="#gmobile"><i class="telco-icon icon-gate" style="pointer-events: none"></i>
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g5_custom]");
                          </script>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row" style="padding-right: 15px">
                            <label>Số lượng:</label>
                            <input class="form-control" placeholder="Nhập số lượng..."/>
                          </div>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row">
                            <label>Email nhận mã thẻ:</label>
                            <input class="form-control" placeholder="Nhập email..."/>
                          </div>
                        </div>
                        <div class="text-left">
                          <label><strong>Chọn số tiền:</strong></label>
                          <div class="tnap-group">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g6_custom" href="#tnap_20">20.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g6_custom" href="#tnap_50">50.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g6_custom" href="#tnap_100">100.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g6_custom" href="#tnap_200">200.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g6_custom" href="#tnap_500">500.000đ
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g6_custom]");
                          </script>
                        </div>
                        <div class="text-left">
                          <div class="title"><strong>Phương thức thanh toán:</strong></div>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ ngân hàng nội địa
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Ví điện tử
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Chuyển khoản ATM
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Số dư tài khoản (Yêu cầu đăng nhập)
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ thanh toán quốc tế (Visa/Master)
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="list-banks-detail">
                            <div class="item toggleAreaClass bank1">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/1.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank2">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/2.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank3">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/3.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank4">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/4.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank5">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/5.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank6">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/6.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank7">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/7.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank8">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/8.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank9">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/9.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank10">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/10.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank11">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/11.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank12">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/12.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank13">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/13.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank14">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/14.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank15">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/15.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank16">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/16.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                          </div>
                          <ul class="list-banks">
                            <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/bank/1.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank2"><span><img src="./assets/images/bank/2.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank3"><span><img src="./assets/images/bank/3.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank4"><span><img src="./assets/images/bank/4.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank5"><span><img src="./assets/images/bank/5.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank6"><span><img src="./assets/images/bank/6.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank7"><span><img src="./assets/images/bank/7.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank8"><span><img src="./assets/images/bank/8.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank9"><span><img src="./assets/images/bank/9.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank10"><span><img src="./assets/images/bank/10.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank11"><span><img src="./assets/images/bank/11.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank12"><span><img src="./assets/images/bank/12.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank13"><span><img src="./assets/images/bank/13.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank14"><span><img src="./assets/images/bank/14.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank15"><span><img src="./assets/images/bank/15.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank16"><span><img src="./assets/images/bank/16.jpg" alt="bank"/></span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="right-pay">
                        <ul class="side-order">
                          <li><span class="label">Số tiền nạp:</span><span class="cell-value">100.000 đ</span></li>
                          <li><span class="label">Chiết khấu:</span><span class="cell-value"></span></li>
                          <li><span class="label">Phí thanh toán:</span><span class="cell-value">Luôn luôn miễn phí</span></li>
                          <li><span class="label">Mã khách hàng/ Số thẻ:</span><span class="cell-value"></span></li>
                          <li class="total-order"><span class="label">Tổng</span><span class="cell-value">100.000 đ</span></li>
                          <li class="cell-footer">
                            <div class="col-sm-12 button btn btn-third">THANH TOÁN</div>
                            <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="game-pay">
                  <div class="col-sm-8 right-seperate">
                    <div class="game-pay-panel">
                      <h3 class="panel-title">Nạp tiền game</h3>
                      <div class="form-frontpage">           
                        <div class="text-center">
                          <div class="tnap-group border-active">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g7_custom" href="#gamevtel"><i class="telco-icon icon-vega" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g7_custom" href="#gamemobi"><i class="telco-icon icon-asia" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g7_custom" href="#gamevina"><i class="telco-icon icon-mega" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g7_custom" href="#gamevnmobile"><i class="telco-icon icon-ongame" style="pointer-events: none"></i>
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g7_custom" href="#gmobile"><i class="telco-icon icon-bit" style="pointer-events: none"></i>
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g7_custom]");
                          </script>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row" style="padding-right: 15px">
                            <label>Số lượng:</label>
                            <input class="form-control" placeholder="Nhập số lượng..."/>
                          </div>
                        </div>
                        <div class="form-group col-sm-6">
                          <div class="row">
                            <label>Email nhận mã thẻ:</label>
                            <input class="form-control" placeholder="Nhập email..."/>
                          </div>
                        </div>
                        <div class="text-left">
                          <label><strong>Chọn số tiền:</strong></label>
                          <div class="tnap-group">
                            <div class="btn btn-xmd btn-primary" data-toggle="" role="g8_custom" href="#tnap_20">20.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g8_custom" href="#tnap_50">50.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g8_custom" href="#tnap_100">100.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g8_custom" href="#tnap_200">200.000đ
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="" role="g8_custom" href="#tnap_500">500.000đ
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=g8_custom]");
                          </script>
                        </div>
                      </div>
                      <div class="text-left">
                        <div class="title"><strong>Phương thức thanh toán:</strong></div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="radio method-item">
                              <label>
                                <input type="radio" name="inlineRadioOptions"/>Thẻ ngân hàng nội địa
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="radio method-item">
                              <label>
                                <input type="radio" name="inlineRadioOptions"/>Ví điện tử
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="radio method-item">
                              <label>
                                <input type="radio" name="inlineRadioOptions"/>Chuyển khoản ATM
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="radio method-item">
                              <label>
                                <input type="radio" name="inlineRadioOptions"/>Số dư tài khoản (Yêu cầu đăng nhập)
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="radio method-item">
                              <label>
                                <input type="radio" name="inlineRadioOptions"/>Thẻ thanh toán quốc tế (Visa/Master)
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="list-banks-detail">
                          <div class="item toggleAreaClass bank1">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/1.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank2">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/2.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank3">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/3.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank4">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/4.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank5">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/5.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank6">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/6.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank7">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/7.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank8">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/8.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank9">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/9.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank10">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/10.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank11">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/11.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank12">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/12.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank13">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/13.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank14">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/14.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank15">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/15.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                          <div class="item toggleAreaClass bank16">
                            <div class="col-sm-4">
                              <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/16.jpg" alt="bank"/></span></span></div>
                            </div><span class="col-sm-8">
                              <div class="col-sm-12">
                                <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                <div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                  </div>
                                  <div class="row">   
                                    <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                    <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                  </div>
                                </div>
                              </div></span>
                          </div>
                        </div>
                        <ul class="list-banks">
                          <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/bank/1.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank2"><span><img src="./assets/images/bank/2.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank3"><span><img src="./assets/images/bank/3.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank4"><span><img src="./assets/images/bank/4.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank5"><span><img src="./assets/images/bank/5.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank6"><span><img src="./assets/images/bank/6.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank7"><span><img src="./assets/images/bank/7.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank8"><span><img src="./assets/images/bank/8.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank9"><span><img src="./assets/images/bank/9.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank10"><span><img src="./assets/images/bank/10.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank11"><span><img src="./assets/images/bank/11.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank12"><span><img src="./assets/images/bank/12.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank13"><span><img src="./assets/images/bank/13.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank14"><span><img src="./assets/images/bank/14.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank15"><span><img src="./assets/images/bank/15.jpg" alt="bank"/></span></li>
                          <li class="toggleArea justOpen" data-toggle="bank16"><span><img src="./assets/images/bank/16.jpg" alt="bank"/></span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="right-pay">
                        <ul class="side-order">
                          <li><span class="label">Số tiền nạp:</span><span class="cell-value">100.000 đ</span></li>
                          <li><span class="label">Chiết khấu:</span><span class="cell-value"></span></li>
                          <li><span class="label">Phí thanh toán:</span><span class="cell-value">Luôn luôn miễn phí</span></li>
                          <li><span class="label">Mã khách hàng/ Số thẻ:</span><span class="cell-value"></span></li>
                          <li class="total-order"><span class="label">Tổng</span><span class="cell-value">100.000 đ</span></li>
                          <li class="cell-footer">
                            <div class="col-sm-12 button btn btn-third">THANH TOÁN</div>
                            <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="internet-pay">
                  <div class="col-sm-8 right-seperate">
                    <div class="internet-pay-panel">
                      <h3 class="panel-title">Thanh toán hóa đơn</h3>
                      <div class="form">
                        <div class="text-center">
                          <div class="btn-group">
                            <div class="btn btn-xmd btn-primary" data-toggle="tab" role="tabcontent-toggle" href="#g1_internet">Cước Internet 
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="tab" role="tabcontent-toggle" href="#g1_tv">Cước Truyền hình 
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="tab" role="tabcontent-toggle" href="#g1_combo">Combo Truyền hình & Internet 
                            </div>
                            <div class="btn btn-xmd btn-default" data-toggle="tab" role="tabcontent-toggle" href="#g1_home-phone">Điện thoại cố định
                            </div>
                          </div>
                          <div class="tab-content">
                            <div class="tab-pane fade in active" id="g1_internet"><small>Demo Cước Internet</small>
                              <div class="form-frontpage"><br/>
                                <div class="form-group text-center">
                                  <label class="float-label">Nhà cung cấp:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">K+</span>
                                          </li>
                                          <li><span class="left-drop">K1+</span>
                                          </li>
                                          <li><span class="left-drop">K+2</span>
                                          </li>
                                          <li><span class="left-drop">K1+3</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Số tiền:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Mã kiểm tra:</label>
                                  <div class="form-inline"><span class="telco-icon icon-bit telco-icon-right">
                                      <input class="form-control" placeholder="Mã..."/></span></div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="g1_tv"><small>Demo Cước Truyền hình</small>
                              <div class="form-frontpage"><br/>
                                <div class="form-group text-center">
                                  <label class="float-label">Nhà cung cấp:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">K+</span>
                                          </li>
                                          <li><span class="left-drop">K1+</span>
                                          </li>
                                          <li><span class="left-drop">K+2</span>
                                          </li>
                                          <li><span class="left-drop">K1+3</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Số tiền:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Mã kiểm tra:</label>
                                  <div class="form-inline"><span class="telco-icon icon-bit telco-icon-right">
                                      <input class="form-control" placeholder="Mã..."/></span></div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="g1_combo"><small>Demo Combo Truyền hình & Internet</small>
                              <div class="form-frontpage"><br/>
                                <div class="form-group text-center">
                                  <label class="float-label">Nhà cung cấp:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">K+</span>
                                          </li>
                                          <li><span class="left-drop">K1+</span>
                                          </li>
                                          <li><span class="left-drop">K+2</span>
                                          </li>
                                          <li><span class="left-drop">K1+3</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Số tiền:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Mã kiểm tra:</label>
                                  <div class="form-inline"><span class="telco-icon icon-bit telco-icon-right">
                                      <input class="form-control" placeholder="Mã..."/></span></div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="g1_home-phone"><small>Demo Điện thoại cố định</small>
                              <div class="form-frontpage"><br/>
                                <div class="form-group text-center">
                                  <label class="float-label">Nhà cung cấp:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">K+</span>
                                          </li>
                                          <li><span class="left-drop">K1+</span>
                                          </li>
                                          <li><span class="left-drop">K+2</span>
                                          </li>
                                          <li><span class="left-drop">K1+3</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Số tiền:</label>
                                  <div class="form-inline"><span><span class="dropdown"><span class="form-control text-left" data-toggle="dropdown" id="id-dropdown">-- Chọn --<span class="caret"></span></span>
                                        <ul class="dropdown-menu" aria-labelledby="id-dropdown">
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                          <li><span class="left-drop">1 tháng</span><span class="right-drop text-red">135.000 đ</span>
                                          </li>
                                        </ul></span></span></div>
                                </div>
                                <div class="form-group text-center">
                                  <label class="float-label">Mã kiểm tra:</label>
                                  <div class="form-inline"><span class="telco-icon icon-bit telco-icon-right">
                                      <input class="form-control" placeholder="Mã..."/></span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            (function buttonGroup (attr) {
                                var tab = document.querySelectorAll(attr)
                                var removeActive = function () {
                                    tab.forEach(function (el) {
                                        el.classList.remove('btn-primary');
                                        el.classList.add('btn-default');
                                    })
                                }
                                var listenActive = function (e) {
                                    if (e.target.hasAttribute('role')) {
                                        removeActive();
                                        e.target.classList.remove('btn-default');
                                        e.target.classList.add('btn-primary');
                                    }
                                }
                                tab.forEach(function (el) {
                                    el.addEventListener('click', listenActive)
                                })
                            })("[role=tabcontent-toggle]");
                          </script>
                        </div>
                        <div class="text-left">
                          <div class="title"><strong>Phương thức thanh toán:</strong></div>
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ ngân hàng nội địa
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Ví điện tử
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Chuyển khoản ATM
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Số dư tài khoản (Yêu cầu đăng nhập)
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="radio method-item">
                                <label>
                                  <input type="radio" name="inlineRadioOptions"/>Thẻ thanh toán quốc tế (Visa/Master)
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="list-banks-detail">
                            <div class="item toggleAreaClass bank1">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/1.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank2">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/2.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank3">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/3.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank4">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/4.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank5">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/5.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank6">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/6.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank7">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/7.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank8">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/8.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank9">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/9.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank10">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/10.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank11">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/11.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank12">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/12.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank13">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/13.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank14">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/14.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank15">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/15.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                            <div class="item toggleAreaClass bank16">
                              <div class="col-sm-4">
                                <div class="row"><span class="img-wraper"><span class="img"><img src="./assets/images/bank/16.jpg" alt="bank"/></span></span></div>
                              </div><span class="col-sm-8">
                                <div class="col-sm-12">
                                  <div class="title">Ngân hàng cổ phần thương mại Ngoại thương Việt Nam - Vietcombank</div>
                                  <div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Tên tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText">Công ty ABC                               </span></div>
                                    </div>
                                    <div class="row">   
                                      <div class="col-sm-4"><span class="strongText">Số tài khoản:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">123456789123</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><span class="strongText">Chi nhánh:</span></div>
                                      <div class="col-sm-8"><span class="strongText redText">Hà nội</span></div>
                                    </div>
                                  </div>
                                </div></span>
                            </div>
                          </div>
                          <ul class="list-banks">
                            <li class="toggleArea justOpen" data-toggle="bank1"><span><img src="./assets/images/bank/1.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank2"><span><img src="./assets/images/bank/2.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank3"><span><img src="./assets/images/bank/3.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank4"><span><img src="./assets/images/bank/4.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank5"><span><img src="./assets/images/bank/5.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank6"><span><img src="./assets/images/bank/6.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank7"><span><img src="./assets/images/bank/7.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank8"><span><img src="./assets/images/bank/8.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank9"><span><img src="./assets/images/bank/9.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank10"><span><img src="./assets/images/bank/10.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank11"><span><img src="./assets/images/bank/11.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank12"><span><img src="./assets/images/bank/12.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank13"><span><img src="./assets/images/bank/13.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank14"><span><img src="./assets/images/bank/14.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank15"><span><img src="./assets/images/bank/15.jpg" alt="bank"/></span></li>
                            <li class="toggleArea justOpen" data-toggle="bank16"><span><img src="./assets/images/bank/16.jpg" alt="bank"/></span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="right-pay">
                        <ul class="side-order">
                          <li><span class="label">Số tiền nạp:</span><span class="cell-value">100.000 đ</span></li>
                          <li><span class="label">Chiết khấu:</span><span class="cell-value"></span></li>
                          <li><span class="label">Phí thanh toán:</span><span class="cell-value">Luôn luôn miễn phí</span></li>
                          <li><span class="label">Mã khách hàng/ Số thẻ:</span><span class="cell-value"></span></li>
                          <li class="total-order"><span class="label">Tổng</span><span class="cell-value">100.000 đ</span></li>
                          <li class="cell-footer">
                            <div class="col-sm-12 button btn btn-third">THANH TOÁN</div>
                            <div class="noti-message">Bằng việc chọn 'Thanh toán', bạn đồng ý với<a>&nbsp;chính sách cung cấp, hủy và hoàn trả dịch vụ</a></div>
                          </li>
                        </ul>
                      </div>
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