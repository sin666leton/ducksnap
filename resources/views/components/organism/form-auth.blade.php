<form method="post" wire:submit="submit" class="flex flex-col gap-4">
    @if ($mode == "register")
        <div class="flex flex-col gap-2">
            <label for="" class="font-semibold text-mist-500">Nama Lengkap <span class="text-red-400">*</span></label>
            <input type="text" name="name" id="name" wire:model="name" placeholder="Nama anda"
                class="border border-mist-300 focus:outline-none focus:border-mist-400 p-3 rounded-md bg-mist-100">
            @error('name')
                <p class="text-red-400 font-semibold">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="" class="font-semibold text-mist-500">Username <span class="text-red-400">*</span></label>
            <input type="text" name="username" id="name" wire:model="username" placeholder="Username anda"
                class="border border-mist-300 focus:outline-none focus:border-mist-400 p-3 rounded-md bg-mist-100">
            @error('username')
                <p class="text-red-400 font-semibold">{{ $message }}</p>
            @enderror
        </div>
    @endif
    <div class="flex flex-col gap-2">
        <label for="" class="font-semibold text-mist-500">Email <span class="text-red-400">*</span></label>
        <input type="email" name="email" id="email" wire:model="email" placeholder="contoh: example@gmail.com"
            class="border border-mist-300 focus:outline-none focus:border-mist-400 p-3 rounded-md bg-mist-100">
        @error('email')
            <p class="text-red-400 font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col gap-2">
        <label for="" class="font-semibold text-mist-500">Password <span class="text-red-400">*</span></label>
        <div
            class="flex items-center justify-between gap-2 border border-mist-300 focus:outline-none focus:border-mist-400 p-3 rounded-md bg-mist-100">
            <input type={{ $showPassword ? "text" : "password" }} name="password" id="password" wire:model="password"
                class="flex-1 outline:none border:none focus:outline-none">

            <button type="button" class="cursor-pointer" wire:click="toggleShowPassword">
                @if ($showPassword)
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path
                            d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z" />
                    </svg>
                @else
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path
                            d="M73 39.1C63.6 29.7 48.4 29.7 39.1 39.1C29.8 48.5 29.7 63.7 39 73.1L567 601.1C576.4 610.5 591.6 610.5 600.9 601.1C610.2 591.7 610.3 576.5 600.9 567.2L504.5 470.8C507.2 468.4 509.9 466 512.5 463.6C559.3 420.1 590.6 368.2 605.5 332.5C608.8 324.6 608.8 315.8 605.5 307.9C590.6 272.2 559.3 220.2 512.5 176.8C465.4 133.1 400.7 96.2 319.9 96.2C263.1 96.2 214.3 114.4 173.9 140.4L73 39.1zM236.5 202.7C260 185.9 288.9 176 320 176C399.5 176 464 240.5 464 320C464 351.1 454.1 379.9 437.3 403.5L402.6 368.8C415.3 347.4 419.6 321.1 412.7 295.1C399 243.9 346.3 213.5 295.1 227.2C286.5 229.5 278.4 232.9 271.1 237.2L236.4 202.5zM357.3 459.1C345.4 462.3 332.9 464 320 464C240.5 464 176 399.5 176 320C176 307.1 177.7 294.6 180.9 282.7L101.4 203.2C68.8 240 46.4 279 34.5 307.7C31.2 315.6 31.2 324.4 34.5 332.3C49.4 368 80.7 420 127.5 463.4C174.6 507.1 239.3 544 320.1 544C357.4 544 391.3 536.1 421.6 523.4L357.4 459.2z" />
                    </svg>
                @endif
            </button>
        </div>
        @error('password')
            <p class="text-red-400 font-semibold">{{ $message }}</p>
        @enderror
    </div>
    @if ($mode == "register")
        <div class="flex flex-col gap-2">
            <label for="" class="font-semibold text-mist-500">Konfirmasi Password <span
                    class="text-red-400">*</span></label>
            <div
                class="flex items-center justify-between gap-2 border border-mist-300 focus:outline-none focus:border-mist-400 p-3 rounded-md bg-mist-100">
                <input type={{ $showConfirmPassword ? "text" : "password" }} name="password" id="password"
                    wire:model="confirmPassword" class="flex-1 outline:none border:none focus:outline-none">

                <button type="button" class="cursor-pointer" wire:click="toggleShowConfirmPassword">
                    @if ($showConfirmPassword)
                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                                d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z" />
                        </svg>
                    @else
                        <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                                d="M73 39.1C63.6 29.7 48.4 29.7 39.1 39.1C29.8 48.5 29.7 63.7 39 73.1L567 601.1C576.4 610.5 591.6 610.5 600.9 601.1C610.2 591.7 610.3 576.5 600.9 567.2L504.5 470.8C507.2 468.4 509.9 466 512.5 463.6C559.3 420.1 590.6 368.2 605.5 332.5C608.8 324.6 608.8 315.8 605.5 307.9C590.6 272.2 559.3 220.2 512.5 176.8C465.4 133.1 400.7 96.2 319.9 96.2C263.1 96.2 214.3 114.4 173.9 140.4L73 39.1zM236.5 202.7C260 185.9 288.9 176 320 176C399.5 176 464 240.5 464 320C464 351.1 454.1 379.9 437.3 403.5L402.6 368.8C415.3 347.4 419.6 321.1 412.7 295.1C399 243.9 346.3 213.5 295.1 227.2C286.5 229.5 278.4 232.9 271.1 237.2L236.4 202.5zM357.3 459.1C345.4 462.3 332.9 464 320 464C240.5 464 176 399.5 176 320C176 307.1 177.7 294.6 180.9 282.7L101.4 203.2C68.8 240 46.4 279 34.5 307.7C31.2 315.6 31.2 324.4 34.5 332.3C49.4 368 80.7 420 127.5 463.4C174.6 507.1 239.3 544 320.1 544C357.4 544 391.3 536.1 421.6 523.4L357.4 459.2z" />
                        </svg>
                    @endif
                </button>
            </div>
            @error('confirmPassword')
                <p class="text-red-400 font-semibold">{{ $message }}</p>
            @enderror
        </div>
    @endif
    <div class="mt-6 mb-2 text-center">
        @if (session('error'))
            <div class="mb-6 bg-red-400 border border-red-500 text-mist-50 rounded-md py-4">
                {{ session('error') }}
            </div>
        @endif
        @error('errors')
            <div class="mb-6 bg-red-400 border border-red-500 text-mist-50 rounded-md py-4">
                {{ $message }}
            </div>
        @enderror
        <span class="text-center">
            {{ $mode == "register" ? "Sudah memiliki akun?" : "Belum memiliki akun?"}}
            <a href={{ $mode === "register" ? route('login') : route('register') }} wire:navigate
                class="text-blue-500 font-semibold">
                {{ $mode == "register" ? "Masuk disini" : "Daftar disini" }}
            </a>
        </span>
        <button wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" wire:target="submit"
            class="flex items-center justify-center cursor-pointer mt-2 bg-slate-700 text-mist-50 font-semibold w-full py-4 rounded-full">
            <span wire:loading.remove wire:target="submit">{{ $mode == "register" ? "Daftar" : "Masuk" }}</span>
            <span wire:loading wire:target="submit">
                <svg class="w-6 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                    <path fill="white"
                        d="M272 112C272 85.5 293.5 64 320 64C346.5 64 368 85.5 368 112C368 138.5 346.5 160 320 160C293.5 160 272 138.5 272 112zM272 528C272 501.5 293.5 480 320 480C346.5 480 368 501.5 368 528C368 554.5 346.5 576 320 576C293.5 576 272 554.5 272 528zM112 272C138.5 272 160 293.5 160 320C160 346.5 138.5 368 112 368C85.5 368 64 346.5 64 320C64 293.5 85.5 272 112 272zM480 320C480 293.5 501.5 272 528 272C554.5 272 576 293.5 576 320C576 346.5 554.5 368 528 368C501.5 368 480 346.5 480 320zM139 433.1C157.8 414.3 188.1 414.3 206.9 433.1C225.7 451.9 225.7 482.2 206.9 501C188.1 519.8 157.8 519.8 139 501C120.2 482.2 120.2 451.9 139 433.1zM139 139C157.8 120.2 188.1 120.2 206.9 139C225.7 157.8 225.7 188.1 206.9 206.9C188.1 225.7 157.8 225.7 139 206.9C120.2 188.1 120.2 157.8 139 139zM501 433.1C519.8 451.9 519.8 482.2 501 501C482.2 519.8 451.9 519.8 433.1 501C414.3 482.2 414.3 451.9 433.1 433.1C451.9 414.3 482.2 414.3 501 433.1z" />
                </svg>
            </span>
        </button>
    </div>
</form>