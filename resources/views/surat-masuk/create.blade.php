<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Tambah Surat Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-white mb-2">Nomor Surat</label>
                            <input type="text" name="nomor" id="nomor" value="{{ old('nomor') }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nomor') border-red-500 @enderror">
                            @error('nomor')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-white mb-2">Nama Pengirim</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nama') border-red-500 @enderror">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jenis" class="block text-sm font-medium text-white mb-2">Jenis Surat</label>
                            <select name="jenis" id="jenis"
                                class="w-full text-white bg-black rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('jenis') border-red-500 @enderror">
                                <option value="">Pilih Jenis Surat</option>
                                <option value="Undangan" {{ old('jenis') == 'Undangan' ? 'selected' : '' }}>Undangan</option>
                                <option value="Pemberitahuan" {{ old('jenis') == 'Pemberitahuan' ? 'selected' : '' }}>Pemberitahuan</option>
                                <option value="Permohonan" {{ old('jenis') == 'Permohonan' ? 'selected' : '' }}>Permohonan</option>
                                <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('jenis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="perihal" class="block text-sm font-medium text-white mb-2">Perihal</label>
                            <textarea name="perihal" id="perihal" rows="4"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('perihal') border-red-500 @enderror">{{ old('perihal') }}</textarea>
                            @error('perihal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-white mb-2">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                                class="bg-black w-full text-white rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tanggal') border-red-500 @enderror">
                            @error('tanggal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-white mb-2">File Surat (Opsional)</label>
                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx"
                                class="bg-black w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#ffcc00]/20 file:text-[#ffcc00] hover:file:bg-blue-100 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-white/80">Format: PDF, DOC, DOCX. Maksimal 2MB</p>
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('surat-masuk.index') }}" class="bg-red-600 hover:bg-red-600/90 text-white font-bold py-2 px-4 rounded">
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
