
    var stripe = Stripe('pk_test_51MSWAhAXTBIXjp6tFQD26S1dUqSa08KBu5Bpz9ZHfpfX6eP8NJouALvBgjAh2CLu54qY6N3rfZLmOPTOHQlfOReW00IQ0LnUtW');

    var elements = stripe.elements();
    var style = {
        base: {
        color: '#32325d',
        fontFamily: 'Ideal Sans, system-ui, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder":{
            color: "#aab7c4"
        }
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
},
    };

    var cardElement = elements.create('card',{style: style});
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event){
    // We don't want to let default form submission happen here,
    // which would refresh the page.
    event.preventDefault();

    stripe.createPaymentMethod({
        type: 'card',
        card: cardElement, // elements instance
            billing_details: {
                name: 'Test Name',
            },
        }).then(stripePaymentMethodHandler);
    });

    function stripePaymentMethodHandler(result){
        if (result.error) {
        // Show error in payment form
        } else {
            document.getElementById('payment_method_id').value =result.paymentMethod.id;
            form.submit();
          
        }
    }
