<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {

        $title = $request->query('title', '');
        $take = $request->query('take');
        $skip = $request->query('skip');

        if ($title) {
            return Movie::searchByTitle($title)->take($take)->skip($skip)->get();
        }

        return Movie::all();
        // 1. nacin
        
        // if ($title) {
        //     return  Movie::query()->searchByTitle($title);
        // };
        // return Movie::all();

        // $movies = Movie::all();
        // return $movies;


        // 2. jako kul nacin

        //return Movie::query()->searc($title)->take($take)->skip($skip)->get();
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
    public function store(MovieRequest $request)
    {
        $validated = $request->validated();

        return Movie::create([
            'title' => $validated['title'],
            'director' => $validated['director'],
            'imgUrl' => $validated['imgUrl'],
            'duration' => $validated['duration'],
            'releaseDate' => $validated['releaseDate'],
            'genre' => $validated['genre'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return $movie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        $validated = $request->validated();

        return Movie::where('id', $id)->update([
            'title' => $validated['title'],
            'director' => $validated['director'],
            'imageUrl' => $validated['imageUrl'],
            'duration' => $validated['duration'],
            'releaseDate' => $validated['releaseDate'],
            'genre' => $validated['genre'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Movie::where('id', $id)->delete();
    }
}