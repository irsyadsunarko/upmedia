@include('template.start')

@include('template.navbar')
<section class="w-full min-h-screen bg-gray1">
    <div class="container mx-auto py-20 lg:px-10 px-5">
        @if(session('success'))
            <div class="border border-green-700 bg-green-300 text-green-700 px-3 py-2 rounded-lg text-sm mb-5">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="font-bold text-2xl mb-5 text-center"><i class="fa-solid fa-scroll"></i> Categories</h1>
        
        <a href="{{ route('addcategories') }}" class="bg-red-700 flex rounded-lg px-3 py-2 text-white cursor-pointer mb-5">+Tambah Category</a>
        
            @foreach($categories as $category)
            <a href="{{ route('editcategories', ['id' => $category->id]) }}" class=" bg-white block rounded-lg shadow-lg py-3 px-5 relative mb-3">
                {{$category->categories_name}}
            </a>
            @endforeach
        
    </div>
</section>

<script>

</script>
@include('template.end')