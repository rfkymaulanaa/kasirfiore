<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">{{ isset($user) ? 'Edit User' : 'Tambah User' }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5 ">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full p-6">
                        <form method="POST"
                            action="{{ isset($user) ? route('user.update', $user) : route('user.store') }}">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif
                            <div class="grid gap-6 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                        <i class="fas fa-user mr-2"></i>Username
                                    </label>
                                    <input type="text" name="username" value="{{ $user->username ?? '' }}"
                                        id="username"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan username Anda">
                                    @error('username')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                    <i class="fas fa-envelope mr-2"></i>Email</label>
                                    <input type="email" name="email" value="{{ $user->email ?? '' }}" id="email"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan email Anda">
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-pink-800">
                                    <i class="fas fa-lock mr-2"></i>Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300">
                                </div>
                                <div class="w-full">
                                    <label for="nama_lengkap"
                                        class="block mb-2 text-sm font-medium text-pink-800 mt-4">
                                        <i class="fas fa-lock mr-2"></i>Nama Lengkap
                                    </label>
                                    <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}"
                                        id="nama_lengkap"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                        placeholder="Masukkan nama lengkap Anda">
                                    @error('nama_lengkap')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="role"
                                        class="block mb-2 text-sm font-medium text-pink-800  mt-4">
                                        <i class="fas fa-lock mr-2"></i>Role
                                    </label>
                                    <select name="role" id="role"
                                        class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300">
                                        <option value="" disabled selected>- Pilih role Anda -</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-pink-100">
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg hover:from-pink-600 hover:to-pink-700 focus:ring-4 focus:ring-pink-200 transition-all duration-200 shadow-md hover:shadow-lg">
                                <i class="fas fa-save mr-2"></i>{{ isset($user) ? 'Simpan Perubahan' : 'Simpan User' }}
                                </button>

                                <a href="{{ route('user.index') }}" 
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-pink-600 bg-pink-100 border border-pink-200 rounded-lg hover:bg-pink-200 focus:ring-4 focus:ring-pink-200 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
