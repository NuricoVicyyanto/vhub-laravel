<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Illuminate\Http\Request;
use App\Http\Resources\DatasetResource;

class DatasetController extends Controller
{
    // Get all datasets
    public function index()
    {
        $datasets = Dataset::all();
        return DatasetResource::collection(Dataset::all());
    }


    // Get a specific dataset by ID
    public function show($id)
    {
        $dataset = Dataset::findOrFail($id);
        return new DatasetResource($dataset);
    }
}
