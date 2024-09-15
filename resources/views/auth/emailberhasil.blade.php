@include('template.start')

<div class="bg-red-700 min-w-screen min-h-screen flex justify-center items-center">
    <div class="p-5 bg-white rounded-lg shadow-lg text-center">
        <p class="font-bold text-lg mb-1">Email Berhasil Terkirim</p>
        <p class="text-sm mb-3">Silahkan klik link pada email anda untuk melakukan reset password</p>
        <div class="w-full bg-red-700 mt-2 text-center py-2 rounded-md"><a href="{{ route('login') }}" class="font-bold"><- Kembali</a></p>
        
        <p class="text-sm">Jika tidak mendapatkan email mohon untuk cek spam</p>
    </div>
</div>

@include('template.end')