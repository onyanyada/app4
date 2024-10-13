<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="block sm:hidden">みんなの単語</h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="bg-gray-100 max-w-7xl mx-auto">

    <!--右側エリア[START]-->
    <div class="right-area flex-1 text-gray-700 text-left px-4 py-2 m-2">
         <!-- 現在の本 -->
        @if (count($books) > 0)
            @foreach ($books as $book)
                <x-allcollection id="{{ $book->id }}">
                    {{ $book->item_name }}
                    <span class="book-open cursor-pointer"><i class="fa-solid fa-plus"></i></span>
                    <span class="book-close hidden cursor-pointer"><i class="fa-solid fa-minus"></i></span>
                        <div class="hidden book-detail">
                        {{ $book->item_detail}}
                        
                    </div>
                    
                </x-allcollection>
                
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]-->       
</div>

 <!--全エリア[END]-->


</x-app-layout>
