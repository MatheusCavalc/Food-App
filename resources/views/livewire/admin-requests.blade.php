<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href=""
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Category</a>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Identifier
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Content
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Status
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $request->identifier }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$request->content}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $request->status }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                <button wire:click="toProduction({{ $request->id }})" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Para producao</button>
                                                <button wire:click="toDispatch({{ $request->id }})" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Para envio</button>
                                            </div>
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
