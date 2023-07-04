<div>
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <a href="{{ route('myorders') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Meus Pedidos
                </a>
            </div>
        </div>
    </div>

    @include('layouts.flash-message')
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            @if (count($cartItems) == 0)
                <p class="text-2xl font-bold">Your cart is empty!</p>
            @else
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Menu</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell">Unit price</th>
                                <th class="text-right">Total price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <img src="{{ Storage::url($item['image']) }}" class="w-20 rounded"
                                                alt="Thumbnail" />
                                        </a>
                                    </td>
                                    <td>
                                        <p class="mb-2">{{ $item['name'] }}</p>
                                        <button type="submit" class="text-red-700"
                                            wire:click="removeItem({{ $item['id'] }})">
                                            <small>(Remove item)</small>
                                        </button>
                                    </td>
                                    <td class="justify-center md:justify-end md:flex mt-4">
                                        <div class="w-20 h-10">
                                            <div class="custom-number-input h-10 w-32">
                                                <div
                                                    class="flex flex-row h-10 w-full rounded-lg relative bg-transparent">
                                                    <button
                                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-8 w-8 rounded-l cursor-pointer outline-none"
                                                        wire:click="decrementQty({{ $item['id'] }})">
                                                        <span class="m-auto text-2xl font-thin">−</span>
                                                    </button>
                                                    <span class="pt-1.5 px-2">{{ $item['qty'] }}</span>
                                                    <button
                                                        class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-8 w-8 rounded-r cursor-pointer"
                                                        wire:click="incrementQty({{ $item['id'] }})">
                                                        <span class="m-auto text-2xl font-thin">+</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ $item['price'] }}$
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ $item['price'] * $item['qty'] }}$
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="pb-6 mt-6" />


                    <div class="my-4 mt-6 -mx-2 lg:flex">
                        <div class="lg:px-2 lg:w-1/2">
                            <div class="mb-6">
                                <label for="phone"
                                    class="block mb-2 text-sm lg:text-base text-gray-900 dark:text-gray-300">Phone for
                                    contact</label>
                                <input wire:model="phone" type="text" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                @error('phone')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="address"
                                    class="block mb-2 text-sm lg:text-base text-gray-900 dark:text-gray-300">Your
                                    address</label>
                                <input wire:model="address" type="text" id="password"
                                    placeholder="Rua, Numero, Bairro"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                @error('address')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="payment_method"
                                    class="block mb-2 text-sm lg:text-base text-gray-900 dark:text-gray-300">Select
                                    Payment Method</label>
                                <select id="payment_method" wire:model="payment_method"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled>Select Payment Method</option>
                                    <option value="Money">Money</option>
                                    <option value="Pix">Pix</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Debit Card">Debit Card</option>
                                </select>
                                @error('payment_method')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="lg:px-2 lg:w-1/2">
                            <div class="p-4 bg-gray-100 rounded-full">
                                <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Subtotal
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ $sub_total }}$
                                    </div>
                                </div>
                                <div class="flex justify-between pt-4 border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Tax
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ $tax }}$
                                    </div>
                                </div>
                                <div class="flex justify-between pt-4 border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Total
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ $this->total }}$
                                    </div>
                                </div>

                                <button
                                    class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none"
                                    wire:click="checkout" wire:loading.attr="disabled">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                    </svg>
                                    <span class="ml-2 mt-5px">Procceed to checkout</span>
                                </button>
                                <div wire:loading>Processing payment....</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
