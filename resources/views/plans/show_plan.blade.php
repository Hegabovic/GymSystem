@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>You will be charged ${{ number_format(($plan->cost)/100, 2) }} for {{ $plan->name }} Plan</p>
                </div>
                <div class="card">
                    <form action="{{ route('subscription.create') }}" method="post" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            @dd($data)
                            <div class="card-body">
                                {{--
                                         drop down > user
                                                   > train
                                                   > gym
                                 --}}
                                <div class="d-flex flex-wrap align-items-center mb-4 card-element">
                                    <label class="me-2 flex-grow-0 form-label" for="created_by">
                                        Plan buyer
                                    </label>
                                    <select class="form-select" id="created_by" name="created_by">
                                        @foreach($data as $info)
                                            <option value="{{$info->user->id}}">{{$info->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here with JS below. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="{{ $plan->id }}" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        let stripe = Stripe('{{ env("STRIPE_KEY") }}');

        // Create an instance of Elements.
        let elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        let card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            let displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        let form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    let errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            let form = document.getElementById('payment-form');
            let hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
