<div class="bg-white p-4">
  @foreach ($posts as $post)
  <div class="shadow-xl p-4 my-2 mx-3">
    <span class="text-4xl font-extrabold text-blue-700">{{ $post->user->name }}</span>
    <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <button wire:click="updateForm({{ $post->id }})" class="p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Edit</button>
    <button onclick="return confirm('Are you sure?') || event.stopImmediaPropaganition()" wire:click="destroy({{ $post->id }})" class="bg-red-500 rounded-lg p-2 m-2 hover:bg-red-700 text-white">Delete</button>
    @if($updateState != $post->id)
    <span class="text-lg font-medium flex">{{ $post->body }}</span>
    @endif
  </div>
  <div class="">

    @if($updateState === $post->id)
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <textarea wire:model="body" name="body" class="rounded shadow w-4/5 p-4 md:leading-relaxed m-4 appearance-none leading-tight text-blue-700 focus:outline-none focus:shadow-outline-blue" rows="1" cols="1" placeholder="Edit Something"></textarea>
    <button wire:click="update({{ $post->id }})" class="bg-yellow-500 rounded-lg p-3 m-3 hover:bg-yellow-700 text-white">Update</button>
    @endif
  </div>
  @endforeach
</div>
