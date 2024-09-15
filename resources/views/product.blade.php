@include('template.start')

@include('template.navbar')
<style>
    .inventory_items{
        border: 2px solid red;
    }
    .selected_items{
        background-color: white;
        color: red;
        font-weight: bold;
    }
</style>
<section class="relative">
    <div class="mx-auto container py-20 px-10">
        <h1 class="font-bold text-xl mb-5">Tambah Inventori Dapur Anda</h1>
        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Sayuran</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/sayuran.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($sayuran as $sayuran)
                    <div idval="{{$sayuran->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$sayuran->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$sayuran->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Bumbu</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/bumbu.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($bumbu as $bumbu)
                    <div idval="{{$bumbu->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$bumbu->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$bumbu->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Lauk</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/lauk.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($lauk as $lauk)
                    <div idval="{{$lauk->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$lauk->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$lauk->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Saus</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/saus.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($saus as $saus)
                    <div idval="{{$saus->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$saus->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$saus->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Tepung</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/tepung.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($tepung as $tepung)
                    <div idval="{{$tepung->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$tepung->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$tepung->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Kacang</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/kacang.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($kacang as $kacang)
                    <div idval="{{$kacang->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$kacang->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$kacang->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Minyak</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/minyak.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($minyak as $minyak)
                    <div idval="{{$minyak->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$minyak->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$minyak->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <div class="flex items-center mb-5">
                <h1 class="font-bold text-lg">Lainnya</h1>
                <img class="ml-3 w-8 h-8" src="./image/inventory-type/lainnya.png">
            </div>
            <div class="grid grid-cols-5 gap-5">
                @foreach($lainnya as $lainnya)
                    <div idval="{{$lainnya->id}}" class="inventory_items py-7 px-3 flex justify-center items-center relative bg-red-700 text-white rounded-lg shadow-lg cursor-pointer">
                        <p>{{$lainnya->product_name}}</p>
                        <p class="absolute right-2 bottom-1">{{$lainnya->product_unit}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="fixed w-full bottom-0 bg-red-700 shadow-lg py-7 px-3">
        <div class="w-full relative">
            <div id="submit_button" class="cursor-pointer bg-red-200 w-20 h-20 rounded-lg p-2 absolute -top-10 right-5 shadow-lg">
                <img class="w-full h-full" src="./image/foodbasket.png">
            </div>
            <h1 class="text-white">Masukkan Ke Keranjang</h1>
        </div>
    </div>

    <div class="success-pop w-full fixed inset-y-1/2 flex justify-center items-center">
        <div class="bg-green-700 p-3 rounded-lg text-white">Success !</div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(".success-pop").hide();
        $(".inventory_items").click(function(){
            $(this).toggleClass("selected_items");
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#submit_button").click(function(){
            var selectedItems = $(".selected_items").map(function(){
                return {
                    id: $(this).data("id"),
                    name: $(this).find('p:first').text() // Mengambil teks dari elemen pertama di dalam selected item
                };
            }).get();

            $.ajax({
                url: "/store_inventory",
                type: "POST",
                data: {
                    selected_items: selectedItems
                },
                success: function(response){
                    // Tampilkan popup sukses
                    $(".success-pop").fadeIn();

                    // Sembunyikan dalam setengah detik
                    setTimeout(function(){
                        $(".success-pop").fadeOut();
                    }, 800);
                }
            });
        });
    });
</script>

@include('template.end')