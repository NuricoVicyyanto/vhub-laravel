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
                    <form action="{{ route('datasets.updateStatus', $dataset->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama Dataset</label>
                                    <input type="text" name="name" class="form-control" value="{{ $dataset->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" readonly>{{ $dataset->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="data_type" class="form-label">Jenis Data</label>
                                    <input type="text" name="data_type" class="form-control" value="{{ $dataset->data_type }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="documentation" class="form-label">Dokumentasi</label>
                                    <textarea name="documentation" class="form-control" readonly>{{ $dataset->documentation }}</textarea>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="source_url" class="form-label">Sumber URL</label>
                                    <input type="text" name="source_url" class="form-control" value="{{ $dataset->source_url }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="contributor_name" class="form-label">Nama Kontributor</label>
                                    <input type="text" name="contributor_name" class="form-control" value="{{ $dataset->contributor_name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="contributor_email" class="form-label">Email Kontributor</label>
                                    <input type="email" name="contributor_email" class="form-control" value="{{ $dataset->contributor_email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="form-label">Status Dataset</label>
                                    <select name="status" class="form-control">
                                        <option value="pending" {{ $dataset->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $dataset->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $dataset->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success w-100">Update Status</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
