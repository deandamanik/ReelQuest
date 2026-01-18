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
        if(!$query) return response()->json([]);

        $response = Http::get('http://www.omdbapi.com/', [
            'apikey' => config('services.omdb.key'),
            's' => $query,
        ]);

        return response()->json($response->json()['Search'] ?? []);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        if(!$id) return response()->json(['error' => 'ID not found'], 400);

        $response = Http::get("http://www.omdbapi.com/", [
            'apikey' => config('services.omdb.key'),
            'i' => $id,
            'plot' => 'short'
        ]);

        return response()->json($response->json());
    }
}
