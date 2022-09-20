<div class="container mx-auto px-4">

    <div class="items-baseline mt-4">
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
                    {{$cart->options->has('size')}}
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



<div class="mt-6">
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm px-auto">

        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                    <div class="mt-1">
                        <input type="text" id="name" name="name"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                    </div>
                    @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                <div class="sm:col-span-6">
                    <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                    </div>
                    @error('image')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="sm:col-span-6 pt-5">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                        <textarea id="description" rows="3" name="description"
                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror"></textarea>
                    </div>
                    @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 p-4">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                </div>
            </form>

    </div>
</div>



</div>

