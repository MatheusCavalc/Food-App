<div class="container mx-auto px-4">

        <div class="flex justify-end m-2 p-2s">
            <a wire:click="deleteCart" href="#">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Remove all</button>
            </a>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Menu name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Quantity
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Size
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $cart)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cart->name}}
                    </th>
                    <td class="py-4 px-6">
                        {{$cart->qty}}
                    </td>
                    <td class="py-4 px-6">
                        {{$cart->options->size}}
                    </td>
                    <td class="py-4 px-6">
                        {{$cart->price}}
                    </td>
                    <td class="py-4 px-6">
                        <a wire:click="removeToCart('{{$cart->rowId}}')" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" href="#">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $total }}
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" wire:model="address" value="{{ $address }}">
            @error('address') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="text" wire:model="phone" value="{{ $phone }}">
            @error('phone') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="items-baseline mt-4">
            <a wire:click="endCart" href="#">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buy</button>
            </a>
        </div>

</div>
