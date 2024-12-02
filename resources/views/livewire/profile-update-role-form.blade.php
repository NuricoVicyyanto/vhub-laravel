<div>
    @if(Auth::user()->hasRole('superadmin'))
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-section-title>
            <x-slot name="title">Manajemen Role Pengguna</x-slot>
            <x-slot name="description">Ubah role pengguna yang ada di sistem</x-slot>
        </x-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="updateUserRole">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="user" class="block text-sm font-medium text-gray-700">Pilih Pengguna</label>
                                <select 
                                    wire:model="selectedUser" 
                                    id="user" 
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option value="">Pilih Pengguna</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} ({{ $user->email }}) - Peran Saat Ini: {{ $user->roles->pluck('name')->implode(', ') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('selectedUser') 
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="role" class="block text-sm font-medium text-gray-700">Pilih Role Baru</label>
                                <select 
                                    wire:model="selectedRole" 
                                    id="role" 
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option value="">Pilih Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedRole') 
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Perbarui Role
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>