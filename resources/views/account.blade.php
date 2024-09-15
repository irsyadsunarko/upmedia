@include('template.start')

@include('template.navbar')

<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-20 px-5 lg:px-10 grid grid-cols-1 lg:grid-cols-4 gap-5">
        <div class="cols-span-1 p-5 ">
            <div class="relative flex justify-center items-center">
                @if($user->profile_pic == "")
                <img class="object-cover w-44 h-44 rounded-full mb-4 shadow-lg" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
                @else
                <img class="object-cover w-44 h-44 rounded-full mb-4 shadow-lg" src="{{ asset('storage/profile_pic/' . $user->profile_pic) }}" alt="Foto Profil">
                @endif
                <div class="absolute bottom-10 right-10">
                    <form id="profile_pic_form" action="{{ route('upload.profile.pic') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label title="Ganti Foto Profil" for="profile_pic" class="flex justify-center items-center text-white w-8 h-8 bg-red-700 cursor-pointer m-0 rounded-lg">
                            <input id="profile_pic" class="w-full h-full hidden" type="file" name="profile_pic" accept="image/*">
                            <i class="fa-solid fa-edit"></i>
                        </label>
                    </form>
                </div>
            </div>
            
            <p class="font-bold text-lg">
                {{$user->name}}
                @if($user->verification == "yes")
                <span>
                    <img src="{{asset('image/checklist.svg')}}" class="inline-block ml-1 w-3 h-3 object-cover">
                </span>
                @endif
            </p>
            <p class="mb-5"><span>@</span>{{$user->username}}</p>

            <div id="edit-profil-form-div" class="mb-5">
                <form action="{{ route('update.profile') }}" method="POST">
                    @csrf
                    <label for="name" class="font-bold text-sm">Nama</label>
                    <input class="text-sm bg-transparent py-1 px-2 border border-black rounded-lg mb-2 w-full" type="text" name="name" id="name" value="{{$user->name}}">
                    <label for="username" class="font-bold text-sm">Nama Akun</label>
                    <input class="text-sm bg-gray-300 cursor-not-allowed py-1 px-2 border border-black rounded-lg mb-2 w-full" type="text" name="username" id="usernname" value="{{$user->username}}" readonly>
                    <label for="email" class="font-bold text-sm">Email</label>
                    <input class="text-sm bg-gray-300 cursor-not-allowed py-1 px-2 border border-black rounded-lg mb-2 w-full" type="text" name="email" id="email" value="{{$user->email}}" readonly>
                    <input type="submit" value="Simpan Perubahan" class="my-3 cursor-pointer hover:bg-red-500 text-sm text-white w-full py-2 px-2 text-center bg-red-700 border border-red-700 rounded-lg">
                    <div class="cursor-pointer text-sm text-red-700 w-full py-2 px-2 text-center border border-red-700 rounded-lg edit-profil-cancel-button">
                        Batal
                    </div>
                </form>
            </div>
            
            <div class="cursor-pointer hover:bg-red-500 text-sm text-white w-full py-2 px-2 text-center bg-red-700 border border-red-700 rounded-lg edit-profil-button">
                Edit Profil
            </div>
            
            <a id="sign-out-button" href="{{ route('signout') }}" class="block mt-2">
                <div class="text-sm text-red-700 w-full py-2 px-2 text-center border border-red-700 rounded-lg">
                    Sign Out
                </div>
            </a>
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
                            {{-- <p class="line-clamp-4 text-sm"></p> --}}
                            <div class="flex gap-7 mt-3">
                                <div class="flex justify-end items-center">
                                    <img class="w-5" src="{{ asset('image/arrow.svg') }}" alt="arrow">
                                </div>
                            </div>
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