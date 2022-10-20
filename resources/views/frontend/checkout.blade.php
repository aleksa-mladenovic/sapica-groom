@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone number">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Pin Code</label>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        @if($cartItems->count() > 0)
                            <div class="card-body">
                                @php
                                    $total = 0;
                                @endphp
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td> {{ $item->product->name }} </td>
                                                <td> {{ $item->prod_qty }} </td>
                                                <td> {{ $item->product->selling_price }}€ </td>
                                            </tr>
                                            @php
                                                $total += $item->product->selling_price * $item->prod_qty;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td>Total: </td>
                                            <td></td>
                                            <td> {{ $total }}€ </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-primary w-100 mb-2">Place Order - Cash on Delivery</button>
                                <div id="paypal-button-container"></div>
                            </div>
                        @else
                            <div class="card-body text-center">
                                <h6>Order Details</h6>
                                <hr>
                                <h2>No products in cart</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=Ab3NbDnX4u5wpE3ORx4RrK2P-JHkbIhV_hZC_mhHuoOa-mB5RmAtF6wxn_HlzEFlLTJtrL4VQl6tPt2R&currency=EUR"></script>
    <script>
        paypal.Buttons({
          // Sets up the transaction when a payment button is clicked
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '{{ $total }}' // Can also reference a variable or function
                }
              }]
            });
          },
          // Finalize the transaction after payer approval
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            });
          }
        }).render('#paypal-button-container');
      </script>
@endsection