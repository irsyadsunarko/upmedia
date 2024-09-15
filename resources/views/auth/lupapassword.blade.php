@include('template.start')

<div class="bg-red-700 min-w-screen min-h-screen flex justify-center items-center">
    <div class="p-5 bg-white rounded-lg shadow-lg text-center">
        <p class="text-left mb-2"><a href="{{ route('login') }}" class="text-red-700 hover:text-red-500 font-bold"><- Kembali</a></p>
        <p class="font-bold text-lg mb-1">Masukkan Email anda</p>
        <p class="text-sm mb-3">Link Reset Password dikirim melalui email yang anda daftarkan</p>
        <form action="{{env('APP_URL')}}/verify_email" method="POST">
            @csrf
            <input class="w-full border-2 rounded-lg px-3 py-2 border-black mb-3" type="email" name="email" id="email" placeholder="Email" required><br>
            <input class="mb-3 rounded-lg bg-red-700 shadow-lg text-white px-2 py-1 cursor-pointer" type="submit" value="Kirim Email"><br>
        </form>        
        
        <p class="text-sm">Jika tidak mendapatkan email mohon untuk cek spam</p>
    </div>
</div>

@include('template.end')