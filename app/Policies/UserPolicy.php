<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
   

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
      
        // return $user->id === $model->id;
        // return $user->is($model);
        return ((bool) $user->is_admin || $model->id === $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

   
}
