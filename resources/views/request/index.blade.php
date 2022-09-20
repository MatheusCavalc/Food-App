<x-guest-layout>
<section class="mt-8 bg-white">
    <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Our Menu</h3>
    </div>

    @if (session('message'))
        <div class="mt-4 text-center">
            {{ session('message') }}
        </div>
    @endif

    @foreach ($categories as $category)
        <div class="mt-4 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500"> {{ $category->name }}</h2>
        </div>

        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                    @foreach ($menus as $menu)

                        @if ($menu->category == $category->name)
                            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                                <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
                                <div class="px-6 py-4">
                                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                        {{ $menu->name }}</h4>
                                    <p class="leading-normal text-gray-700">{{ $menu->description }}.</p>
                                </div>
                                <div class="flex items-center justify-between p-4">
                                    <span class="text-xl text-green-600">${{ $menu->price }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <span><input type="number" name="quantity" value="1" placeholder="1"></span>
                                        <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white" type="submit">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        @endif

                    @endforeach

            </div>
        </div>
    @endforeach

</section>
</x-guest-layout>
