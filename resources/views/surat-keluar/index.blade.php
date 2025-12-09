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
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex items-center gap-4">
                                                    <a href="{{ route('surat-keluar.show', $surat) }}" class="text-blue-600 hover:text-blue-900"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3.275 15.296C2.425 14.192 2 13.639 2 12c0-1.64.425-2.191 1.275-3.296C4.972 6.5 7.818 4 12 4s7.028 2.5 8.725 4.704C21.575 9.81 22 10.361 22 12c0 1.64-.425 2.191-1.275 3.296C19.028 17.5 16.182 20 12 20s-7.028-2.5-8.725-4.704Z"/><path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z"/></g></svg></a>
                                                    <a href="{{ route('surat-keluar.edit', $surat) }}" class="text-yellow-600 hover:text-yellow-900"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m5 16l-1 4l4-1L19.586 7.414a2 2 0 0 0 0-2.828l-.172-.172a2 2 0 0 0-2.828 0zM15 6l3 3m-5 11h8"/></svg></a>
                                                    <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m19.5 5.5l-.62 10.025c-.158 2.561-.237 3.842-.88 4.763a4 4 0 0 1-1.2 1.128c-.957.584-2.24.584-4.806.584c-2.57 0-3.855 0-4.814-.585a4 4 0 0 1-1.2-1.13c-.642-.922-.72-2.205-.874-4.77L4.5 5.5M3 5.5h18m-4.944 0l-.683-1.408c-.453-.936-.68-1.403-1.071-1.695a2 2 0 0 0-.275-.172C13.594 2 13.074 2 12.035 2c-1.066 0-1.599 0-2.04.234a2 2 0 0 0-.278.18c-.395.303-.616.788-1.058 1.757L8.053 5.5"/></svg></button>
                                                    </form>
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
