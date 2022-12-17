<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('updated_at', 'desc')->take(12)->get();
        $series = Serie::withCount('seasons')->orderBy('created_at', 'desc')->take(12)->get();
        $episodes = Episode::orderBy('created_at', 'desc')->take(12)->get();
        $moviesSortYear2022 = Movie::where('release_date', 'Like', '%' . 2022 . '%')->take(12)->get();
        $moviesSortYear2021 = Movie::where('release_date', 'Like', '%' . 2021 . '%')->take(12)->get();
        $moviesSortYear2020 = Movie::where('release_date', 'Like', '%' . 2020 . '%')->take(12)->get();

        return view('welcome', compact('movies', 'series', 'episodes', 'moviesSortYear2022', 'moviesSortYear2021', 'moviesSortYear2020'));
    }
}
