<div class="min-w-full flex justify-center gap-2">
    <!-- Sidebar -->
    <div class="flex flex-col bg-white min-h-screen md:w-md md:max-w-md">
        <a wire:navigate href="#" class="py-8">
            <h1 class="md:text-2xl font-bold text-center my-auto">DuckSnap.</h1>
        </a>
        <div class="px-4">
            <ul>
                <li class="text-xl">
                    <a href="">Beranda</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="w-full">
        {{ $slot }}
    </main>
    <!-- End Main -->

    <!-- Second Sidebar -->
    <div class="bg-white min-h-screen md:w-md md:max-w-md">

    </div>
    <!-- End Second Sidebar -->
</div>