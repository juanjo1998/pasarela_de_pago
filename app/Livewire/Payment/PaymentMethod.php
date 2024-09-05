<?php

namespace App\Livewire\Payment;

use Livewire\Component;

class PaymentMethod extends Component
{
    public function addPaymentMethod($paymentMethod)
    {
        auth()->user()->addPaymentMethod($paymentMethod);
    }

    public function render()
    {
        return view('livewire.payment.payment-method', ['intent' => auth()->user()->createSetupIntent()]);
    }
}
