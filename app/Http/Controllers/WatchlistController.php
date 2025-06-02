<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WatchlistController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $watchlists = Auth::user()->watchlists()
            ->with('film')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('watchlist.index', compact('watchlists'));
    }

    public function store(Request $request, Film $film)
    {
        $watchlist = Watchlist::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'film_id' => $film->id
            ],
            [
                'status' => $request->status ?? 'plan_to_watch'
            ]
        );

        return back()->with('success', 'Film added to watchlist!');
    }

    public function update(Request $request, Watchlist $watchlist)
    {
        $this->authorize('update', $watchlist);

        $request->validate([
            'status' => 'required|in:plan_to_watch,watching,completed,dropped'
        ]);

        $watchlist->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Watchlist status updated!');
    }

    public function destroy(Watchlist $watchlist)
    {
        $this->authorize('delete', $watchlist);
        
        $watchlist->delete();
        
        return back()->with('success', 'Film removed from watchlist!');
    }
} 