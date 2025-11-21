<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Tambah Surat Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-white mb-2">Nomor Surat</label>
                            <input type="text" name="nomor" id="nomor" value="{{ old('nomor') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nomor') border-red-500 @enderror">
                            @error('nomor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="progja" class="block text-sm font-medium text-white mb-2">Nama Progja</label>
                            <input type="text" name="progja" id="progja" value="{{ old('progja') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('progja') border-red-500 @enderror">
                            @error('progja')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="tanggal_surat" class="block text-sm font-medium text-white mb-2">Tanggal surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal_surat') border-red-500 @enderror">
                            @error('tanggal_surat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_keluar" class="block text-sm font-medium text-white mb-2">Tanggal keluar</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal_keluar') border-red-500 @enderror">
                            @error('tanggal_keluar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="perihal" class="block text-sm font-medium text-white mb-2">Perihal</label>
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('perihal') border-red-500 @enderror">
                            @error('perihal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tujuan" class="block text-sm font-medium text-white mb-2">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan') }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tujuan') border-red-500 @enderror">
                            @error('tujuan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-white mb-2">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="4"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-white mb-2">File Surat (Opsional)</label>
                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx"
                                class="w-full text-white bg-black text-sm text-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#ffcc00]/20 file:text-[#ffcc00] hover:file:bg-blue-100 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-white/80">Format: PDF, DOC, DOCX. Maksimal 2MB</p>
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('surat-keluar.index') }}" class="bg-red-500 hover:bg-red-500/80 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-[#ffcc00] hover:bg-[#ffcc00]/80 text-black font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
