<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Edit Surat Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('surat-masuk.update', $suratMasuk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-white mb-2">Nomor Surat</label>
                            <input type="text" name="nomor" id="nomor" value="{{ old('nomor', $suratMasuk->nomor) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nomor') border-red-500 @enderror">
                            @error('nomor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="pengirim" class="block text-sm font-medium text-white mb-2">Nama Pengirim</label>
                            <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim', $suratMasuk->pengirim) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('pengirim') border-red-500 @enderror">
                            @error('pengirim')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="perihal" class="block text-sm font-medium text-white mb-2">Perihal</label>
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $suratMasuk->perihal) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('perihal') border-red-500 @enderror">
                            @error('perihal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tujuan" class="block text-sm font-medium text-white mb-2">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', $suratMasuk->tujuan) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tujuan') border-red-500 @enderror">
                            @error('tujuan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-white mb-2">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $suratMasuk->keterangan) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror">
                            @error('keterangan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-sm font-medium text-white mb-2">Tanggal</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $suratMasuk->tanggal_masuk) }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal_masuk') border-red-500 @enderror">
                            @error('tanggal_masuk')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-white mb-2">File Surat (Opsional)</label>

                            @if($suratMasuk->file)
                                <div class="mb-3 p-3 bg-zinc-800 rounded-md border border-zinc-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-[#ffcc00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm text-white/80">File saat ini: {{ basename($suratMasuk->file) }}</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('surat-masuk.view-file', $suratMasuk->id) }}" target="_blank"
                                                class="text-xs text-blue-400 hover:text-blue-300">
                                                Lihat
                                            </a>
                                            <span class="text-white/30">|</span>
                                            <a href="{{ route('surat-masuk.download', $suratMasuk->id) }}"
                                                class="text-xs text-green-400 hover:text-green-300">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx"
                                class="bg-black w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#ffcc00]/20 file:text-[#ffcc00] hover:file:bg-[#ffcc00]/30 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-white/80">
                                @if($suratMasuk->file)
                                    Upload file baru untuk mengganti file yang ada. Format: PDF, DOC, DOCX. Maksimal 2MB
                                @else
                                    Format: PDF, DOC, DOCX. Maksimal 2MB
                                @endif
                            </p>
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('surat-masuk.index') }}" class="bg-red-600 hover:bg-red-600/90 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-[#ffcc00] hover:bg-[#ffcc00]/80 text-black font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
