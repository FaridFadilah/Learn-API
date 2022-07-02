<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BooksRequest;
use App\Http\Resources\BooksResource;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BooksController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $faker = Factory::create(1);

        $data = Book::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "publication_year" => (string)$request->input("publication_year")
        ]);
        // return new BooksResource($data);
        return response()->json([
            "data" => [
                "id" =>  (string)$data->id,
                "type" => "Books",
                "attributes" => [
                    "name" => $data->name,
                    "description" => $data->description,
                    "publication_year" => $data->publication_year,
                    "created_at" => $data->created_at,
                    "update_at" => $data->updated_at,
                ]
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book){
        // return $book;
        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookRequest  $request
     * @param \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book){
        // $faker = Factory::create(1);
        $book->input("name", "description", "publication_year")->create();

        return response()->json([
            "data" => [
                "id" => (string)$book->id,
                "message" => "Success",
                "attributes" => [
                    "name" => $book->name,
                    "description" => $book->description,
                    "publication_year" => $book->publication_year,
                ]
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, BooksRequest $request){
        $book->delete();
        return response()->json([
            "data" => [
                "id" => old($request->input('key', 'default')),
                "message" => "success",
                "attribute" => [
                    "name" => old($request->input("name")),
                    "description" => old($request->input("description")),
                    "publication_year" => old($request->input("publication_year")),
                ]
            ]
        ]);
    }
}