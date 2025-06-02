<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RatingController extends Controller
{
    public function store(Request $request, Film $film)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $rating = Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'film_id' => $film->id
            ],
            [
                'rating' => $request->rating,
                'comment' => $request->comment
            ]
        );

        return back()->with('success', 'Rating submitted successfully!');
    }

    public function update(Request $request, Rating $rating)
    {
        if (!Gate::allows('update', $rating)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $rating->update([
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Rating updated successfully!');
    }

    public function destroy(Rating $rating)
    {
        if (!Gate::allows('delete', $rating)) {
            abort(403, 'Unauthorized action.');
        }
        
        $rating->delete();
        
        return back()->with('success', 'Rating deleted successfully!');
    }
} 