<x-layout-main>
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
</x-layout-main>