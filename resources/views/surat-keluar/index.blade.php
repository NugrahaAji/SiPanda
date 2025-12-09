<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white/80 leading-tight">
                {{ __('Surat Keluar') }}
            </h2>
            <a href="{{ route('surat-keluar.create') }}" class="bg-[#ffcc00]/25 hover:bg-[#ffcc00]/30 text-white font-bold py-2 px-4 rounded">
                Tambah Surat Keluar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[1440px] mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-800/40 border border-green-400/20 text-green-500 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tabs Navigation -->
            <div class="border-b border-gray-700 mb-6">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="me-2">
                        <button
                            onclick="showTab('daftar')"
                            id="tab-daftar"
                            class="inline-flex items-center justify-center p-4 border-b-2 border-[#ffcc00] text-[#ffcc00] rounded-t-lg font-semibold">
                            Daftar Surat Keluar
                        </button>
                    </li>
                    <li class="me-2">
                        <button
                            onclick="showTab('arus')"
                            id="tab-arus"
                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent text-white/60 rounded-t-lg font-semibold hover:text-[#ffcc00]">
                            Arus Surat Keluar
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Content Daftar -->
            <div id="content-daftar" class="tab-panel">
                <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        @if($suratKeluar->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-zinc-800">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Nomor Surat</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tanggal Surat</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tanggal Keluar</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Perihal</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tujuan</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Keterangan</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-600">
                                        @foreach($suratKeluar as $surat)
                                            <tr class="hover:bg-zinc-800/50">
                                                <td class="px-6 py-4 text-sm text-white max-w-[200px] truncate" title="{{ $surat->nomor }}">
                                                    {{ $surat->nomor }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-white whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d/m/Y') }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-white whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($surat->tanggal_keluar)->format('d/m/Y') }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-white">{{ $surat->perihal }}</td>
                                                <td class="px-6 py-4 text-sm text-white">{{ $surat->tujuan }}</td>
                                                <td class="px-6 py-4 text-sm text-white">{{ $surat->keterangan }}</td>
                                                <td class="px-6 py-4 text-sm">
                                                    <div class="flex items-center gap-3">
                                                        <a href="{{ route('surat-keluar.show', $surat) }}" class="text-blue-400 hover:text-blue-300">
                                                            View
                                                        </a>
                                                        <a href="{{ route('surat-keluar.edit', $surat) }}" class="text-yellow-400 hover:text-yellow-300">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin ingin menghapus?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $suratKeluar->links() }}
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-500 mb-4">Belum ada surat keluar</p>
                                <a href="{{ route('surat-keluar.create') }}" class="bg-[#ffcc00]/25 hover:bg-[#ffcc00]/30 text-white font-bold py-2 px-4 rounded">
                                    Tambah Surat Keluar Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Arus -->
            <div id="content-arus" class="tab-panel">
                <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        @if($arusSurat->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-zinc-800">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Nomor Surat</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tanggal Surat</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tanggal Keluar</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Perihal</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tujuan</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-600">
                                        @foreach($arusSurat as $item)
                                            <tr class="hover:bg-zinc-800/50">
                                                <td class="px-6 py-4 text-sm text-white max-w-[200px] truncate">{{$loop->iteration}}</td>
                                                <td class="px-6 py-4 text-sm text-white max-w-[200px] truncate" title="{{ $item->nomor }}">{{ $item->nomor }}</td>
                                                <td class="px-6 py-4 text-sm text-white whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 text-sm text-white whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 text-sm text-white">{{ $item->perihal }}</td>
                                                <td class="px-6 py-4 text-sm text-white max-w-[200px]">{{ $item->tujuan }}</td>
                                                <td class="px-6 py-4 text-sm text-white max-w-[60px] truncate" title="{{ $item->keterangan }}">{{ $item->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-500 mb-4">Belum ada surat keluar</p>
                                <a href="{{ route('surat-keluar.create') }}" class="bg-[#ffcc00]/25 hover:bg-[#ffcc00]/30 text-white font-bold py-2 px-4 rounded">
                                    Tambah Surat Keluar Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>
function showTab(tabName) {
    // Hide all panels
    const panels = document.querySelectorAll('.tab-panel');
    panels.forEach(panel => {
        panel.classList.add('hidden');
    });

    // Remove active from all buttons
    const buttons = document.querySelectorAll('[id^="tab-"]');
    buttons.forEach(button => {
        button.classList.remove('border-[#ffcc00]', 'text-[#ffcc00]');
        button.classList.add('border-transparent', 'text-white/60');
    });

    // Show selected panel
    document.getElementById('content-' + tabName).classList.remove('hidden');

    // Activate selected button
    const activeButton = document.getElementById('tab-' + tabName);
    activeButton.classList.remove('border-transparent', 'text-white/60');
    activeButton.classList.add('border-[#ffcc00]', 'text-[#ffcc00]');

    // Save to localStorage
    localStorage.setItem('activeTab', tabName);
}

// Load saved tab on page load
window.addEventListener('DOMContentLoaded', function() {
    const savedTab = localStorage.getItem('activeTab') || 'daftar';
    showTab(savedTab);
});
</script>
