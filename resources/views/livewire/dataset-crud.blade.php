<div>
    <h1>Kelola Dataset</h1>

    <form wire:submit.prevent="store">
        <input type="hidden" wire:model="datasetId">
        <div>
            <label>Nama Dataset:</label>
            <input type="text" wire:model="name">
        </div>
        <div>
            <label>Jenis Data:</label>
            <input type="text" wire:model="data_type">
        </div>
        <div>
            <label>Deskripsi:</label>
            <textarea wire:model="description"></textarea>
        </div>
        <div>
            <label>Dokumentasi:</label>
            <input type="text" wire:model="documentation">
        </div>
        <div>
            <label>URL Sumber:</label>
            <input type="text" wire:model="source_url">
        </div>
        <div>
            <label>Nama Kontributor:</label>
            <input type="text" wire:model="contributor_name">
        </div>
        <div>
            <label>Email Kontributor:</label>
            <input type="email" wire:model="contributor_email">
        </div>
        <button type="submit">Simpan</button>
    </form>

    <h2>Daftar Dataset</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe Data</th>
                <th>Kontributor</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasets as $dataset)
            <tr>
                <td>{{ $dataset->name }}</td>
                <td>{{ $dataset->data_type }}</td>
                <td>{{ $dataset->contributor_name }}</td>
                <td>{{ $dataset->status }}</td>
                <td>
                    <button wire:click="edit({{ $dataset->id }})">Edit</button>
                    <button wire:click="delete({{ $dataset->id }})">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
