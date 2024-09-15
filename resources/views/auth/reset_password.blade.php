@include('template.start')

<div class="bg-[#d63838]  py-5 px-0 w-full min-h-screen flex justify-center items-center">
    <div class="lg:min-h-[33rem] min-h-[35rem] bg-white flex rounded-xl overflow-hidden lg:shadow-2xl">
        <div class="hidden lg:block kiri bg-black h-auto relative">
            <div class="object-cover absolute w-full h-full bg-black opacity-50"></div>
            <img src="{{env('APP_URL')}}/image/STB.svg" alt="food" class="object-cover w-full h-full">
        </div>
        <div class="kanan py-10 px-5 lg:px-20 w-[32rem] flex items-center relative">
            <img class="absolute top-3 left-3 w-16 lg:block hidden" src="{{env('APP_URL')}}/image/logo-upmedia/logo-upmedia.svg" alt="Logo Upmedia">
            <div class="w-full">
                <div class="mb-5 hidden lg:block">
                    <h1 class="font-bold text-2xl">Silahkan Reset Password Anda</h1>
                </div>

                <div class="flex justify-center items-center flex-col lg:hidden mb-5 text-center">
                    <img class="w-20" src="{{env('APP_URL')}}/image/logo-upmedia/logo-upmedia.svg" alt="Logo Dapin">
                    <h1 class="font-bold text-2xl">Silahkan Reset Password Anda</h1>
                </div>
                
                <form method="POST" action="{{ route('resetPasswordStore') }}">
                    @csrf
                    <input class="w-full border-2 rounded-lg px-3 py-2 border-black mt-3" type="password" name="password" id="password" placeholder="Kata Sandi" required><br>
                    <input class="w-full border-2 rounded-lg px-3 py-2 border-black mt-3" type="password" name="confirmpassword" id="confirmpassword" placeholder="Konfirmasi Kata Sandi" required><br>
                    <input class="w-full border-2 rounded-lg px-3 py-2 border-black" type="hidden" name="email" id="email" placeholder="Email" value="{{$user->email}}" required><br>
                    <p id="password-success" class="text-green-500 text-sm"></p>
                    <br>
                    <button class="bg-black text-center p-3 rounded-lg text-white w-full hover:bg-transparent hover:text-black border-2 border-black" type="submit">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#confirmpassword').on('input', function () {
            const password = $('#password').val();
            const confirmPassword = $(this).val();
            const passwordSuccess = $('#password-success');

            if (password !== confirmPassword) {
                passwordSuccess.text('');
            } else {
                passwordSuccess.text('Konfirmasi Kata Sandi cocok');
            }
        });
    });

    $(document).ready(function(){
        $('#username').on('input', function(){
            var inputValue = $(this).val();
            var alphanumericOnly = inputValue.replace(/[^a-zA-Z0-9]/g, '');
            $(this).val(alphanumericOnly);

            if (inputValue !== alphanumericOnly) {
                $('#username-error').text('Hanya angka dan huruf yang diizinkan, simbol dan spasi tidak diperbolehkan.');
            } else {
                $('#username-error').text('');
            }
        });
    });

</script>

@include('template.end')