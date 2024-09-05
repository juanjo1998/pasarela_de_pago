<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg border border-gray-200 mt-12">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Update Payment Method</h2>

    <form id="payment-form" class="space-y-4">
        <div class="mb-4">
            <label for="card-holder-name" class="block text-sm font-medium text-gray-700">Card Holder Name</label>
            <input id="card-holder-name" type="text"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="John Doe">
        </div>

        <div class="mb-4">
            <label for="card-element" class="block text-sm font-medium text-gray-700">Credit or Debit Card</label>
            <!-- Stripe Elements Placeholder -->
            <div wire:ignore id="card-element" class="mt-1 p-3 border border-gray-300 rounded-md shadow-sm bg-gray-50">
            </div>
        </div>

        <button id="card-button" data-secret="{{ $intent->client_secret }}" type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Update Payment Method
        </button>

        <div id="error-message-alert"
            class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span id="error-message-text" class="block sm:inline"></span>
        </div>
    </form>

    {{-- JS --}}
    @push('js')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');
        </script>

        <script>
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');

            cardButton.addEventListener('click', async (e) => {
                e.preventDefault()

                const clientSecret = cardButton.dataset.secret;
                console.log(clientSecret)

                cardButton.disabled = true
                cardButton.classList.add('opacity-50', 'cursor-not-allowed');

                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                );

                if (error) {
                    // Display "error.message" to the user...
                    const errorMessageAlert = document.getElementById("error-message-alert")
                    const errorMessageText = document.getElementById("error-message-text")

                    errorMessageAlert.style.display = "block"
                    errorMessageText.textContent = error.message

                } else {
                    // clean form
                    cardHolderName.value = ""
                    cardElement.clear()

                    // The card has been verified successfully...
                    @this.addPaymentMethod(setupIntent.payment_method)
                }
            });
        </script>
    @endpush
</div>
