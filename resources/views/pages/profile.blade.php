<x-layout-main>
    <div class="flex flex-col gap-2">
        <div class="flex items-top rounded-md bg-mist-50 border border-mist-300 gap-6 p-6">
            <div class="aspect-square relative overflow-hidden w-full max-w-24 max-h-24 rounded-full">
                <img src={{ asset($user->avatar) }} alt=""
                    class="object-cover w-full object-center h-full">
            </div>
            <div class="flex justify-between w-full">
                <div class="space-y-4">
                    <div class="relative">
                        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                        <p class="text-mist-500">{{ '@'.$user->username }}</p>
                    </div>
                    <a wire:navigate href={{ route('user.edit') }}
                        class="bg-transparent border border-mist-700 px-3 py-1 rounded-sm text-sm font-semibold hover:border-transparent hover:bg-mist-700 hover:text-mist-50 duration-75 cursor-pointer">
                        Edit profile
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col rounded-md bg-mist-50 border border-mist-300 gap-6 p-6">
            <div class="flex">
                <div class="max-w-28 w-full shrink-0">
                    <span class="font-semibold">Bio</span>
                </div>
                <div>
                    <p>{{ $user->bio ?? "Tidak ada bio" }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="shrink-0 max-w-28 w-full">
                    <span class="font-semibold">Bergabung</span>
                </div>
                <div>
                    <p>{{ $user->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
        <livewire:create-post />
        <!-- POSTINGAN -->
        @foreach ($posts as $key => $post)
            <livewire:post-card :key="$post->postId" :authorId="$post->authorId" :authorName="$post->authorName"
                :authorAvatar="$post->authorAvatar" :postId="$post->postId" :postContent="$post->postContent"
                :postImage="$post->postImage" :totalLikes="$post->totalLikes" :postCreated="$post->postCreated" :totalComments="$post->totalComments">
                @foreach ($post->comments as $comment)
                    <livewire:short-comment-card
                        :authorId="$comment->authorId"
                        :authorName="$comment->authorName"
                        :authorAvatar="$comment->authorAvatar"
                        :commentContent="$comment->commentContent"
                        :commentCreated="$comment->commentCreated"
                        :commentImage="$comment->commentImage"
                    />
                @endforeach
            </livewire:post-card>
        @endforeach
    </div>
    </div>
</x-layout-main>