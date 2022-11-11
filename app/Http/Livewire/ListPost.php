<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{
    public $updateState = 0;
    public $body;

    protected $listeners = [
        'postCreated' => '$refresh'
    ];

    public function updateForm(Post $post)
    {
        $post = Post::where('id', $post->id)->find($post->id);
        $this->body = $post->body;
        $this->updateState = $post->id;
    }

    public function update(Post $post)
    {
        $post = Post::where('id', $post->id)->find($post->id);
        $post->body = $this->body;
        $post->save();

        $this->updateState = 0;
    }

    public function destroy(Post $post)
    {
        $post = Post::where('id', $post->id)->find($post->id);
        $post->delete();
    }

    public function render()
    {
        return view('livewire.list-post', [
            'posts' => Post::latest()->get()
        ]);
    }
}