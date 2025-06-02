<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Watchlist;

class WatchlistPolicy
{
    /**
     * Determine whether the user can update the watchlist item.
     */
    public function update(User $user, Watchlist $watchlist): bool
    {
        return $user->id === $watchlist->user_id;
    }

    /**
     * Determine whether the user can delete the watchlist item.
     */
    public function delete(User $user, Watchlist $watchlist): bool
    {
        return $user->id === $watchlist->user_id;
    }
} 