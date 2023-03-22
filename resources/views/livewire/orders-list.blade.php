<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Menus Details
                                        </th>
                                        <th scope="col" class="py-3 px-2">
                                            Status Shipping
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Total Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <a href="{{ route('admin.order.details', $order->id) }}"
                                                    class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">
                                                    Order Details
                                                </a>
                                            </th>
                                            <td class="py-4 px-2">
                                                {{ $order->status }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $order->total_price }}
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
