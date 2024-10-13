 <!-- 本: 削除ボタン -->
<div class="flex justify-between p-4 items-center bg-blue-500 text-white rounded-lg border-2 border-white">
  <div>{{ $slot }}</div>
  
    <div class="flex space-x-8 justify-end">
      <div>
        <form action="{{ url('booksedit/'.$id) }}" method="POST">
          @csrf

          <button type="submit"  class="btn bg-blue-500 rounded-lg">
              <i class="fa-regular fa-pen-to-square"></i>
          </button>
          
      </form>
     </div>
     <div>
         <form action="{{ url('book/'.$id) }}" method="POST">
         @csrf
         @method('DELETE')
        
        <button type="submit"  class="btn bg-blue-500 rounded-lg">
            <i class="fa-solid fa-trash"></i>
        </button>
        </form>
      </div>

  </div>
 
  {{-- <div>

  </div> --}}

</div>

