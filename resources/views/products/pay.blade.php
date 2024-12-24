@extends('layouts.app')

@section('title')
    Payment
@endsection

@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Payment</h1>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container" style="margin-left: 250px; margin-top: 50px;">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=Aep9d6S1wMHdDn8wzd7JAUpBdm9Xdqmlnxt8zu5cELQID0w2kgeEktrfQqUNsmhNuq0YZ4zTW4c1HNAP&currency=USD">
        </script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value:'{{ Session::get('price') }}'
                                 // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        window.location.href = 'http://127.0.0.1:8000/success';
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
@endsection
