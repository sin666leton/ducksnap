<div class="flex gap-4">
    <div class="pt-4">
        <div class="aspect-square relative overflow-hidden w-12 h-12 rounded-full">
            <img src={{ $authorAvatar }} alt="" class="object-cover w-full object-center h-full">
        </div>
    </div>
    <div class="flex-1 flex flex-col min-w-0">
        <div class="flex flex-col rounded-md bg-mist-50 border border-mist-300 gap-2">
            <div class="inline-flex items-center justify-between px-4 pt-4 bg-mist-50 border-mist-300">
                <div>
                    <a href="" class="font-semibold text-">{{ $authorName }}</a>
                    <span>membalas</span>
                </div>
                <span class="text-mist-500">{{ $commentCreated }}</span>
            </div>
            <div class="p-4">
                <p class="truncate">{{ $commentContent }}</p>
            </div>
            @if ($commentImage)
                <div class="aspect-video mt-4 px-5 mb-4 max-w-48">
                    <img src={{ $commentImage }} alt="" class="rounded-md w-full object-center object-cover">
                </div>
                @error('image')
                    <p class="text-red-400 font-semibold px-4 text-sm">{{ $message }}</p>
                @enderror
            @endif
        </div>
    </div>
</div>