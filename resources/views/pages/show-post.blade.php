<x-layout-main>
    <livewire:post-card :key="$post->postId" :authorId="$post->authorId" :authorName="$post->authorName"
        :authorAvatar="$post->authorAvatar" :postId="$post->postId" :postContent="$post->postContent"
        :postImage="$post->postImage" :redirectAfterDelete="true">
        <livewire:create-comment
            :postId="$id"
        />
        <livewire:list-comment
            :postId="$id"
        />
    </livewire:post-card>
</x-layout-main>