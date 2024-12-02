<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dataset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('datasets.store') }}" method="POST">
                    @csrf

                    <!-- Row untuk dua kolom -->
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Dataset</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="data_type" class="form-label">Data Type</label>
                                <select name="data_type" class="form-control" required>
                                    <option value="" disabled selected>Select Data Type</option>
                                    <option value="text">Text</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="csv">CSV</option>
                                    <option value="json">JSON</option>
                                    <!-- Add other options as needed -->
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentation" class="form-label">Dokumentasi</label>
                                <textarea name="documentation" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="source_url" class="form-label">Sumber URL</label>
                                <input type="text" name="source_url" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="contributor_name" class="form-label">Nama Kontributor</label>
                                <input type="text" name="contributor_name" class="form-control" value="{{ Auth::user()->name }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="contributor_email" class="form-label">Email Kontributor</label>
                                <input type="email" name="contributor_email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Pastikan Bootstrap CDN ditambahkan di dalam file layout Blade utama Anda -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
