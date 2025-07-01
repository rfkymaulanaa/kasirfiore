<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">{{ __('Detail User') }}
        </h2>
    </x-slot>

    <section class="p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden border border-pink-100">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full">
                        <div class="gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="nama_lengkap"
                                    class="block mb-2 text-sm font-medium text-pink-800 ">Nama
                                    Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap ?? '' }}"
                                    id="nama_lengkap"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                    readonly>
                            </div>
                            <div class="w-full">
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-pink-800  mt-4">Username</label>
                                <input type="text" name="username" value="{{ $user->username ?? '' }}" id="username"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300 "
                                    readonly>
                            </div>
                            <div class="w-full">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-pink-800  mt-4">Email</label>
                                <input type="email" name="email" value="{{ $user->email ?? '' }}" id="email"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300 "
                                    readonly>
                            </div>
                            <div class="w-full">
                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-pink-800  mt-4">Role</label>
                                <input type="text" name="role" value="{{ $user->role ?? '' }}" id="role"
                                    class="bg-pink-50 border border-pink-200 text-pink-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition-all duration-200 hover:border-pink-300"
                                    readonly>
                            </div>

                            <a href="{{ route('user.index') }}" 
                                class="mb-2 mt-4 inline-flex items-center px-6 py-3 text-sm font-medium text-pink-600 bg-pink-100 border border-pink-200 rounded-lg hover:bg-pink-200 focus:ring-4 focus:ring-pink-200 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
