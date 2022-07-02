<?php

namespace     App\Http\Controllers;
use          Faker\Factory;
use      App\Models\Author;
use  Illuminate\Http\Request;
use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorsResources;

class AuthorsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return AuthorsResources::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $faker = Factory::create(1);
        $author = Author::create([
            "name" => $faker->name
        ]);

        return new AuthorsResources($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author){
        return new AuthorsResources($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */

    public function update(AuthorsRequest $request, Author $author){
        $author->update([
            "name" => $request->input("name")
        ]);

        return new AuthorsResources($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author){
        $author->delete();

        return response(null, 204);
    }
}