<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books\Book;
use App\Http\Requests\CreateRequest;

class BookController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view("admin.all_books",compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.add_new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
       if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $request->image->move(public_path('images'), $imageName);
        }


        $books = new Book();
        $books->name = $request->name;
        $books->auther_name = $request->auther_name;
        $books->price = $request->price;
        $books->image = $imageName;
        $books->save();
        return back()->with('new_books','Books added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('admin.details',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::find($id);
        return view("admin.edit_book",compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $books = Book::find($request->id);
        $name = $request->name;
        $author_name = $request->auther_name;
        $price= $request->price;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $request->image->move(public_path('images'), $imageName);
            $books->image = $imageName;
        }


        
        $books->name = $name;
        $books->auther_name = $author_name;
        $books->price = $price;
        $books->save();
        return back()->with('edit_books','Books edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        unlink(public_path('images').'/'.$book->image);
        $book->delete();
        return back()->with('delete','Books deleted');

    }
}
