<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Detail Surat Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="space-y-4 text-white/90">
                        <div>
                            <h3 class="text-sm font-medium text-white/80">Nomor Surat</h3>
                            <p class="mt-1">{{ $suratKeluar->nomor ?? '-' }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-white/80">Tanggal Surat</h3>
                                <p class="mt-1">{{ optional($suratKeluar->tanggal_surat)->format('d M Y') ?? '-' }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-white/80">Tanggal Keluar</h3>
                                <p class="mt-1">{{ optional($suratKeluar->tanggal_keluar)->format('d M Y') ?? '-' }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Nama Progja</h3>
                            <p class="mt-1">{{ $suratKeluar->progja ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Perihal</h3>
                            <p class="mt-1">{{ $suratKeluar->perihal ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Tujuan</h3>
                            <p class="mt-1">{{ $suratKeluar->tujuan ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Keterangan</h3>
                            <p class="mt-1 whitespace-pre-line">{{ $suratKeluar->keterangan ?? '-' }}</p>
                        </div>

                        @if($suratKeluar->file_path)
                            @php
                                $url = asset('storage/'.$suratKeluar->file_path);
                                $ext = strtolower(pathinfo($suratKeluar->file_path, PATHINFO_EXTENSION));
                                $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                                $isPdf = $ext === 'pdf';
                            @endphp

                            <div>
                                <h3 class="text-sm font-medium text-white/80">File</h3>
                                <div class="mt-2">
                                    <div class="mb-2 flex gap-2">
                                        <a href="{{ $url }}" target="_blank" class="bg-[#ffcc00] text-black font-semibold py-1 px-3 rounded text-sm">Buka di tab baru</a>
                                        @php
                                            $downloadName = \Illuminate\Support\Str::slug(implode('-', array_filter([$suratKeluar->perihal, $suratKeluar->nomor, $suratKeluar->tujuan]))) . '.' . $ext;
                                        @endphp
                                        <a href="{{ $url }}" download="{{ $downloadName }}" class="bg-white/10 text-white font-semibold py-1 px-3 rounded text-sm">Unduh</a>
                                    </div>

                                    @if($isPdf)
                                        <div class="w-full h-[700px] bg-black/30 rounded overflow-hidden">
                                            <iframe src="{{ $url }}" class="w-full h-full" frameborder="0"></iframe>
                                        </div>
                                    @elseif($isImage)
                                        <div class="max-h-[600px] overflow-auto rounded-md border border-zinc-800 p-2 bg-black">
                                            <img src="{{ $url }}" alt="preview file" class="mx-auto max-w-full h-auto" />
                                        </div>
                                    @else
                                        <p class="text-sm">Pratinjau tidak tersedia untuk tipe file ini. <a href="{{ $url }}" target="_blank" class="text-[#ffcc00] underline">Lihat / Unduh</a></p>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center justify-end space-x-3 mt-6">
                            <a href="{{ route('surat-keluar.index') }}" class="bg-red-500 hover:bg-red-500/80 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>

                            <a href="{{ route('surat-keluar.edit', $suratKeluar) }}" class="bg-[#ffcc00] hover:bg-[#ffcc00]/80 text-black font-bold py-2 px-4 rounded">
                                Edit
                            </a>

                            <form action="{{ route('surat-keluar.destroy', $suratKeluar) }}" method="POST" onsubmit="return confirm('Hapus surat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 hover:bg-red-700/80 text-white font-bold py-2 px-4 rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>

                        <div class="mt-4 text-xs text-white/60">
                            <div>Dibuat: {{ $suratKeluar->created_at?->format('d M Y H:i') }}</div>
                            <div>Terakhir diperbarui: {{ $suratKeluar->updated_at?->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>