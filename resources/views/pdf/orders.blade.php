<table>
    <thead>
        <tr>
            <th>Order Date</th>
            <th>Tracking Number</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                <td>{{ $order->tracking_number }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status == '0' ? 'Pending' : 'Completed' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>