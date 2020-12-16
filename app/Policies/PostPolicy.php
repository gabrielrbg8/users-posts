<?php

namespace App\Policies;

use App\Action;
use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $user->isAdmin() || $user->id === $post->author;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->author;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $this->mapActions($user->profile->actions, 'post-delete');
    }

    /**
    * This method has created for actions that maked by system admins.
    */
    public function mapActions($actions, $requestedAction)
    {
        foreach ($actions as $action) {
            $actionProfile = Action::find($action->action_id);
            if ($actionProfile->name == $requestedAction) {
                return true;
            }
        }
        return false;
    }
}
