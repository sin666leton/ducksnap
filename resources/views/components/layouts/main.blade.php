<div class="flex flex-col justify-between h-screen gap-2">
    <livewire:navbar/>
    <div class="flex-1">
        <div class="flex flex-col md:max-w-4xl mx-auto">
            {{ $slot }}
        </div>
    </div>
    <!-- <footer class="w-full bg-mist-600 py-2 text-mist-100">
        <div class="md:max-w-4xl mx-auto text-center">
            <span class="font-semibold">
                Copyright &copy; Ahmad Zidan 2026
            </span>
        </div>
    </footer> -->
</div>