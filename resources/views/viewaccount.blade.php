@include('template.start')

@include('template.navbar')

<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-20 px-5 lg:px-10 grid grid-cols-1 lg:grid-cols-4 gap-5">
        <div class="cols-span-1 p-5 ">
            <div class="relative flex justify-center items-center">
                @if($userview->profile_pic == "")
                <img class="object-cover w-44 h-44 rounded-full mb-4 shadow-lg" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
                @else
                <img class="object-cover w-44 h-44 rounded-full mb-4 shadow-lg" src="{{ asset('storage/profile_pic/' . $userview->profile_pic) }}" alt="Foto Profil">
                @endif
            </div>
            
            <p class="font-bold text-lg">
                {{$userview->name}}
                @if($userview->verification == "yes")
                <span>
                    <img src="{{asset('image/checklist.svg')}}" class="inline-block ml-1 w-3 h-3 object-cover">
                </span>
                @endif
            </p>
            <p class="mb-5"><span>@</span>{{$userview->username}}</p>
        </div>
        <div class="lg:col-span-3 bg-white rounded-lg p-5 shadow-lg">
            <h1 class="font-bold text-lg mb-3">Product yang dibuat ({{ count($products) }})</h1>
            @if (!$products->isEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-3">
                @foreach($products as $product)
                    <a href="{{ route('singleproduct', ['id' => $product->id]) }}">
                        <div class="transition hover:scale-105 bg-white rounded-lg p-5 shadow-lg h-full">
                            <img class="shadow-md rounded-lg object-cover w-full h-36 mb-5" src="{{asset('storage/product/'.$product->product_picture)}}" alt="">
                            <h1 class="font-bold capitalize">{{ $product->product_name }} </h1>
                        </div>
                    </a>
                @endforeach
            </div>
            @else
            <div class="border-2 border-dashed border-gray-300 bg-gray-100 rounded-lg h-60 mb-2 flex justify-center items-center">
                <h1>Belum ada resep yang dibuat</h1>
            </div>
            @endif
        </div>
    </div>
</section>

<script>
    document.getElementById('profile_pic').addEventListener('change', function() {
        document.getElementById('profile_pic_form').submit();
    });
</script>

<script>
    $(document).ready(function(){
        $("#edit-profil-form-div").hide(); // Sembunyikan form saat halaman dimuat

        $(".edit-profil-button").click(function(){
            $("#edit-profil-form-div").show(); // Tampilkan form saat tombol "Edit Profil" diklik
            $(this).hide(); // Sembunyikan tombol "Edit Profil"
            $("#sign-out-button").hide(); // Sembunyikan tombol "Edit Profil"
        });

        $(".edit-profil-cancel-button").click(function(){
            $("#edit-profil-form-div").hide();
            $(".edit-profil-button").show();
            $("#sign-out-button").show(); 
        });
    });
</script>


@include('template.end')