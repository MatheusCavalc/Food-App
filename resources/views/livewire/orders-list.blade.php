<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Menu name/Size
                                        </th>
                                        <th scope="col" class="py-3 px-2">
                                            Quantity
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Phone
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Address
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->menu->name }} / {{ $order->menu->size }}
                                            </th>
                                            <td class="py-4 px-2">
                                                {{ $order->quantity }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $order->phone }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $order->address }}
                                            </td>
                                            <td class="py-4 px-6">
                                                @if ($order->status_delivery == 'Recebido')
                                                    <button wire:click="toProduction({{ $order->user_id }})" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Para producao</button>
                                                @elseif ($order->status_delivery == 'Producao')
                                                    <button wire:click="toDelivery({{ $order->user_id }})" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Para envio</button>
                                                @else
                                                    Entregue
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
