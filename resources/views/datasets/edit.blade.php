<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Dataset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('datasets.update', $dataset->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Bagian Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Dataset</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $dataset->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="data_type" class="form-label">Data Type</label>
                                <select name="data_type" id="data_type" class="form-control" required>
                                    <option value="" disabled>Select Data Type</option>
                                    <option value="text" {{ $dataset->data_type == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="image" {{ $dataset->data_type == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ $dataset->data_type == 'video' ? 'selected' : '' }}>Video</option>
                                    <option value="audio" {{ $dataset->data_type == 'audio' ? 'selected' : '' }}>Audio</option>
                                    <option value="csv" {{ $dataset->data_type == 'csv' ? 'selected' : '' }}>CSV</option>
                                    <option value="json" {{ $dataset->data_type == 'json' ? 'selected' : '' }}>JSON</option>
                                    <!-- Add other options as needed -->
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ $dataset->description }}</textarea>
                            </div>
                        </div>

                        <!-- Bagian Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documentation" class="form-label">Dokumentasi</label>
                                <textarea name="documentation" id="documentation" class="form-control" rows="4">{{ $dataset->documentation }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="source_url" class="form-label">Sumber URL</label>
                                <input type="text" name="source_url" id="source_url" class="form-control" value="{{ $dataset->source_url }}">
                            </div>

                            <div class="form-group">
                                <label for="contributor_name" class="form-label">Nama Kontributor</label>
                                <input type="text" name="contributor_name" id="contributor_name" class="form-control" value="{{ $dataset->contributor_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contributor_email" class="form-label">Email Kontributor</label>
                                <input type="email" name="contributor_email" id="contributor_email" class="form-control" value="{{ $dataset->contributor_email }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
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
