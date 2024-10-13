<x-app-layout>

    <!--ヘッダー[START]-->
    {{-- <x-slot name="header">
    </x-slot> --}}
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="bg-gray-100 max-w-7xl mx-auto">
    {{-- <div class="flex bg-gray-100"> --}}

        <!--左エリア[START]--> 
        <div class="left-area relative hidden text-gray-700 text-left px-4 py-4 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    単語
                </div>
                <span class="write-close cursor-pointer absolute top-8 right-8"><i class="fa-solid fa-xmark"></i></span>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('books') }}" method="POST" class="w-full">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       英語
                      </label>
                      <input name="item_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        日本語
                      </label>
                      <input name="item_detail" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                  </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">送信</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
    <!--右側エリア[START]-->
    <div class="right-area flex-1 text-gray-700 text-left px-4 py-2 m-2">
         <!-- 現在の本 -->
        @if (count($books) > 0)
            @foreach ($books as $book)
                <x-collection id="{{ $book->id }}">
                    {{ $book->item_name }}
                    <span class="book-open cursor-pointer"><i class="fa-solid fa-plus"></i></span>
                    <span class="book-close hidden cursor-pointer"><i class="fa-solid fa-minus"></i></span>
                        <div class="hidden book-detail">
                        {{ $book->item_detail}}
                        
                    </div>
                    
                </x-collection>
                
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]-->       
</div>

 <!--全エリア[END]-->
<button class="write-btn bg-gray-800 fixed bottom-4 right-4 rounded-full w-14 h-14">
    <i class="fa-solid fa-plus text-white"></i>
</button>

</x-app-layout>
