<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ isset($user) ? 'Edit User' : 'Tambah User' }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full">
                        <form method="POST"
                            action="{{ isset($user) ? route('user.update', $user) : route('user.store') }}">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif
                            <div class="gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" name="username" value="{{ $user->username ?? '' }}"
                                        id="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Masukkan username Anda">
                                    @error('username')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900  mt-4">Email</label>
                                    <input type="email" name="email" value="{{ $user->email ?? '' }}" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Masukkan email Anda">
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900  mt-4">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                </div>
                                <div class="w-full">
                                    <label for="nama_lengkap"
                                        class="block mb-2 text-sm font-medium text-gray-900 mt-4">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}"
                                        id="nama_lengkap"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Masukkan nama lengkap Anda">
                                    @error('nama_lengkap')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="role"
                                        class="block mb-2 text-sm font-medium text-gray-900  mt-4">Role</label>
                                    <select name="role" id="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                        <option value="" disabled selected>- Pilih role Anda -</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                                {{ isset($user) ? 'Simpan Perubahan' : 'Simpan User' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
