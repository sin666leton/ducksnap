<x-layout-main>
    <div class="flex flex-col gap-2">
        <div class="flex items-top rounded-md bg-mist-50 border border-mist-300 gap-6 p-6">
            <div class="aspect-square relative overflow-hidden w-full max-w-24 max-h-24 rounded-full">
                <img src="https://dummyimage.com/600x600/000/fff.jpg" alt=""
                    class="object-cover w-full object-center h-full">
            </div>
            <div class="flex justify-between w-full">
                <div class="space-y-4">
                    <div class="relative">
                        <h1 class="text-3xl font-bold">Ahmad Zidan</h1>
                        <p class="text-mist-500">@username</p>
                    </div>
                    <button
                        class="bg-transparent border border-mist-700 px-3 py-1 rounded-sm text-sm font-semibold hover:border-transparent hover:bg-mist-700 hover:text-mist-50 duration-75 cursor-pointer">
                        Edit profile
                    </button>
                </div>
                <div class="flex justify-end">
                    <a href="">
                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                                d="M259.1 73.5C262.1 58.7 275.2 48 290.4 48L350.2 48C365.4 48 378.5 58.7 381.5 73.5L396 143.5C410.1 149.5 423.3 157.2 435.3 166.3L503.1 143.8C517.5 139 533.3 145 540.9 158.2L570.8 210C578.4 223.2 575.7 239.8 564.3 249.9L511 297.3C511.9 304.7 512.3 312.3 512.3 320C512.3 327.7 511.8 335.3 511 342.7L564.4 390.2C575.8 400.3 578.4 417 570.9 430.1L541 481.9C533.4 495 517.6 501.1 503.2 496.3L435.4 473.8C423.3 482.9 410.1 490.5 396.1 496.6L381.7 566.5C378.6 581.4 365.5 592 350.4 592L290.6 592C275.4 592 262.3 581.3 259.3 566.5L244.9 496.6C230.8 490.6 217.7 482.9 205.6 473.8L137.5 496.3C123.1 501.1 107.3 495.1 99.7 481.9L69.8 430.1C62.2 416.9 64.9 400.3 76.3 390.2L129.7 342.7C128.8 335.3 128.4 327.7 128.4 320C128.4 312.3 128.9 304.7 129.7 297.3L76.3 249.8C64.9 239.7 62.3 223 69.8 209.9L99.7 158.1C107.3 144.9 123.1 138.9 137.5 143.7L205.3 166.2C217.4 157.1 230.6 149.5 244.6 143.4L259.1 73.5zM320.3 400C364.5 399.8 400.2 363.9 400 319.7C399.8 275.5 363.9 239.8 319.7 240C275.5 240.2 239.8 276.1 240 320.3C240.2 364.5 276.1 400.2 320.3 400z" />
                        </svg>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem accusantium perspiciatis
                        temporibus cum veritatis recusandae, harum reprehenderit, suscipit qui adipisci ducimus unde
                        distinctio consequatur? Commodi accusamus autem perspiciatis praesentium enim.</p>
                </div>
            </div>
            <div class="flex">
                <div class="shrink-0 max-w-28 w-full">
                    <span class="font-semibold">Bergabung</span>
                </div>
                <div>
                    <p>16 Juni 2026</p>
                </div>
            </div>
        </div>
        <livewire:post-card />
    </div>
</x-layout-main>