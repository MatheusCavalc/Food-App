<section class="mt-8 bg-white">
    <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Our Menu</h3>
    </div>

    @include('layouts.flash-message')

    @foreach ($categories as $category)
        <div class="mt-4 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                {{ $category->name }}</h2>
        </div>

        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-2 lg:gap-x-4 gap-y-5">
                @foreach ($menus as $menu)
                    @if ($menu->category == $category->name)
                        <div
                            class="relative flex flex-row items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl">
                            <div class="flex flex-col justify-between w-7/12 p-4 leading-normal">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl">
                                    {{ $menu->name }}
                                </h5>
                                <p class="mb-3 font-normal text-right text-red-700 lg:text-lg">R${{ $menu->price }}</p>
                                <div>
                                    <button wire:click.prevent="addToCart({{ $menu->id }}, 1)"
                                        class="flex items-center justify-center w-full rounded-md bg-green-500 hover:bg-green-700 px-5 py-2.5 text-center text-sm lg:font-medium text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Adicionar ao carrinho
                                    </button>
                                </div>
                            </div>

                            <div class="relative w-5/12">
                                <img class="object-cover w-full rounded-none rounded-r-lg h-52 lg:h-64"
                                    src="{{ Storage::url($menu->image) }}" :alt="{{ $menu->name }}">
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    @endforeach

</section>
