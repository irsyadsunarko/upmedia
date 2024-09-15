@include('template.start')

<div class="bg-[#d63838] w-full px-0 min-h-screen flex justify-center items-center">
    <div class="lg:min-h-[33rem] bg-white min-h-[35rem] flex rounded-xl overflow-hidden">
        <div class="kiri py-10 px-5 lg:px-20 w-[32rem] flex items-center relative">
            <img class="object-cover absolute top-3 left-3 w-16 hidden lg:block" src="./image/logo-upmedia/logo-upmedia.svg" alt="Logo Upmedia">
            <div class="w-full">
                <div class="mb-5 hidden lg:block">
                    <h1 class="font-bold text-5xl lg:text-7xl text-center">Haloo!</h1>
                    <h1 class="text-sm text-center">Selamat datang di Upmedia.</h1>
                </div>
                <div class="mb-5 flex flex-col justify-center items-center lg:hidden text-center">
                    <img class="w-28" src="./image/logo-upmedia/logo-upmedia.svg" alt="Logo Upmedia">
                </div>
                
                @if(session('success'))
                    <div class="border border-green-700 bg-green-300 text-green-700 px-3 py-2 rounded-lg text-sm mb-5">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="border border-red-700 bg-red-300 text-red-700 px-3 py-2 rounded-lg text-sm mb-5">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('logindatabase') }}">
                    @csrf
                    <input class="w-full border-2 rounded-lg px-3 py-2 border-black mb-3" type="email" name="email" id="email" placeholder="Email" required><br>
                    <input class="w-full border-2 rounded-lg px-3 py-2 border-black mb-0" type="password" name="password" id="password" placeholder="Kata Sandi" required><br>
                    
                    <p class="mb-2"><a href="{{ route('lupaPassword') }}" class="text-red-700 font-bold hover:text-red-500">Lupa Password? </a></p>
                    {{-- <p class="text-right mb-5"><a href="#" class="text-red-700 font-bold hover:text-red-500">Lupa Kata Sandi?</a></p> --}}
                    <button class="bg-black text-center p-3 rounded-lg text-white w-full hover:bg-transparent hover:text-black border-2 border-black" type="submit">Masuk</button>
                </form>
            
                <p class="text-center mt-2">Belum punya akun? <a href="{{ route('register') }}" class="text-red-700 font-bold hover:text-red-500">Daftar</a></p>
            </div>
        </div>
        <div class="hidden lg:block kanan bg-black w-96 h-auto relative">
            <div class="absolute w-full h-full bg-black opacity-50"></div>
            <img src="./image/STB.svg" alt="STB" class="object-cover w-full h-full">
        </div>
    </div>
</div>

@include('template.end')