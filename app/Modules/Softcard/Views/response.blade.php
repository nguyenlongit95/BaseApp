<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Mã thẻ</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $scOrders as $order )
        <tr>
            <td>{{ $order->product }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ number_format($order->subtotal) }} VND</td>
            <td>
                @foreach( \App\Modules\Softcard\Models\Softcard::getCard($order->order_no, $order->product_sku)  as $card )
                    <p> Serial: {{ $card->serial }} - Code: {{ \App\Helpers\CryptHelper::decodeCrypt($card->code) }}</p>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
