<div id="transporting" class="container tab-pane fade"><br>
    <h3>Vận chuyển</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">Ngày đặt</th>
            <th>Người nhận</th>
            <th class="text-center">Số điện thoại</th>
            <th class="text-right">Tổng tiền</th>
            <th class="text-center">Phương thức thanh toán</th>
            <th class="text-center">Tỉnh</th>
            <th class="text-right">Địa chỉ</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach( $orders as $order)
            <tr class="product">
                <td class="text-center">{{ $order->created_at }}</td>
                <td class="text-left">{{ $order->name }}</td>
                <td class="text-center">{{ $order->phone }}</td>
                <td class="text-right gia-sanpham">{{ currency_format($order->total_price) }} VNĐ</td>
                <td class="text-center">{{ isset($order->pay_id) ? $order->payment->name : '-' }}</td>
                <td class="text-center">{{ isset($order->area_id) ? $order->area->name : '-' }}</td>
                <td class="text-right">{{ $order->address }}</td>
                <td class="text-right">
                    <a href="{{ route('order-show', $order->id) }}">
                        <span class="badge badge-primary">Xem chi tiết</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
