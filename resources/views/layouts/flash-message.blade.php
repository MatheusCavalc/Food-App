<div class="fixed z-50 bottom-5 right-24">

    @if (session()->has('success'))
        <div class="flex p-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif


    @if (session()->has('error'))
        <div class="flex p-4 text-sm text-red-700 bg-red-100 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

</div>
