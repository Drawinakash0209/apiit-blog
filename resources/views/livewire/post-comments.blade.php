<div>
    <!-- Comment form -->
    @auth()
    <div class="flex mx-auto items-center justify-center shadow-lg mt-8 mx-8 mb-4 max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6 w-full">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea wire:model="comment" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                </div>
                <button wire:click="postComment">Post Comment</button>
            </div>
        </div>
    </div>
    @endauth

    <!-- Display comments -->
    <div>
        @forelse ($this->comments as $comment)
        <div class="p-6">
            <div class="bg-white border px-10 py-8 shadow-lg overflow-hidden rounded-lg flex flex-col justify-between">
                <div class="text-base leading-6 text-gray-500 relative z-0">
                    <span class="absolute top-0 left-0 -mt-12 -ml-8"><span class="text-gray-100 relative leading-none" style="font-size: 20rem; z-index: -1;">“</span></span>
                    <p class="relative z-10">
                        {{$comment->comment}}
                    </p>
                </div>
                <div class="mt-6 flex items-center z-20">
                    <div class="flex-shrink-0">
                        <img src="https://picsum.photos/200"  class="h-12 w-12 rounded-full">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-gray-900">
                            <a href="">
                                {{-- {{dd($comment->user->name)}} --}}
                            </a>
                        </p>
                        <div class="text-sm leading-5 text-gray-500">
                            {{$comment->created_at->diffForHumans()}}
                            <a href="" class="text-blue-500 hover:text-blue-600 font-medium">user name?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @empty

        <div>
            <p class="text-gray-800 text-lg">No comments yet</p>
        </div>
        @endforelse
    </div>
</div>
