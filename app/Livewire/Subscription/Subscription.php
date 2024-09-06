<?php

namespace App\Livewire\Subscription;

use Livewire\Component;

class Subscription extends Component
{
    // propiedades publicas
    public $user;

    // ! propiedades computadas

    // ? propiedad para recuperar el objeto con el metodo de pago predeterminado

    public function getDefaultPaymentMethodProperty()
    {
        return $this->user->defaultPaymentMethod();
    }

    // funcion para crear una subscripcion 

    public function newSubscription($plan)
    {
        // primer parametro (nombre del producto),segundo parametro (id del plan escogido)
        $this->user->newSubscription(env('STRIPE_PRODUCT'), $plan)
            // le debemos pasar el id del metodo de pago que queramos usar
            // en este caso usamos el metodo de pago predeterminado
            ->create($this->defaultPaymentMethod->id);
    }

    public function mount()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.subscription.subscription')->layout('layouts.app');
    }
}
