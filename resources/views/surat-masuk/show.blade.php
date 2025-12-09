<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Detail Surat Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="space-y-4 text-white/90">
                        <div>
                            <h3 class="text-sm font-medium text-white/80">Nomor Surat</h3>
                            <p class="mt-1">{{ $suratMasuk->nomor }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Tanggal Masuk</h3>
                            <p class="mt-1">{{ optional($suratMasuk->tanggal_masuk)->format('d M Y') ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Pengirim</h3>
                            <p class="mt-1">{{ $suratMasuk->pengirim ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Perihal</h3>
                            <p class="mt-1">{{ $suratMasuk->perihal ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Tujuan</h3>
                            <p class="mt-1">{{ $suratMasuk->tujuan ?? '-' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-white/80">Keterangan</h3>
                            <p class="mt-1 whitespace-pre-line">{{ $suratMasuk->keterangan ?? '-' }}</p>
                        </div>

                        @if($suratMasuk->file_path)
                            @php
                                $url = asset('storage/'.$suratMasuk->file_path);
                                $ext = strtolower(pathinfo($suratMasuk->file_path, PATHINFO_EXTENSION));
                                $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                                $isPdf = $ext === 'pdf';
                            @endphp

                            <div>
                                <h3 class="text-sm font-medium text-white/80">File</h3>
                                <div class="mt-2">
                                    <div class="mb-2 flex gap-2">
                                        <a href="{{ $url }}" target="_blank" class="bg-[#ffcc00] text-black font-semibold py-1 px-3 rounded text-sm">Buka di tab baru</a>
                                        @php
                                            $downloadName = \Illuminate\Support\Str::slug(implode('-', array_filter([$suratMasuk->perihal, $suratMasuk->nomor, $suratMasuk->tujuan]))) . '.' . $ext;
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

                        <div class="flex items-center justify-end space-x-4 mt-6">
                            <a href="{{ route('surat-masuk.index') }}" class="text-gray-400 hover:text-gray-300" title="Kembali">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 8l-7 7m0 0l7 7m-7-7h16"/></svg>
                            </a>

                            <a href="{{ route('surat-masuk.edit', $suratMasuk) }}" class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0zM15 6l3 3m-5 11h8"/></svg>
                            </a>

                            <form action="{{ route('surat-masuk.destroy', $suratMasuk) }}" method="POST" onsubmit="return confirm('Hapus surat ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m19.5 5.5l-.62 10.025c-.158 2.561-.237 3.842-.88 4.763a4 4 0 0 1-1.2 1.128c-.957.584-2.24.584-4.806.584c-2.57 0-3.855 0-4.814-.585a4 4 0 0 1-1.2-1.13c-.642-.922-.72-2.205-.874-4.77L4.5 5.5M3 5.5h18m-4.944 0l-.683-1.408c-.453-.936-.68-1.403-1.071-1.695a2 2 0 0 0-.275-.172C13.594 2 13.074 2 12.035 2c-1.066 0-1.599 0-2.04.234a2 2 0 0 0-.278.18c-.395.303-.616.788-1.058 1.757L8.053 5.5"/></svg>
                                </button>
                            </form>
                        </div>

                        <div class="mt-4 text-xs text-white/60">
                            <div>Dibuat: {{ $suratMasuk->created_at?->format('d M Y H:i') }}</div>
                            <div>Terakhir diperbarui: {{ $suratMasuk->updated_at?->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>