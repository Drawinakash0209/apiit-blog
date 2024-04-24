<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;


use App\Models\Student;
use App\Models\Post;
use App\Models\User;
use LDAP\Result;
use Livewire\Component;

class LikeButton extends Component
{


    public Post $blog;

    // function to toggle like
    public function toggleLike()
    {
        // get the authenticated user
        $user = Auth::user();
        if ($user instanceof User) {
            if($user->hasLiked($this->blog)){
                $user->likes()->detach($this->blog);
                return;
            } 
        } 
        // attach the like
        if ($user instanceof User) {
           if ($user->hasLiked($this->blog)) {
            $user->likes()->detach($this->blog->id);
           } 

            $user->likes()->attach($this->blog->id);
           
        }
    
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
