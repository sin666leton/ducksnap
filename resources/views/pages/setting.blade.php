<x-layout-main>
    <form wire:submit="updateUser" class="space-y-2">
        {{-- Header: foto profil --}}
        <div class="flex items-top rounded-md bg-mist-50 border border-mist-300 gap-6 p-6">
            <div class="aspect-square relative overflow-hidden w-24 h-24 shrink-0 rounded-full">
                @if ($avatar)
                    <img src="{{ $avatar->temporaryUrl() }}" alt="" class="object-cover w-full object-center h-full">
                @else
                    <img src="{{ $oldAvatar }}" alt="" class="object-cover w-full object-center h-full">
                @endif

                <div wire:loading wire:target="avatar"
                    class="absolute inset-0 flex items-center justify-center bg-mist-50/70 text-xs">
                    Mengunggah...
                </div>
            </div>

            <div class="flex flex-col justify-center gap-2">
                <label for="avatar"
                    class="inline-block w-fit bg-transparent border border-mist-700 px-3 py-1 rounded-sm text-sm font-semibold hover:border-transparent hover:bg-mist-700 hover:text-mist-50 duration-75 cursor-pointer">
                    Ganti foto
                </label>
                <input id="avatar" type="file" wire:model="avatar" accept="image/*" class="hidden">
                <p class="text-sm text-mist-500">JPG, PNG, atau WEBP. Maksimal 2 MB.</p>
                @error('avatar') <p class="text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>
        {{-- Form --}}
        <div class="flex flex-col rounded-md bg-mist-50 border border-mist-300 gap-6 p-6">

            <div class="flex gap-4">
                <label for="name" class="max-w-28 w-full shrink-0 font-semibold pt-2">Nama</label>
                <div class="w-full">
                    <input id="name" type="text" wire:model.blur="name"
                        class="w-full rounded-sm border border-mist-300 bg-transparent px-3 py-2 focus:outline-none focus:border-mist-700">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4">
                <label for="username" class="max-w-28 w-full shrink-0 font-semibold pt-2">Username</label>
                <div class="w-full">
                    <div class="flex items-center rounded-sm border border-mist-300 focus-within:border-mist-700">
                        <input id="username" type="text" wire:model.blur="username"
                            class="w-full bg-transparent px-3 py-2 focus:outline-none">
                    </div>
                    @error('username') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex gap-4">
                <label for="bio" class="max-w-28 w-full shrink-0 font-semibold pt-2">Bio</label>
                <div class="w-full">
                    <textarea id="bio" rows="4" wire:model.blur="bio" placeholder="Ceritakan tentang dirimu"
                            class="w-full resize-none rounded-sm border border-mist-300 bg-transparent px-3 py-2 focus:outline-none focus:border-mist-700"></textarea>
                    <div class="mt-1 flex justify-between text-sm">
                        @error('bio')
                            <span class="text-red-500">{{ $message }}</span>
                        @else
                            <span></span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <label for="password" class="max-w-28 w-full shrink-0 font-semibold pt-2">Password Baru</label>
                <input type="password" id="password" rows-4 wire:model.blur="password" placeholder="Masukan password baru (Opsional)" class="w-full resize-none rounded-sm border border-mist-300 bg-transparent px-3 py-2 focus:outline-none focus:border-mist-700">
                @error('password')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @else
                <p></p>
                @enderror
            </div>


            <div class="flex gap-4">
                <label for="passwordConfirm" class="max-w-28 w-full shrink-0 font-semibold pt-2">Konfirmasi Password Baru</label>
                <input type="password" id="passwordConfirm" rows-4 wire:model.blur="password_confirmation" placeholder="Konfirmasi password" class="w-full resize-none rounded-sm border border-mist-300 bg-transparent px-3 py-2 focus:outline-none focus:border-mist-700">
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <label for="oldPassword" class="max-w-28 w-full shrink-0 font-semibold pt-2">Password Lama</label>
                <input type="password" id="password" rows-4 wire:model.blur="oldPassword" placeholder="Masukan password baru (Opsional)" class="w-full resize-none rounded-sm border border-mist-300 bg-transparent px-3 py-2 focus:outline-none focus:border-mist-700">
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>



            {{-- Aksi --}}
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ url()->previous() }}" wire:navigate
                class="bg-transparent border border-mist-300 px-3 py-1 rounded-sm text-sm font-semibold hover:bg-mist-100 duration-75">
                    Batal
                </a>
                <button type="submit" wire:loading.attr="disabled" wire:target="save,avatar"
                        class="bg-mist-700 text-mist-50 border border-mist-700 px-3 py-1 rounded-sm text-sm font-semibold hover:bg-mist-900 duration-75 cursor-pointer disabled:opacity-50">
                    <span wire:loading.remove wire:target="save">Simpan</span>
                    <span wire:loading wire:target="save">Menyimpan...</span>
                </button>
            </div>
        </div>
    </form>
</x-layout-main>