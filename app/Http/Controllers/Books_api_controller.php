<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Book;

class Books_api_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $books = Book::paginate(10);
        return PostResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->auther_name = $request->auther_name;
        $book->price = $request->price;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $request->image->move(public_path('images'), $imageName);
        $book->image = $imageName;
        if($book->save()){
            return new PostResource($book);
        }
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
        return new PostResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->auther_name = $request->auther_name;
        $book->price = $request->price;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $request->image->move(public_path('images'), $imageName);
        $book->image = $imageName;
        if($book->save()){
            return new PostResource($book);
        }
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
        if($book->delete()){
            return new PostResource($book);
        }
    }
}
