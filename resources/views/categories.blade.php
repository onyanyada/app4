<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="block sm:hidden">カテゴリ</h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
<!--全エリア[START]-->
<div class="bg-gray-100 max-w-7xl mx-auto">
    <!--左エリア[START]--> 
    <div class="left-area text-gray-700 text-left px-4 py-4 m-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-500 font-bold">
                カテゴリ
            </div>
        </div>      
        <!-- カテゴリ追加フォーム -->
        <form action="{{ route('category_store') }}" method="POST" class="w-full">
            @csrf
            <div class="flex flex-col px-2 py-2">
                <!-- カラム１ -->
                <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    カテゴリ名
                    </label>
                    <input name="name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">追加</x-button>
                      </div>
                   </div>
        </form>
    </div>
    <!-- カテゴリ一覧 -->
    <div class="right-area flex-1 text-gray-700 text-left px-4 py-2 m-2">
    <table>
        @if (count($categories) > 0)
            @foreach ($categories as $category)
                <tr id="{{ $category->id }}" class="">
                    <td>{{ $category->name }}</td>
                    <td class="btn-group">
                        <!-- 編集リンク -->
                        <a href="{{ route('category_edit', $category->id) }}" class="btn btn-sm btn-warning">編集</a>
                    </td>
                    <td>
                        <!-- 削除フォーム -->
                        <form action="{{ route('category_destroy', $category->id) }}" method="POST" action="/category" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
</x-app-layout>
