<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetching popular movies from the api
        $popularMovies = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $genresArray = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $nowPlayingMovies = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        // $genres = collect($genresArray)->mapWithKeys(function($genre){
        //     return [$genre['id'] => $genre['name']];
        // });
        return response()->json([
            'msg' => $popularMovies,
            'genres' => $genresArray,
            'playing' => $nowPlayingMovies
        ], 200);
    }

    //rendering movies blade component

    public function movies()
    {
        return view('movies');
    }

    // rendering movie blade component
    public function movie()
    {
        return view('movie');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movieDetail = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();

        return response()->json([
            'msg' => $movieDetail
        ], 200);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function trending()
    {
        $movieTrends = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/trending/all/day')
            ->json()['results'];
        $genresArray = Http::withToken(config('services.mvz.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
            
        return response()->json([
            'movieTrends' => $movieTrends,
            'genres' => $genresArray
        ], 200);
    }
}
