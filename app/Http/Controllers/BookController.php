<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // for the input field page

    public function adding_page(){
        return view("add_new");
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view("all_books",compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'auther_name'=>'required',
            'price'=>'required',
            'image'=>'required'
        ]);
        $name = $request->name;
        $author_name = $request->auther_name;
        $price= $request->price;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $request->image->move(public_path('images'), $imageName);

        $books = new Book();
        $books->name = $name;
        $books->auther_name = $author_name;
        $books->price = $price;
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
        return view('details',compact('book'));
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
        return view("edit_book",compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBooks(Request $request)
    {
        $name = $request->name;
        $author_name = $request->auther_name;
        $price= $request->price;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $request->image->move(public_path('images'), $imageName);

        $books = Book::find($request->id);
        $books->name = $name;
        $books->auther_name = $author_name;
        $books->price = $price;
        $books->image = $imageName;
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
