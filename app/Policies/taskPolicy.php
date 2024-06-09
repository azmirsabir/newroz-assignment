<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class taskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    
    }
    
    public function update(User $user,Task $task){
      return $task->created_by===$user->id;
    }
}
