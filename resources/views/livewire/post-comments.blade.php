<div class="max-w-screen-md mx-auto"> <!-- Adjusted max-width -->
    <!-- Comment form -->
    @auth()
        <div class="flex justify-center shadow-lg mt-8 mb-4">
            <div class="flex flex-wrap -mx-3 mb-6 w-full">
                <h2 class="px-4 pt-3 pb-2 text-gray-500 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea wire:model="comment" class="bg-gray-50 p-4 border-t border-b md:border md:rounded leading-normal resize-none w-full h-32 py-2 px-3 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-blue-500 transition border-blue-200 duration-300 ease-in-out custom-placeholder" name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full mt-2 flex items-start justify-end px-3">
                    <button class="py-2 px-5 bg-blue-500 hover:bg-blue-600 text-sm text-white font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 border-t border-b md:border md:rounded" wire:click="postComment">Comment</button>
                </div>
            </div>
        </div>
    @endauth

    <!-- Display comments -->
    <div>
        @forelse ($this->comments as $comment)
            <div class="py-2"> <!-- Reduced margin-bottom to mb-2 -->
                <div class="bg-white border px-5 py-3 shadow-lg overflow-hidden rounded-lg flex flex-col justify-between">
                    <div class="text-base leading-6 text-gray-500">
                        <p>
                            {{$comment->comment}}
                        </p>
                    </div>
                    <div class="mt-3 flex items-center">
                        <div class="flex-shrink-0">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"  class="h-12 w-12 rounded-full">
                        </div>
                        <div class="ml-3">
                            <div class="text-sm leading-5 text-gray-500">
                                {{$comment->created_at->diffForHumans()}}
                                <a href="" class="text-blue-500 hover:text-blue-600 font-medium">username</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <p class="text-gray-800 text-lg mt-10">No comments yet</p>
            </div>
        @endforelse
    </div>

</div>
