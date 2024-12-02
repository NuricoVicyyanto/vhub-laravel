<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dataset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">

                    <!-- Tombol Tambah Dataset -->

                    <a href="{{ route('datasets.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Dataset
                    </a>


                    <!-- Tabel Dataset -->
                    <table class="table table-striped table-bordered datatable w-100">
                        <thead>
                            <tr>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">Tipe Data</th>
                                <th class="py-2 px-4">Kontributor</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datasets as $dataset)
                                <tr>
                                    <td class="py-2 px-4">{{ $dataset->name }}</td>
                                    <td class="py-2 px-4">{{ $dataset->data_type }}</td>
                                    <td class="py-2 px-4">{{ $dataset->contributor_name }}</td>
                                    <td class="py-2 px-4">{{ $dataset->status }}</td>
                                    <td class="py-2 px-4">
                                        <!-- Menu Aksi hanya untuk Superadmin -->
                                        @role('superadmin')
                                            <a href="{{ route('datasets.edit', $dataset->id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <i class="fas fa-edit"></i> Edit
                                            </a> |
                                            <a href="{{ route('datasets.review', $dataset->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> Review
                                            </a> |
                                            <form action="{{ route('datasets.destroy', $dataset->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        @endrole
                                        <!-- Tampilkan teks jika bukan Superadmin -->
                                        @unlessrole('superadmin')
                                            <span class="text-muted">Aksi tidak tersedia</span>
                                        @endunlessrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Pastikan Bootstrap, Font Awesome, dan DataTables CDN ditambahkan -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                // Pengaturan DataTables
                "paging": true,
                "searching": true, // Pastikan pencarian diaktifkan
                "ordering": true,
                "info": true,
                "lengthChange": false,
                "pageLength": 10, // Menentukan jumlah baris per halaman
                "language": {
                    "search": "Cari Dataset:", // Ubah label pencarian jika diperlukan
                }
            });
        });
    </script>
@endpush
