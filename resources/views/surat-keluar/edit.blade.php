<x-app-layout header-class="bg-zinc-900">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white/80 leading-tight">
                {{ __('Edit Surat Keluar') }}
            </h2>
            <a href="{{ route('surat-keluar.index') }}" class="bg-[#ffcc00]/25 hover:bg-[#ffcc00]/30 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <div class="p-6">
                    <form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nomor" class="block text-sm font-medium text-white mb-2">Nomor Surat</label>
                            <input type="text" name="nomor" id="nomor" value="{{ old('nomor', $surat->nomor) }}"
                                class="w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('nomor') border-red-500 @enderror">
                            @error('nomor')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="tanggal_surat" class="block text-sm font-medium text-white mb-2">Tanggal Surat</label>
                                <input type="text" name="tanggal_surat" id="tanggal_surat"
                                    value="{{ old('tanggal_surat', optional($surat->tanggal_surat)->format('Y-m-d')) }}"
                                    class="js-datepicker w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('tanggal_surat') border-red-500 @enderror"
                                    placeholder="dd-mm-yyyy" autocomplete="off">
                                @error('tanggal_surat')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="tanggal_keluar" class="block text-sm font-medium text-white mb-2">Tanggal Keluar</label>
                                <input type="text" name="tanggal_keluar" id="tanggal_keluar"
                                    value="{{ old('tanggal_keluar', optional($surat->tanggal_keluar)->format('Y-m-d')) }}"
                                    class="js-datepicker w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('tanggal_keluar') border-red-500 @enderror"
                                    placeholder="dd-mm-yyyy" autocomplete="off">
                                @error('tanggal_keluar')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="progja" class="block text-sm font-medium text-white mb-2">Nama Progja</label>
                            <input type="text" name="progja" id="progja" value="{{ old('progja', $surat->progja) }}"
                                class="w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('progja') border-red-500 @enderror">
                            @error('progja')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="perihal" class="block text-sm font-medium text-white mb-2">Perihal</label>
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $surat->perihal) }}"
                                class="w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('perihal') border-red-500 @enderror">
                            @error('perihal')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="tujuan" class="block text-sm font-medium text-white mb-2">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', $surat->tujuan) }}"
                                class="w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('tujuan') border-red-500 @enderror">
                            @error('tujuan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-white mb-2">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="4"
                                class="w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $surat->keterangan) }}</textarea>
                            @error('keterangan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-white mb-2">File Surat (Opsional)</label>

                            @if($surat->file_path)
                                @php
                                    $url = asset('storage/'.$surat->file_path);
                                    $ext = strtolower(pathinfo($surat->file_path, PATHINFO_EXTENSION));
                                    $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                                    $isPdf = $ext === 'pdf';
                                @endphp

                                <div class="mb-3">
                                    <div class="flex gap-2 mb-2">
                                        <a href="{{ $url }}" target="_blank" class="bg-[#ffcc00] text-black font-semibold py-1 px-3 rounded text-sm">Buka</a>
                                        @php
                                            $downloadName = \Illuminate\Support\Str::slug(implode('-', array_filter([$surat->perihal, $surat->nomor, $surat->tujuan]))) . '.' . $ext;
                                        @endphp
                                        <a href="{{ $url }}" download="{{ $downloadName }}" class="bg-white/10 text-white font-semibold py-1 px-3 rounded text-sm">Unduh</a>
                                    </div>

                                    @if($isPdf)
                                        <div class="w-full h-[400px] bg-black/30 rounded overflow-hidden mb-3">
                                            <iframe src="{{ $url }}" class="w-full h-full" frameborder="0"></iframe>
                                        </div>
                                    @elseif($isImage)
                                        <div class="max-h-[400px] overflow-auto rounded-md border border-zinc-800 p-2 bg-black mb-3">
                                            <img src="{{ $url }}" alt="preview file" class="mx-auto max-w-full h-auto" />
                                        </div>
                                    @else
                                        <p class="text-sm">Pratinjau tidak tersedia. <a href="{{ $url }}" target="_blank" class="text-[#ffcc00] underline">Lihat / Unduh</a></p>
                                    @endif
                                </div>
                            @endif

                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx"
                                class="w-full text-white bg-zinc-800 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#ffcc00]/20 file:text-[#ffcc00] hover:file:bg-blue-100 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-white/80">Format: PDF, DOC, DOCX. Maksimal 2MB</p>
                            @error('file')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('surat-keluar.index') }}" class="bg-red-500 hover:bg-red-500/80 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" class="bg-[#ffcc00] hover:bg-[#ffcc00]/80 text-black font-bold py-2 px-4 rounded">
                                Simpan Perubahan
                            </button>
                        </div>
                        <div class="mt-4 text-xs text-white/60">
                            <div>Dibuat: {{ $surat->created_at?->format('d-m-Y H:i') ?? '-' }}</div>
                            <div>Terakhir diperbarui: {{ $surat->updated_at?->format('d-m-Y H:i') ?? '-' }}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- flatpickr dark theme + init -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.querySelectorAll('.js-datepicker').forEach(function(el){
            flatpickr(el, {
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'd-m-Y',
                altInputClass: 'flatpickr-input w-full text-white bg-zinc-800 rounded-md border-zinc-800 shadow-sm focus:border-blue-500 focus:ring-blue-500',
                allowInput: true,
            });
        });
    </script>
</x-app-layout>