<div>
  {{ $body }}
  <div class="flex">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <textarea wire:model="body" name="body" class="rounded shadow w-full p-4 md:leading-relaxed m-4 appearance-none leading-tight text-blue-700 focus:outline-none focus:shadow-outline-blue" rows="3" placeholder="Post Something"></textarea>
  </div>
  <div class="overflow-hidden mt-2 px-3 py-3">
    <button wire:click="store" class="bg-blue-500 px-4 py-2 rounded hover:bg-blue-700 text-white" type="submit">Post</button>
  </div>
</div>
