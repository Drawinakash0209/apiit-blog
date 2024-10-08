<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component
{

    public Post $blog;

    #[Rule('required|min:2|max:200')]
    public string $comment;

    // function to post comment
    public function postComment(){
        $this->validateOnly('comment');
       
        $this->blog->comments()->create([
            'comment' => $this->comment,
            'student_id' => Auth::user()->id,
        ]);

        $this->reset('comment');

    }
     
    #[Computed()]
    public function comments(){
        return $this?->blog?->comments()->latest()->paginate(5);

    }

    public function render()
    {
        return view('livewire.post-comments');
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
    }
    
}
