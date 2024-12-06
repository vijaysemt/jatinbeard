@include('header')

<div class="container my-5">
    <h2 class="mb-4">Shopping Cart</h2>
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>  <img src="{{ url('admin/assets/uploads/product/home/' . $item->product->pimage) }}"
                                    alt="" width="50px"></td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    <input type="number" value="{{ $item->quantity }}" class="qty-input" data-id="{{ $item->id }}" min="1" max="10">
                                </td>
                                <td>{{ number_format($item->product->price, 2) }}/-</td>
                                <td class="item-total">{{ number_format($item->product->price * $item->quantity, 2) }}/-</td>
                                <td>
                                    <a href="{{ route('cart.remove', ['id' => $item->product_id]) }}" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6 text-start">
            <a href="{{ url('shop') }}">
                <button class="btn btn-primary">Back to shop</button>
            </a>
        </div>
        <div class="col-6 text-end">
            <h4>Total: <span id="cart-total">{{ number_format($total, 1) }}/-</span></h4>
            <button class="btn btn-primary" onclick="location.href='/checkout'">Checkout</button>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInputs = document.querySelectorAll('.qty-input');

    qtyInputs.forEach(input => {
        input.addEventListener('change', function() {
            const id = this.dataset.id;
            const qty = this.value;

            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: id,
                    quantity: qty
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update item total
                    const row = input.closest('tr');
                    row.querySelector('.item-total').innerText = `$${data.itemTotal.toFixed(2)}`;

                    // Update cart total
                    document.getElementById('cart-total').innerText = `${data.cartTotal.toFixed(2)}`;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});


</script>


@include('footer')
