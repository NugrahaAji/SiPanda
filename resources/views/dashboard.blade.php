<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white/80 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[1440px] mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Surat Masuk Card -->
                <div class="bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg hover:scale-[1.03] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-white/80">Surat Masuk</p>
                                <p class="text-3xl font-bold text-white">{{ $suratMasukCount }}</p>
                            </div>
                            <div class="p-3 bg-[#FFCC00]/10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-[#ffcc00]"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"><path stroke-linecap="round" d="M22 12.5c0-.491-.005-1.483-.016-1.976c-.065-3.065-.098-4.598-1.229-5.733c-1.131-1.136-2.705-1.175-5.854-1.254a115 115 0 0 0-5.802 0c-3.149.079-4.723.118-5.854 1.254c-1.131 1.135-1.164 2.668-1.23 5.733a69 69 0 0 0 0 2.952c.066 3.065.099 4.598 1.23 5.733c1.131 1.136 2.705 1.175 5.854 1.254q1.204.03 2.401.036"/><path d="m2 6l6.913 3.925c2.526 1.433 3.648 1.433 6.174 0L22 6"/><path stroke-linecap="round" d="M14 17.5h8m-8 0c0-.7 1.994-2.008 2.5-2.5M14 17.5c0 .7 1.994 2.009 2.5 2.5"/></g></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Keluar Card -->
                <div class="bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg hover:scale-[1.03] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-white/80">Surat Keluar</p>
                                <p class="text-3xl font-bold text-white">{{ $suratKeluarCount }}</p>
                            </div>
                            <div class="p-3 bg-[#ffcc00]/10 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-[#ffcc00]"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 14L21 3m0 0l-6.5 18a.55.55 0 0 1-1 0L10 14l-7-3.5a.55.55 0 0 1 0-1z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Arsip Card -->
                <div class="bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg hover:scale-[1.03] transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-white/80">Arsip</p>
                                <p class="text-3xl font-bold text-white">{{ $arsipCount }}</p>
                            </div>
                            <div class="p-3 bg-[#ffcc00]/10 rounded-full">
                                <svg class="w-8 h-8 text-[#ffcc00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arsip Surat Table -->
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Arsip Surat</h3>
                    <p class="text-sm text-white/80 mb-4">Daftar surat yang sudah diarsipkan</p>

                    @if($arsipList->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-600 rounded-lg">
                                <thead class="bg-zinc-800">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nomor</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Jenis Surat</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Perihal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tujuan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Keterangan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-zinc-900 divide-y divide-gray-600">
                                    @foreach($arsipList as $arsip)
                                        <tr>
                                            <!-- Nomor -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white max-w-[200px] truncate"
                                                title="{{ $arsip->nomor }}">
                                                {{ $arsip->nomor }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white max-w-[200px] truncate"
                                                title="{{ $arsip->nomor }}">
                                                {{ $arsip->tipe_surat }}
                                            </td>

                                            <!-- Tanggal -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                @if(isset($arsip->tanggal_surat))
                                                    {{ \Carbon\Carbon::parse($arsip->tanggal_surat)->format('d/m/Y') }}
                                                @elseif(isset($arsip->tanggal_keluar))
                                                    {{ \Carbon\Carbon::parse($arsip->tanggal_keluar)->format('d/m/Y') }}
                                                @elseif(isset($arsip->tanggal_masuk))
                                                    {{ \Carbon\Carbon::parse($arsip->tanggal_masuk)->format('d/m/Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <!-- Perihal -->
                                            <td class="px-6 py-4 text-sm text-white">
                                                {{ Str::limit($arsip->perihal, 50) }}
                                            </td>

                                            <!-- Tujuan -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $arsip->tujuan ?? '-' }}
                                            </td>

                                            <!-- Keterangan -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $arsip->keterangan ?? '-' }}
                                            </td>

                                            <!-- Aksi -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if(isset($arsip->file_path) && $arsip->file_path)
                                                    <a href="{{ Storage::url($arsip->file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">Tidak ada file</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada arsip</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
