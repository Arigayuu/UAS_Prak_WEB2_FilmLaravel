<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('films.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'director' => 'required',
            'description' => 'required',
            'release_year' => 'required|numeric|min:1900|max:' . (date('Y') + 1),
            'genre' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $data['poster'] = $posterPath;
        }

        $film = Film::create($data);
        // Attach categories
        if ($request->has('categories')) {
            $film->categories()->attach($request->categories);
        }

        return redirect()->route('films.index')
            ->with('success', 'Film berhasil ditambahkan!');
    }

    public function show(Film $film)
    {
        $comments = $film->comments()->orderBy('created_at', 'desc')->get();
        return view('films.show', compact('film', 'comments'));
    }

    public function edit(Film $film)
    {
        $categories = Category::all();
        return view('films.edit', compact('film', 'categories'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'director' => 'required',
            'description' => 'required',
            'release_year' => 'required|numeric|min:1900|max:' . (date('Y') + 1),
            'genre' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('poster')) {
            if ($film->poster) {
                Storage::disk('public')->delete($film->poster);
            }
            $posterPath = $request->file('poster')->store('posters', 'public');
            $data['poster'] = $posterPath;
        }

        $film->update($data);
        if ($request->has('categories')) {
            $film->categories()->sync($request->categories);
        } else {
            $film->categories()->detach();
        }

        return redirect()->route('films.index')
            ->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Film $film)
    {
        // Hapus poster jika ada
        if ($film->poster) {
            Storage::disk('public')->delete($film->poster);
        }
        
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus!');
    }
}
