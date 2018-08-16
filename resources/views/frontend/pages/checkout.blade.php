@extends("frontend.master")

@section('content')
<section class="main">
    <div class="section">
        <div class="container">
            <div class="fullColumn" style="padding-top: 30px">
                @if( $total == 0 )
                    <h3>Giỏ hàng rỗng</h3>
                @else
                    <h3>Thanh toán đơn hàng</h3>
                    <p>Số dư hiện tại: {{ $balance  }} {{ $wallet->currency_code }} </p>
                    <p>Giá trị đơn hàng (Đã chiếc khấu) : {{ $total }}  </p>
                    <p>{{ Cart::Content() }}</p>
                    <form action="{{ route('frontend.mtopup.postcheckout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn-primary btn">thực hiện giao dịch</button>
                    </form>
                @endif


            </div>
        </div>
    </div>
</section>

@endsection
