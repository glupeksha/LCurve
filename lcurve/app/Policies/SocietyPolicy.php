<?php

namespace App\Policies;

use App\User;
use App\Society;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocietyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the society.
     *
     * @param  \App\User  $user
     * @param  \App\Society  $society
     * @return mixed
     */
    public function view(User $user, Society $society)
    {
        //
    }

    /**
     * Determine whether the user can create societies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the society.
     *
     * @param  \App\User  $user
     * @param  \App\Society  $society
     * @return mixed
     */
    public function update(User $user, Society $society)
    {
        //
    }

    /**
     * Determine whether the user can delete the society.
     *
     * @param  \App\User  $user
     * @param  \App\Society  $society
     * @return mixed
     */
    public function delete(User $user, Society $society)
    {
        //
    }
}
