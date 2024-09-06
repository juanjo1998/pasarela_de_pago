<?php

namespace App\Livewire\Payment;

use Livewire\Component;

class PaymentMethod extends Component
{
    // propiedades publicas
    public $user;

    //  ! propiedades computadas

    // ? propiedad para saber si el usuario tiene un metodo de pago predeterminado

    public function getHasDefaultPaymentMethodProperty()
    {
        return $this->user->hasDefaultPaymentMethod();
    }

    // ? propiedad para recuperar el objeto con el metodo de pago predeterminado

    public function getDefaultPaymentMethodProperty()
    {
        return $this->user->defaultPaymentMethod();
    }

    //  ! funciones 

    // funcion para asociar un usuario con un metodo de pago

    public function addPaymentMethod($paymentMethod)
    {
        // agregar metodo de pago
        $this->user->addPaymentMethod($paymentMethod);

        // se cumple si no tiene un metodo de pago predeterminado
        if (!$this->user->hasDefaultPaymentMethod()) {
            $this->defaultPaymentMethod($paymentMethod);
        }
    }

    // funcion para asignar un metodo de pago predeterminado

    public function defaultPaymentMethod($paymentMethod)
    {
        $this->user->updateDefaultPaymentMethod($paymentMethod);
    }

    // funcion para eliminar un metodo de pago

    public function deletePaymentMethod($paymentMethod)
    {
        $this->user->deletePaymentMethod($paymentMethod);
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.payment.payment-method', [
            'intent' => $this->user->createSetupIntent(),
            'paymentMethods' => $this->user->paymentMethods(),
        ]);
    }
}
