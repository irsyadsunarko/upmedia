@include('template.start')

<div class="bg-red-700 min-w-screen min-h-screen flex justify-center items-center">
    <div class="p-5 bg-white rounded-lg shadow-lg text-center">
        <p class="font-bold text-lg mb-1">Masukkan kode OTP</p>
        <p class="text-sm mb-3">Kode OTP dikirim melalui email yang anda daftarkan</p>
        <form action="{{env('APP_URL')}}/verify_otp" method="POST">
            @csrf
            <input class="hidden" type="text" name="id" value="{{ $userId }}" readonly>
            <input class="py-1 px-2 mb-2 border-2 border-black rounded-lg" type="text" maxlength="6" size="2" name="otp_code"><br>
            <input class="mb-3 rounded-lg bg-red-700 shadow-lg text-white px-2 py-1 cursor-pointer" type="submit" value="Konfirmasi"><br>
        </form>        
        
        <p class="text-sm">Jika tidak mendapatkan email mohon untuk cek spam</p>
    </div>
</div>

@include('template.end')