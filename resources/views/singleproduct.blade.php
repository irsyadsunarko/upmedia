@include('template.start')

@include('template.navbar')

<section class="bg-gray1 min-h-screen w-full pt-20 px-5 lg:px-0 pb-10 flex justify-center items-center">
    <div class="w-full lg:w-4/5 bg-white rounded-lg shadow-lg p-5 flex gap-5">
        <div class="w-2/3">
            <a class="font-bold text-sm" href="{{ route('home') }}"><- Kembali</a>
            <img class="mt-2 mb-5 w-full h-64 object-cover rounded-lg shadow-lg" src="{{asset('storage/product/'.$product->product_picture)}}" alt="">
            @if($product->user->id == $user->id)
            <div class="flex gap-2">
                <a href="{{ route('editproduct', ['id' => $product->id]) }}" class="bg-yellow-400 rounded-lg px-3 py-2 cursor-pointer">Edit Product</a>
                <a href="{{ route('deleteproduct', ['id' => $product->id]) }}" class="bg-red-700 rounded-lg px-3 py-2 text-white cursor-pointer">Hapus Product</a>
            </div>
            @endif
            <p class="text-center font-bold text-2xl mb-3 capitalize">{{ $product->product_name }}</p>
            <p class="text-md mb-1 font-bold">Deskripsi Product :</p>
            <p class="text-md mb-3">{{ $product->product_description }}</p>
            <p class="text-md mb-1 font-bold">Category Product :</p>
            <p class="text-md mb-3">{{ $categories->categories_name }}</p>
        </div>
        <div class="border-s-2 border-red-700 pl-5 w-1/3">
            <div>
                <a href="{{ route('accountusername', ['username' => $product->user->username]) }}" class="flex mb-3 items-center gap-2">
                    @if($product->user)
                        @if($product->user->profile_pic == "")
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
                        @else
                        <img src="{{ asset('storage/profile_pic/'.$product->user->profile_pic ) }}" class="object-cover w-6 h-6 rounded-full">
                        @endif
                        <div>
                            <p class="text-xs"><b>{{ $product->user->name }}</b>
                                @if($product->user->verification == "yes")
                                <span>
                                    <img src="{{asset('image/checklist.svg')}}" class="inline-block w-3 h-3 object-cover">
                                </span>
                                @endif
                            </p>
                            <p class="text-xs">{{$product->created_at}}</p>
                        </div>
                    @endif
                </a>
            </div>
            <div class="w-full">
                <form id="commentForm" method="post" action="{{url("/submitcomment")}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <textarea name="comment" class="w-full border border-black rounded-lg p-2 text-sm" placeholder="Masukkan Komentar Disini" required></textarea>
                    <button type="submit" class="text-xs btn btn-primary mt-1 bg-red-700 rounded-lg px-2 py-2 text-white comment-submit">Kirim Komentar</button>
                </form>
                <div class="all_comments py-5">
                    @foreach($comments as $comments)
                        <div class="flex gap-2 mb-2">
                            <div>
                                @if($comments->profile_pic == "")
                                <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('image/No-picture.jpg') }}" alt="Foto Profil">
                                @else
                                <img src="{{ asset('storage/profile_pic/'.$comments->profile_pic ) }}" class="object-cover w-6 h-6 rounded-full">
                                @endif
                            </div>
                            <div class="text-xs">
                                <p><b>{{$comments->name}}</b></p>
                                <p>{{$comments->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>                       
        </div>
    </div>
</section>


@include('template.end')