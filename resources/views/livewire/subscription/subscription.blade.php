<x-container>
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-white sm:text-5xl">
                    Pricing Plans
                </h2>
                <p class="mt-4 text-xl text-gray-400">
                    Simple, transparent pricing for your business needs.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                <!-- Basic Plan -->
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="mb-8 text-center">
                        <h3 class="text-2xl font-semibold text-white">Basic</h3>
                        <p class="mt-4 text-gray-400">Get started with our basic features.</p>
                    </div>
                    <div class="mb-8 text-center">
                        <span class="text-5xl font-extrabold text-white">$10</span>
                        <span class="text-xl font-medium text-gray-400">/mo</span>
                    </div>
                    <ul class="mb-8 space-y-4 text-gray-400">
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>1 user account</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>10 transactions per month</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Basic support</span>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-6">
                        <x-link-button wire:click="newSubscription('price_1Pw8XZFhVNRahIFwZs82nb5I')"
                            wire:target="newSubscription('price_1Pw8XZFhVNRahIFwZs82nb5I')" wire:loading.class="hidden"
                            class="font-bold bg-blue-500 hover:bg-blue-400">
                            Month plan
                        </x-link-button>

                        <div wire:target="newSubscription('price_1Pw8XZFhVNRahIFwZs82nb5I')" wire:loading>
                            <x-loading-spinner />
                        </div>
                    </div>
                </div>

                <!-- Starter Plan -->
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="mb-8 text-center">
                        <h3 class="text-2xl font-semibold text-white">Starter</h3>
                        <p class="mt-4 text-gray-400">Perfect for small businesses and startups.</p>
                    </div>
                    <div class="mb-8 text-center">
                        <span class="text-5xl font-extrabold text-white">$50</span>
                        <span class="text-xl font-medium text-gray-400">/mo</span>
                    </div>
                    <ul class="mb-8 space-y-4 text-gray-400">
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>5 user accounts</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>100 transactions per month</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Standard support</span>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-6">
                        <x-link-button wire:click="newSubscription('price_1Pw8YTFhVNRahIFw4Wf3wZn5')"
                            class="font-bold bg-red-500 hover:bg-red-400">
                            Six month plan
                        </x-link-button>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="mb-8 text-center">
                        <h3 class="text-2xl font-semibold text-white">Pro</h3>
                        <p class="mt-4 text-gray-400">Ideal for growing businesses and enterprises.</p>
                    </div>
                    <div class="mb-8 text-center">
                        <span class="text-5xl font-extrabold text-white">$100</span>
                        <span class="text-xl font-medium text-gray-400">/mo</span>
                    </div>
                    <ul class="mb-8 space-y-4 text-gray-400">
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Unlimited user accounts</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Unlimited transactions</span>
                        </li>
                        <li class="flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Priority support</span>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-6">
                        <x-link-button wire:click="newSubscription('price_1Pw8YxFhVNRahIFwyMHca1td')"
                            class="font-bold bg-violet-500 hover:bg-violet-400">
                            Year plan
                        </x-link-button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-container>
