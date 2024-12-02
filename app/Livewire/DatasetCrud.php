<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dataset;

class DatasetCrud extends Component
{
    public $datasets, $datasetId, $name, $description, $data_type, $documentation, $source_url, $status, $contributor_name, $contributor_email;

    public function render()
    {
        $this->datasets = Dataset::all();
        return view('livewire.dataset-crud');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->data_type = '';
        $this->documentation = '';
        $this->source_url = '';
        $this->status = 'pending';
        $this->contributor_name = '';
        $this->contributor_email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'data_type' => 'required',
            'contributor_name' => 'required',
        ]);

        Dataset::create([
            'name' => $this->name,
            'description' => $this->description,
            'data_type' => $this->data_type,
            'documentation' => $this->documentation,
            'source_url' => $this->source_url,
            'status' => $this->status,
            'contributor_name' => $this->contributor_name,
            'contributor_email' => $this->contributor_email,
        ]);

        session()->flash('message', 'Dataset berhasil ditambahkan.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $dataset = Dataset::find($id);
        $this->datasetId = $dataset->id;
        $this->name = $dataset->name;
        $this->description = $dataset->description;
        $this->data_type = $dataset->data_type;
        $this->documentation = $dataset->documentation;
        $this->source_url = $dataset->source_url;
        $this->status = $dataset->status;
        $this->contributor_name = $dataset->contributor_name;
        $this->contributor_email = $dataset->contributor_email;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'data_type' => 'required',
            'contributor_name' => 'required',
        ]);

        $dataset = Dataset::find($this->datasetId);
        $dataset->update([
            'name' => $this->name,
            'description' => $this->description,
            'data_type' => $this->data_type,
            'documentation' => $this->documentation,
            'source_url' => $this->source_url,
            'status' => $this->status,
            'contributor_name' => $this->contributor_name,
            'contributor_email' => $this->contributor_email,
        ]);

        session()->flash('message', 'Dataset berhasil diperbarui.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Dataset::find($id)->delete();
        session()->flash('message', 'Dataset berhasil dihapus.');
    }
}
