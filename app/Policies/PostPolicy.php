<?php

namespace App\Policies;

use App\User;
use App\event;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\User  $user
     * @param  \App\event  $event
     * @return mixed
     */
    public function view(User $user, event $event)
    {
        //
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \App\User  $user
     * @param  \App\event  $event
     * @return mixed
     */
    public function update(User $user, event $event)
    {
        //
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \App\User  $user
     * @param  \App\event  $event
     * @return mixed
     */
    public function delete(User $user, event $event)
    {
        //
    }

    /**
     * Determine whether the user can restore the event.
     *
     * @param  \App\User  $user
     * @param  \App\event  $event
     * @return mixed
     */
    public function restore(User $user, event $event)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the event.
     *
     * @param  \App\User  $user
     * @param  \App\event  $event
     * @return mixed
     */
    public function forceDelete(User $user, event $event)
    {
        //
    }
}
