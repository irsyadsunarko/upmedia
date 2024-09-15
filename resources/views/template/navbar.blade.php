<div id="navbar-desktop" class="hidden lg:block shadow-lg z-[100] fixed w-full bg-red-700 text-white rounded-b-lg">
    <div class="container py-2 px-10 mx-auto flex items-center gap-x-5">
        <div class="flex-auto">
            <a class="block w-20" href="{{ route('home') }}">
                <img class="w-full" src="{{ asset('image/logo-upmedia/logo-upmedia.svg') }}" alt="logo upmedia">
            </a>
        </div>
        <a class="text-sm" href="{{ route('home') }}">Halaman Utama</a>
        <a class="text-sm" href="{{ route('categories') }}">Kategori Produk</a>
        <a href="{{ route('addproduct') }}" class="text-sm bg-white py-1 px-3 rounded-lg text-red-700 border-2 border-white hover:bg-transparent hover:text-white"><i class="fa-solid fa-plus"></i> Tambah Product</a>
        
        <a href="{{ route('account') }}" class="ml-3">
            @if($user->profile_pic == "")
            <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
            @else
            <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('storage/profile_pic/' . $user->profile_pic) }}" alt="Foto Profil">
            @endif
        </a>
    </div>
</div>
<div id="navbar-mobile" class="block lg:hidden shadow-lg z-[100] fixed w-full bg-red-700 text-white rounded-b-lg">
    <div class="container py-2 px-2 mx-auto flex items-center gap-x-5">
        <div class="flex-auto">
            <a class="block w-20" href="{{ route('home') }}">
                <img class="w-full" src="{{ asset('image/logo-upmedia/logo-upmedia.svg') }}" alt="logo upmedia">
            </a>
        </div>
        <div>
            <img id="navbar-icon-popout" class="w-6 h-6 object-contain" src="{{ asset('image/rectangle.svg') }}">
        </div>
    </div>
</div>
<div id="navbar-popout" class="fixed w-full h-full pt-14 px-2 z-[99]">
    <div id="navbar-bg-black-opacity" class="absolute top-0 left-0 bg-black w-full h-full opacity-50 z-0"></div>
    <div class="relative w-full bg-white p-4 z-10 rounded-lg flex flex-col gap-4">
        <a href="{{ route('account') }}" class="flex items-center">
            @if($user->profile_pic == "")
            <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
            @else
            <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('storage/profile_pic/' . $user->profile_pic) }}" alt="Foto Profil">
            @endif
            <div class="ml-2">
                <p class="text-xs font-bold">{{$user->name}}</p>
                <p class="text-xs"><span>@</span>{{$user->username}}</p>
            </div>
        </a>
        <a class="block text-sm" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Halaman Utama</a>
        <a class="block text-sm" href="{{ route('categories') }}"><i class="fa-solid fa-house"></i> Kategori Produk</a>
        <a href="{{ route('addproduct') }}" class="block text-sm"><i class="fa-solid fa-scroll"></i> Buat Resep</a>
        <a id="sign-out-button" href="{{ route('signout') }}" class="block mt-2">
            <div class="text-sm text-red-700 w-full py-2 px-2 text-center border border-red-700 rounded-lg">
                Sign Out
            </div>
        </a>
    </div>
</div>

<script>
$(document).ready(function() {
    // Sembunyikan navbar-popout dan navbar-bg-black-opacity saat halaman dimuat
    $('#navbar-popout, #navbar-bg-black-opacity').hide();

    // Ketika navbar-icon-popout diklik
    $('#navbar-icon-popout').click(function() {
        // Toggle tampilan navbar-popout dan navbar-bg-black-opacity
        $('#navbar-popout, #navbar-bg-black-opacity').toggle();
    });

    // Ketika navbar-bg-black-opacity diklik
    $('#navbar-bg-black-opacity').click(function() {
        // Sembunyikan navbar-popout dan navbar-bg-black-opacity
        $('#navbar-popout, #navbar-bg-black-opacity').hide();
    });
});


</script>