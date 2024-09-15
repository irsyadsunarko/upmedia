@include('template.start')

@include('template.navbar')

<div class="h-32 bg-red-700 flex flex-col justify-center items-left">
    <div class="relative flex justify-center container mx-auto px-10">
        <div class="flex items-center absolute -bottom-20 bg-white px-2 py-2 shadow-lg rounded-lg">
            <form id="searchForm" action="{{env('APP_URL')}}/products/search" method="GET">
                <i class="mr-3 fa-solid fa-magnifying-glass"></i>
                <input id="productSearch" type="text" class="w-full lg:w-80 focus:outline-none" placeholder="Set Top Box" value="{{$name}}">
                <button type="submit"><i class="fa-solid fa-arrow-right cursor-pointer"></i></button>
            </form>      
        </div>
    </div>
</div>
<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-10 px-5 lg:px-10">
        <h1 class="text-4xl font-bold text-center">Upmedia</h1>
        <h1 class="text-md text-center">List of our <span class="text-red-700 font-bold">Product!</span></h1>
    </div>
    <div class="container mx-auto py-2 px-5 lg:px-10">
        {{-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
            <a class="transition hover:scale-105 bg-white flex items-center rounded-2xl overflow-hidden shadow-lg" href="#">
                <div class="w-1/4 h-full relative">
                    <div class="absolute right-0 w-10 h-full bg-gradient-to-l from-white"></div>
                    <img class="object-cover w-full h-full" src="./image/resep/soto ayam.jpg" alt="gambar makanan">
                </div>
                <div class="px-5 py-5 w-3/4">
                    <h1 class="font-bold text-lg mb-3">Judul Resep</h1>
                    <h1 class="line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a enim tincidunt, dapibus dui quis, rutrum lorem. Quisque sollicitudin ligula at nibh finibus tempor. Proin cursus facilisis erat vel tristique. Fusce tempus blandit nulla, eu pulvinar felis posuere vel. Aliquam id velit accumsan nibh iaculis laoreet a sit amet nunc. Curabitur non turpis id velit viverra vulputate ac non enim. Sed feugiat ante sit amet sollicitudin euismod. Phasellus vel posuere justo. Maecenas in sem id augue placerat lacinia id malesuada turpis.</h1>
                    <div class="flex gap-7 mt-3">
                        <div>
                            <p class="font-bold">Porsi:</p>
                            <div class="flex">
                                <img class="w-5" src="./image/person.svg" alt="">
                                <img class="w-5" src="./image/person.svg" alt="">
                                <img class="w-5" src="./image/person.svg" alt="">
                            </div>
                        </div>
                        <div class="flex-auto">
                            <p class="font-bold">Waktu Masak:</p>
                            <p>100 Jam</p>
                        </div>
                        <div class="flex justify-end items-center">
                            <img class="w-5" src="./image/arrow.svg" alt="arrow">
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @foreach($products as $product)
            <a href="{{ route('singleproduct', ['id' => $product->id]) }}">
                    <div class="flex flex-col transition hover:scale-105 bg-white rounded-lg p-5 shadow-lg h-full">
                        <img class="shadow-md rounded-lg object-cover w-full h-36 mb-5" src="{{asset('storage/product/'.$product->product_picture)}}" alt="">
                        <h1 class="font-bold capitalize">{{ $product->product_name }} </h1>
                        <div class="flex mt-3 items-center gap-1">
                            @if($product->user)
                                @if($product->user->profile_pic == "")
                                <img class="object-cover w-6 h-6 rounded-full" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
                                @else
                                    <img src="{{ asset('storage/profile_pic/'.$product->user->profile_pic ) }}" class="object-cover w-6 h-6 rounded-full">
                                @endif
                                
                                <p class="ml-1 text-sm">
                                    {{ $product->user->name }}
                                    @if($product->user->verification == "yes")
                                    <span>
                                        <img src="{{asset('image/checklist.svg')}}" class="inline-block ml-1 w-3 h-3 object-cover">
                                    </span>
                                    @endif
                                </p>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @if($currentPage)
        <div class="py-10 flex justify-center items-center font-bold text-red-700 text-xs lg:text-md">
            <div class="flex">
                @if($currentPage > 1)
                    <div data-page="1" class="cursor-pointer w-10 h-10 flex justify-center items-center rounded-full hover:bg-red-700 hover:text-white transition ease-in-out">
                        <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                    </div>
                @endif
                @for($i = $startPage; $i <= $endPage; $i++)
                    @if($i == $currentPage)
                        <div class="w-10 h-10 flex justify-center items-center bg-red-700 rounded-full text-white">{{ $i }}</div>
                    @else
                        <div data-page="{{$i}}" class="cursor-pointer w-10 h-10 flex justify-center items-center rounded-full hover:bg-red-700 hover:text-white transition ease-in-out">{{ $i }}</div>
                    @endif
                @endfor
                @if($currentPage < $totalPages)
                    <div data-page="{{ $totalPages }}" class="cursor-pointer w-10 h-10 flex justify-center items-center rounded-full hover:bg-red-700 hover:text-white transition ease-in-out">
                        <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>
@if($currentPage)
<script>
    $(document).ready(function() {
    $('.flex[data-page]').click(function() {
        var page = $(this).data('page');
        window.location.href = '{{env('APP_URL')}}/products/' + page;
    });

    $('.fa-chevron-left').click(function() {
        var page = Math.max(1, {{ $currentPage }} - 5);
        window.location.href = '{{env('APP_URL')}}/products/' + page;
    });

    $('.fa-chevron-right').click(function() {
        var page = Math.min({{ $totalPages }}, {{ $currentPage }} + 5);
        window.location.href = '{{env('APP_URL')}}/products/' + page;
    });
});
</script>
@endif

<script>
    $(document).ready(function() {
        $('.fa-arrow-right').on('click', function() {
            var searchQuery = $('#productSearch').val(); // Ambil nilai dari input pencarian
            window.location.href = '{{env('APP_URL')}}/products/search/' + searchQuery; // Pindah ke halaman pencarian
        });
    });
    $('#searchForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah form submit langsung

        var searchQuery = $('#productSearch').val();
        window.location.href = '{{env('APP_URL')}}/products/search/' + searchQuery;
    });

</script>
@include('template.end')