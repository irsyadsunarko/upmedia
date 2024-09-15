@include('template.start')

@include('template.navbar')
<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-20 lg:px-10 px-5">
        @if(session('success'))
            <div class="border border-green-700 bg-green-300 text-green-700 px-3 py-2 rounded-lg text-sm mb-5">
                {{ session('success') }}
            </div>
        @endif
        
        <a class="font-bold text-sm" href="{{ route('categories') }}"><- Kembali</a>
        <h1 class="font-bold text-2xl mb-5 text-center"><i class="fa-solid fa-scroll"></i> Tambah Categories</h1>
        <form action="{{ route('categoriesstore') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <p class="absolute font-bold right-5 top-2 text-red-700 text-lg">*</p>
                    <input class="w-full font-bold text-lg focus:outline-none" type="text" id="categories_name" name="categories_name" placeholder="Judul Category" required><br>
                </div>
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <label for="categories_image" class="text-sm font-bold">Icon Categories <span class="text-red-700">*</span></label><br>
                    <input id="categories_image" class="text-sm border border-black w-full rounded-lg py-1 px-2" type="file" name="categories_image" accept="image/*" required><br>
                </div>
            <input class="w-full py-3 bg-red-700 text-white rounded-lg cursor-pointer hover:bg-red-600" type="submit" value="Tambah Category">
        </form>
    </div>
</section>

<script>

</script>
@include('template.end')