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
                    <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-white mb-2">Nomor Surat</label>
                            <input type="text" name="nomor" id="nomor" value="{{ old('nomor', $surat->nomor) }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nomor') border-red-500 @enderror">
                            @error('nomor')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-sm font-medium text-white mb-2">Tanggal Surat</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                value="{{ old('tanggal_masuk', $surat->tanggal_masuk?->format('Y-m-d')) }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal_masuk') border-red-500 @enderror">
                            @error('tanggal_masuk')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="pengirim" class="block text-sm font-medium text-white mb-2">Pengirim</label>
                            <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim', $surat->pengirim) }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('pengirim') border-red-500 @enderror">
                            @error('pengirim')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="perihal" class="block text-sm font-medium text-white mb-2">Perihal</label>
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $surat->perihal) }}"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('perihal') border-red-500 @enderror">
                            @error('perihal')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-white mb-2">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="4"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $surat->keterangan) }}</textarea>
                            @error('keterangan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-white mb-2">File Surat (Opsional)</label>
                            @if($surat->file_path)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/'.$surat->file_path) }}" target="_blank" class="text-sm text-[#ffcc00] underline">Lihat file saat ini</a>
                                </div>
                            @endif
                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.jpg,.png"
                                class="w-full text-white bg-black text-sm text-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#ffcc00]/20 file:text-[#ffcc00] hover:file:bg-blue-100 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-white/80">Format: PDF, DOC, DOCX, JPG, PNG. Maksimal 2MB</p>
                            @error('file')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('surat-masuk.index') }}" class="bg-red-500 hover:bg-red-500/80 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-[#ffcc00] hover:bg-[#ffcc00]/80 text-black font-bold py-2 px-4 rounded">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>