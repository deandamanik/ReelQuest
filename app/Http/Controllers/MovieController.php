<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index');
    }

    public function search(Request $request)
    {
        $query = $request->q;

        if(!$query) {
            return response()->json([]);
        }

        $response = Http::get('http://www.omdbapi.com/', [
            'apikey' => env('OMDB_API_KEY'),
            's' => $query,
        ]);

        return response()->json($response->json()['Search'] ?? []);
    }
}
