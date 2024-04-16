<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;


use App\Models\Student;
use App\Models\Post;
use LDAP\Result;
use Livewire\Component;

class LikeButton extends Component
{


    public Post $blog;

    public function toggleLike()
    {

       
        // if(auth()->guest()){
        //     return $this->redirect(route('student.login'),true);
        // }
         

        $user = Auth::guard('student')->user();
       
        if ($user instanceof Student) {

            // $hasLiked = $user->likes()->where('post_id', $this->blog->id)->exists();

            if($user->hasLiked($this->blog)){
                $user->likes()->detach($this->blog);
                return;
            } 
        


            // Your logic for toggling like
        } 
        
        if ($user instanceof Student) {
           if ($user->hasLiked($this->blog)) {
            $user->likes()->detach($this->blog->id);
           } 

            $user->likes()->attach($this->blog->id);
           
        }

    
       // $hasLiked = $user->likes()->where('post_id', $this->blog->id)->exists();
    
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
