@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <h3>You will be charged ${{ number_format(($plan->cost)/100, 2) }} for {{ $plan->name }} Plan</h3>
                </div>
                <div class="wrapper">
                    <form action="{{ route('subscription.create') }}" method="post" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-body">

                                <div class="container">
                                    <div class="d-flex flex-wrap align-items-center mb-4 card-element">
                                        <label class="me-2 flex-grow-0 form-label" for="created_by">
                                            Plan buyer
                                        </label>
                                        <select class="form-select form-control" id="created_by" name="customer_id">
                                            @foreach($customer as $info)
                                                <option value="{{$info->user->id}}">{{$info->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center mb-4 card-element">
                                        <label class="me-2 flex-grow-0 form-label" for="created_by">
                                            Package
                                        </label>

                                        <select class="form-select form-control" id="created_by" name="package_id">
                                            @foreach($package as $info)
                                                <option value="{{$info->id}}">{{$info->name}}, price: {{ number_format(($info->price)/100, 3)}}$</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div>
                                        <label class="me-2 flex-grow-0 form-label" for="created_by">
                                            Gym
                                        </label>
                                        <select class="form-select form-control" id="created_by" name="gym_id">
                                            @foreach($gym as $info)
                                                <option value="{{$info->id}}">{{$info->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br><br>
                                <h4>Please Enter Card Details</h4>
                                <div id="card-element" class="container form-control">

                                    <!-- A Stripe Element will be inserted here with JS below. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden"  name="plan" value="{{ $plan->id }}" />
                            </div>
                        </div>

                        <div class="card-footer" align="center" >
                            <button class="btn btn-primary" type="submit" style="width: 300px">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3"></script>

        <script>
        // Create a Stripe client.
        let stripe = Stripe('{{ env("STRIPE_KEY") }}');
        {{--let clientSecret = Stripe('{{ env("STRIPE_SECRET_KEY") }}');--}}

        // Create an instance of Elements.
        // let elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        const appearance = {
            theme: 'night',
            variables: {
                fontFamily: 'Sohne, system-ui, sans-serif',
                fontWeightNormal: '500',
                borderRadius: '8px',
                colorBackground: '#0A2540',
                colorPrimary: '#EFC078',
                colorPrimaryText: '#1A1B25',
                colorText: 'white',
                colorTextSecondary: 'white',
                colorTextPlaceholder: '#727F96',
                colorIconTab: 'white',
                colorLogo: 'dark'
            },
            rules: {
                '.Input, .Block': {
                    backgroundColor: 'transparent',
                    border: '1.5px solid var(--colorPrimary)'
                }
            }
        };

        // Create an instance of the card Element.

        const elements = stripe.elements({stripe, appearance});
        let card = elements.create('card', {style:  appearance });

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
