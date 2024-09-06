<div class="max-w-screen-xl mx-auto p-6 bg-white shadow-md rounded-lg border border-gray-200 mt-12">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Update Payment Method</h2>

    {{-- formulario de metodo de pago --}}

    <form id="payment-form" class="space-y-4 mb-4">
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

    {{-- spinner --}}

    <div class="justify-center items-center" wire:target="addPaymentMethod" wire:loading.flex>
        <x-loading-spinner />
    </div>

    {{-- listado de metodos de pago --}}
    @if (count($paymentMethods))
        <div class="mx-auto max-w-screen-xl">
            <h2 class="text-2xl font-semibold mb-4">Métodos de Pago</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 w-full">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Tipo de Tarjeta</th>
                            <th class="py-2 px-4 border-b">Nombre</th>
                            <th class="py-2 px-4 border-b">Últimos 4 dígitos</th>
                            <th class="py-2 px-4 border-b">Expiración</th>
                            <th class="py-2 px-4 border-b">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($paymentMethods as $index => $paymentMethod)
                            <tr wire:key="{{ $index }}">
                                <td class="py-2 px-4 border-b">
                                    {{ ucfirst($paymentMethod->card->brand) }}

                                    @if (auth()->user()->hasDefaultPaymentMethod())
                                        @if (auth()->user()->defaultPaymentMethod()->id == $paymentMethod->id)
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Predeterminada</span>
                                        @endif
                                    @endif

                                </td>
                                <td class="py-2 px-4 border-b">{{ $paymentMethod->billing_details->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $paymentMethod->card->last4 }}</td>
                                <td class="py-2 px-4 border-b">
                                    {{ $paymentMethod->card->exp_month }}/{{ $paymentMethod->card->exp_year }}</td>
                                <td class="py-2 px-4 border-b flex">

                                    {{-- usando propiedad computada --}}
                                    @if ($this->hasDefaultPaymentMethod)
                                        {{-- usando propiedad computada --}}
                                        @if ($this->defaultPaymentMethod->id != $paymentMethod->id)
                                            <a wire:click="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                                wire:target="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                                wire:loading.attr="disabled"
                                                class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 cursor-pointer disabled:opacity-25">
                                                Predeterminada
                                            </a>

                                            <a wire:click="deletePaymentMethod('{{ $paymentMethod->id }}')"
                                                wire:target="deletePaymentMethod('{{ $paymentMethod->id }}')"
                                                wire:loading.attr="disabled"
                                                class="ml-3 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 cursor-pointer disabled:opacity-25">
                                                Eliminar
                                            </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    No tienes ningún método de pago registrado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

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
                    console.log(setupIntent)
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
