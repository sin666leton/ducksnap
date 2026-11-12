<div class="space-y-2">
    @foreach ($comments as $comment)
        <livewire:comment-card
            :key="$comment->commentId"
            :commentId="$comment->commentId"
            :authorId="$comment->authorId"
            :authorName="$comment->authorName"
            :authorAvatar="$comment->authorAvatar"
            :commentContent="$comment->commentContent"
            :commentCreated="$comment->commentCreated"
            :commentImage="$comment->commentImage"
        />
    @endforeach
</div>