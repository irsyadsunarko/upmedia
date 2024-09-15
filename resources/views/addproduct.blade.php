@include('template.start')

@include('template.navbar')
<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-20 lg:px-10 px-5">
        @if(session('success'))
            <div class="border border-green-700 bg-green-300 text-green-700 px-3 py-2 rounded-lg text-sm mb-5">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="font-bold text-2xl mb-5 text-center"><i class="fa-solid fa-scroll"></i> Tambah Product</h1>
        <form action="{{ route('productstore') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <p class="absolute font-bold right-5 top-2 text-red-700 text-lg">*</p>
                    <input class="w-full font-bold text-lg focus:outline-none" type="text" id="product_name" name="product_name" placeholder="Judul Product" required><br>
                </div>
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <label for="product_picture" class="text-sm font-bold">Foto Product <span class="text-red-700">*</span></label><br>
                    <input id="product_picture" class="text-sm border border-black w-full rounded-lg py-1 px-2" type="file" name="product_picture" accept="image/*" required><br>
                </div>                
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <label for="product_description" class="text-sm font-bold">Deskripsi Product <span class="text-red-700">*</span></label><br>
                    <textarea rows="5" id="product_description" class="text-sm border border-black w-full rounded-lg py-1 px-2" name="product_description" required></textarea><br>
                </div>           
                <div class=" bg-white rounded-lg shadow-lg py-3 px-5 relative mb-3">
                    <label for="product_categories" class="text-sm font-bold">Kategori Product <span class="text-red-700">*</span></label><br>
                    <select id="product_categories" class="text-sm border border-black w-full rounded-lg py-1 px-2" name="product_categories" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categories_name}}</option>    
                        @endforeach
                    </select><br>
                </div>
                
            
            <input type="text" id="created_by" name="created_by" class="hidden" value="{{$user->email}}" readonly><br>
            <input class="w-full py-3 bg-red-700 text-white rounded-lg cursor-pointer hover:bg-red-600" type="submit" value="Tambah Product">
        </form>
    </div>
</section>

<script>

</script>
@include('template.end')