<div class="relative flex gap-4">
    <!-- AVATAR -->
    <div class="pt-4">
        <div class="aspect-square relative overflow-hidden h-12 rounded-full">
            <img src={{ asset($authorAvatar) }} alt={{ $authorName . " avatar" }}
                class="object-cover w-full object-center h-full">
        </div>
    </div>
    <!-- KONTEN -->
    <div class="flex-1 flex flex-col gap-2 min-w-0">
        <div class="flex flex-col rounded-md bg-mist-50 border border-mist-300 gap-2">
            <div class="inline-flex items-center justify-between px-4 pt-4 bg-mist-50 border-mist-300 gap-2">
                <span class="font-semibold flex-1">{{ $authorName }}</span>
                <span class="text-mist-500">{{ $postCreated }}</span>
                @if (auth()->user()->id == intval($authorId))
                    <button type="button" wire:click="toggleDropdown" class="cursor-pointer">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path d="M320 208C289.1 208 264 182.9 264 152C264 121.1 289.1 96 320 96C350.9 96 376 121.1 376 152C376 182.9 350.9 208 320 208zM320 432C350.9 432 376 457.1 376 488C376 518.9 350.9 544 320 544C289.1 544 264 518.9 264 488C264 457.1 289.1 432 320 432zM376 320C376 350.9 350.9 376 320 376C289.1 376 264 350.9 264 320C264 289.1 289.1 264 320 264C350.9 264 376 289.1 376 320z"/>
                        </svg>
                    </button>
                @endif
                @if (auth()->user()->id == $authorId && $showDropdown)
                    <div class="flex items-center absolute right-0">
                        <div
                            class="bg-mist-50 border border-mist-200 min-w-52 max-w-52 absolute top-full mt-2.5 right-0 overflow-hidden rounded-md">
                            <ul class="*:h-full *:flex *:items-center *:text-sm">
                                <li>
                                    <button type="button" wire:click="toggleEdit"
                                        class="cursor-pointer flex items-center gap-1.5 justify-start py-1.5  px-3 w-full hover:bg-mist-200 m-0.5 rounded-md duration-75">
                                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                            <path d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z"/>
                                        </svg>
                                        <span>
                                            Edit postingan
                                        </span>
                                    </button>
                                </li>
                                <li class="border-t border-mist-200">
                                    <button
                                        class="flex items-center justify-start gap-1 py-1.5 px-3 w-full cursor-pointer text-red-400 text-sm font-semibold text-left hover:bg-red-400 hover:text-mist-50 rounded-md m-1 duration-75"
                                        wire:click="delete">
                                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                            <path fill="currentColor" d="M232.7 69.9C237.1 56.8 249.3 48 263.1 48L377 48C390.8 48 403 56.8 407.4 69.9L416 96L512 96C529.7 96 544 110.3 544 128C544 145.7 529.7 160 512 160L128 160C110.3 160 96 145.7 96 128C96 110.3 110.3 96 128 96L224 96L232.7 69.9zM128 208L512 208L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 208zM216 272C202.7 272 192 282.7 192 296L192 488C192 501.3 202.7 512 216 512C229.3 512 240 501.3 240 488L240 296C240 282.7 229.3 272 216 272zM320 272C306.7 272 296 282.7 296 296L296 488C296 501.3 306.7 512 320 512C333.3 512 344 501.3 344 488L344 296C344 282.7 333.3 272 320 272zM424 272C410.7 272 400 282.7 400 296L400 488C400 501.3 410.7 512 424 512C437.3 512 448 501.3 448 488L448 296C448 282.7 437.3 272 424 272z"/>
                                        </svg>
                                        <span>Hapus Postingan</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="p-4">
                @if ($editMode)
                    <form action="" method="POST" wire:submit="updatePost">
                        <textarea name="" id="" class="w-full min-h-auto" wire:model="editedContent" autofocus>{{ $postContent }}</textarea>
                        @if ($postImage)
                            <div class="aspect-video mt-4">
                                <img src={{ asset('storage/' . $postImage) }} alt=""
                                    class="rounded-md w-full h-full object-center object-cover">
                            </div>
                        @endif
                        <div class="inline-flex items-center justify-end mt-4 gap-2 w-full">
                            <button wire:click="toggleEdit" type="button" class="border border-mist-600 text-sm font-semibold rounded-md px-4 py-2 cursor-pointer hover:bg-mist-600 hover:text-mist-50 duration-75">Batal</button>
                            <button type="submit" class="border border-mist-600 font-semibold text-mist-50 text-sm bg-slate-600 py-2 px-4 rounded-md cursor-pointer hover:bg-slate-700 duration-75">Simpan perubahan</button>
                        </div>
                    </form>
                @else
                    <a wire:navigate href={{ route('post.show', ['id' => intval($postId)]) }} class="w-full">{{ $postContent }}</a>
                    @if ($postImage)
                        <div class="aspect-video mt-4">
                            <img src={{ asset('storage/' . $postImage) }} alt=""
                                class="rounded-md w-full h-full object-center object-cover">
                        </div>
                    @endif
                @endif
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia est, aut nisi obcaecati quasi veniam vel qui placeat magnam nesciunt soluta repellat! Explicabo in maiores consectetur eos, debitis aliquam laudantium!</p> -->
            </div>
            <div class="inline-flex gap-4 border-t border-mist-300 p-4">
                <livewire:post-like :postId="$postId"/>
                <livewire:post-comment :postId="$postId"/>
            </div>
        </div>
        <!-- Komentar -->
        {{ $slot }}
    </div>
</div>