<div class="bg-mist-50 border-b border-mist-200 w-full sticky top-0 z-50">
    <div class="flex items-center justify-between md:max-w-2xl mx-auto px-4">
        <a wire:navigate href={{ route('feed') }}>
            <h1 class="text-2xl font-bold">{{ $siteName }}</h1>
        </a>
        <ul class="relative inline-flex items-center justify-start gap-4">
            <li>
                <a wire:navigate href={{ route('feed') }} class="flex items-center justify-center md:w-8 h-full py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path
                            d="M304 70.1C313.1 61.9 326.9 61.9 336 70.1L568 278.1C577.9 286.9 578.7 302.1 569.8 312C560.9 321.9 545.8 322.7 535.9 313.8L527.9 306.6L527.9 511.9C527.9 547.2 499.2 575.9 463.9 575.9L175.9 575.9C140.6 575.9 111.9 547.2 111.9 511.9L111.9 306.6L103.9 313.8C94 322.6 78.9 321.8 70 312C61.1 302.2 62 287 71.8 278.1L304 70.1zM320 120.2L160 263.7L160 512C160 520.8 167.2 528 176 528L224 528L224 424C224 384.2 256.2 352 296 352L344 352C383.8 352 416 384.2 416 424L416 528L464 528C472.8 528 480 520.8 480 512L480 263.7L320 120.3zM272 528L368 528L368 424C368 410.7 357.3 400 344 400L296 400C282.7 400 272 410.7 272 424L272 528z" />
                    </svg>
                </a>
            </li>
            <li class="relative flex items-center">
                <button class="cursor-pointer flex items-center gap-2" type="button" wire:click="toggleDropdown">
                    <div class="aspect-square relative overflow-hidden w-full max-w-8 max-h-8 rounded-full">
                        <img src={{ asset($user->avatar) }} alt="" class="object-cover w-full object-center h-full">
                    </div>
                    <svg class="w-5 {{ $showDropdown ? 'rotate-180' : '' }}" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                        <path
                            d="M300.3 199.2C312.9 188.9 331.4 189.7 343.1 201.4L471.1 329.4C480.3 338.6 483 352.3 478 364.3C473 376.3 461.4 384 448.5 384L192.5 384C179.6 384 167.9 376.2 162.9 364.2C157.9 352.2 160.7 338.5 169.9 329.4L297.9 201.4L300.3 199.2z" />
                    </svg>
                </button>
                @if ($showDropdown)
                    <div
                        class="bg-mist-50 border border-mist-200 min-w-52 max-w-52 absolute top-full right-0 overflow-hidden rounded-md">
                        <div class="px-3 pt-2 pb-4 border-b border-mist-200 -space-y-1">
                            <h4 class="font-semibold truncate">{{ $user->name }}</h4>
                            <span class="text-mist-400 font-semibold text-sm truncate">{{ '@' . $user->username }}</span>
                        </div>
                        <ul class="*:h-full *:flex *:items-center *:text-sm">
                            <li>
                                <a wire:navigate href={{ route('user.show') }}
                                    class="flex items-center gap-1.5 justify-start py-1.5  px-3 w-full hover:bg-mist-200 m-0.5 rounded-md duration-75">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M470.5 463.6C451.4 416.9 405.5 384 352 384L288 384C234.5 384 188.6 416.9 169.5 463.6C133.9 426.3 112 375.7 112 320C112 205.1 205.1 112 320 112C434.9 112 528 205.1 528 320C528 375.7 506.1 426.2 470.5 463.6zM430.4 496.3C398.4 516.4 360.6 528 320 528C279.4 528 241.6 516.4 209.5 496.3C216.8 459.6 249.2 432 288 432L352 432C390.8 432 423.2 459.6 430.5 496.3zM320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM320 304C297.9 304 280 286.1 280 264C280 241.9 297.9 224 320 224C342.1 224 360 241.9 360 264C360 286.1 342.1 304 320 304zM232 264C232 312.6 271.4 352 320 352C368.6 352 408 312.6 408 264C408 215.4 368.6 176 320 176C271.4 176 232 215.4 232 264z" />
                                    </svg>
                                    <span>
                                        Profil
                                    </span>
                                </a>
                            </li>
                            <li class="border-t border-mist-200">
                                <button
                                    class="flex items-center justify-start gap-1 py-1.5 px-3 w-full cursor-pointer text-red-400 text-sm font-semibold text-left hover:bg-red-400 hover:text-mist-50 rounded-md m-1 duration-75"
                                    wire:click="logout">
                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="currentColor"
                                            d="M224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160zM566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L438.6 169.3C426.1 156.8 405.8 156.8 393.3 169.3C380.8 181.8 380.8 202.1 393.3 214.6L466.7 288L256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L466.7 352L393.3 425.4C380.8 437.9 380.8 458.2 393.3 470.7C405.8 483.2 426.1 483.2 438.6 470.7L566.6 342.7z" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                @endif
            </li>
        </ul>
    </div>
</div>