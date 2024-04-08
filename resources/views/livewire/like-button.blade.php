{{-- <div class="flex items-center h-screen px-6"> --}}

<button wire:click="toggleLike()" class="cursor-pointer">
      <span class="flex h-min w-min space-x-1 items-center rounded-full text-gray-400 hover:text-rose-600 bg-gray-700 hover:bg-rose-50 py-1 px-2 text-xs font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current hover:text-red-400 {{(Auth::guard('student')->user()?->hasLiked($blog)) ? 'text-red-600' : 'text-gray-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <p class="font-semibold text-xs">{{$blog->likes()->count()}}</p>
      </span>
</button>

{{-- </div> --}}
