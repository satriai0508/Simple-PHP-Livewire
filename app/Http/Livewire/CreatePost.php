<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $body;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function store()
    {
        // dd(auth()->user()->id);
        Post::create([
            'body' => $this->body,
            'user_id' => Auth::id()
        ]);

        $this->body = "";
        $this->emit('postCreated');

        return redirect()->back();
    }
}