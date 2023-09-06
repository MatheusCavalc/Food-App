<div>
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
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
                        @foreach ($order->menus as $item)
                            <tr>
                                <td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                        <img src="{{ Storage::url($item['image']) }}" class="w-20 rounded"
                                            alt="Thumbnail" />
                                    </a>
                                </td>
                                <td>
                                    <p class="mb-2">{{ $item['name'] }}</p>
                                </td>
                                <td class="justify-center md:justify-end md:flex mt-4">
                                    <div class="w-20 h-10">
                                        <div class="custom-number-input h-10 w-32">
                                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent">
                                                <span class="pt-1.5 px-2">{{ $item['qty'] }}</span>
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

                <div class="mt-3">
                    <p>ADDRES: {{ $order->address }}</p>
                    <p>PHONE: {{ $order->phone }}</p>
                </div>

                <div class="mt-6">
                    <p>PAYMENT METHOD: {{ $order->payment_method }}</p>
                </div>

                <div class="mt-6">
                    <p>Order Placed {{ $order->created_at->diffForHumans() }}</p>
                    <p>Status Shipping: {{ $order->status }}</p>
                </div>

                <div class="flex mt-6">
                    @if ($order->status == null)
                        <button wire:click.prevent="received({{ $order->id }})"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Received
                        </button>
                    @elseif ($order->status == 'Received')
                        <button wire:click.prevent="toProduction({{ $order->id }})"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            To Production
                        </button>
                    @elseif ($order->status == 'Production')
                        <button wire:click.prevent="toDelivery({{ $order->id }})"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            To Delivery
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
