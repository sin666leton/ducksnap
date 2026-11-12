<div class="flex gap-4">
    <div class="pt-4">
        <div class="aspect-square relative overflow-hidden w-12 h-12 rounded-full">
            <img src="{{ asset('/storage/'.$authorAvatar) }}" alt="" class="object-cover w-full object-center h-full">
        </div>
    </div>
    <div class="flex-1 flex flex-col min-w-0">
        <div class="flex flex-col rounded-md bg-mist-50 border border-mist-300 gap-2">
            <div class="inline-flex items-center justify-between px-4 pt-4 bg-mist-50 border-mist-300">
                <div>
                    <a href="" class="font-semibold">{{ $authorName }}</a>
                    <span>membalas</span>
                </div>
                <span class="text-mist-500">{{ $commentCreated }}</span>
            </div>

            {{-- konten + gambar sebaris --}}
            <div class="flex items-center gap-4 p-4">
                @if ($commentImage)
                    <div class="shrink-0 w-24 aspect-video">
                        <img src="{{ asset('/storage/'.$commentImage) }}" alt="" class="rounded-md w-full h-full object-center object-cover">
                    </div>
                @endif
                <p class="flex-1 min-w-0 truncate">{{ $commentContent }}</p>
            </div>
        </div>
    </div>
</div>