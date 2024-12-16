@extends('Frontend.layout.main')

@section('main-container')
    <div class="card mt-4 mb-2" style="max-width: 100%; width: 90%; margin: 0 auto; margin-bottom: 20px;">
        <div class="card-body">
            <h2 class="card-title text-center mt-3 mb-3" style="margin-bottom: 20px;">Order History</h2>
            @if($orders->isNotEmpty())
                <!-- Responsive table wrapper -->
                <div class="table-responsive" style="text-align: center;">
                    <table class="table table-bordered text-center" >
                        <thead>
                            <tr>
                                <th style="text-align: center;">Order ID</th>
                                <th style="text-align: center;">Product</th>
                                <th style="text-align: center;">Total Cost</th>
                                <th style="text-align: center;">Date & Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $reversedOrders = $orders->reverse();
                            @endphp
                            @foreach($reversedOrders as $order)
                                <tr>
                                    <td style="font-size: 1.2em;">{{ $order->order_id ?: '-' }}</td>
                                    <td>
                                        <ul style="list-style-type: none; padding: 0;">
                                            @php
                                                $Productnames = explode(',', $order->product_name);
                                            @endphp
                                            @foreach ($Productnames as $name)
                                                <li>{{ $name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td style="font-size: 1.2em;">₹{{ $order->total_cost }}</td>
                                    <td style="font-size: 1.2em;">{{ $order->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="d-flex justify-content-center" style="display: flex; justify-content: center;">
                    {{ $orders->links() }}
                </div> --}}


            @else
                <p style="text-align: center;">No orders found.</p>
            @endif
        </div>
    </div>

    <script>
        function cancelOrder(orderId) {
            console.log("Order ID:", orderId);
            if (confirm('Are you sure you want to cancel this order?')) {
                fetch(`/order/${orderId}/cancel`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Order cancelled successfully.');
                        location.reload();
                    } else {
                        alert('Failed to cancel the order. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>

@endsection
