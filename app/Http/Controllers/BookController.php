<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // Categoryモデルを追加

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; // Validatorのインポート
use Illuminate\Support\Facades\Auth; // Authのインポート


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(Book $book)
    {
        // 追加
        $books = Book::orderBy('created_at', 'asc')->get();
        return view('all', [
            'books' => $books
        ]);
    }



    public function index()
    {
        $books = Book::with('categories') // カテゴリも一緒に取得
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        $categories = Category::all(); // 全てのカテゴリを取得

        return view('books', [
            'books' => $books,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:1|max:255',
            'item_detail' => 'required',
            'categories' => 'required|array', // カテゴリの選択を検証
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）

        // Eloquentモデル
        $books = new Book;
        $books->user_id  = Auth::user()->id;
        $books->item_name   = $request->item_name;
        $books->item_detail = $request->item_detail;
        $books->save();

        // 本にカテゴリを紐づける
        $books->categories()->sync($request->categories);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($book_id)
    {
        // $books = Book::where('user_id', Auth::user()->id)->find($book_id);

        $books = Book::with('categories') // カテゴリも一緒に取得
            ->where('user_id', Auth::user()->id)
            ->find($book_id);
        $categories = Category::all();


        return view('booksedit', ['book' => $books, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_detail' => 'required',
            'categories' => 'required|array',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/booksedit/' . $request->id)
                ->withInput()
                ->withErrors($validator);
        }

        //データ更新
        $books = Book::where('user_id', Auth::user()->id)->find($request->id);
        $books->item_name   = $request->item_name;
        $books->item_detail = $request->item_detail;
        $books->save();

        // 本のカテゴリを更新
        $books->categories()->sync($request->categories);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();       //追加
        return redirect('/');  //追加
    }
}
