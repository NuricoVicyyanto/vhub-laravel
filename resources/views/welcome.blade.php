<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Hub - Open Data Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        #datasetsTable thead {
            background-color: #2c3e50;
            color: white;
        }

        .btn-view {
            background-color: #3498db;
            color: white;
        }

        .btn-view:hover {
            background-color: #2980b9;
        }

        .info-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contribute-section {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <header class="text-center mb-5">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('img/logo.jpeg') }}" alt="V-Hub Logo" class="img-fluid mb-3"
                    style="max-width: 150px; height: auto;">
                <h3 class="display-5">Open Data Platform</h3>
                <p class="text-muted">Discover, Share, and Collaborate on Datasets</p>
            </div>
        </header>


        <div class="row">
            <!-- Main content (Datasets) -->
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body p-2"> <!-- Reduced padding -->
                        <div class="table-responsive"> <!-- Added table-responsive class for scrollable table on small screens -->
                            <table id="datasetsTable" class="table table-hover table-sm"> <!-- Added table-sm for more compact table -->
                                <thead>
                                    <tr>
                                        <th style="min-width: 80px;">Type</th> <!-- Set a minimum width -->
                                        <th style="min-width: 120px;">Name</th> <!-- Set a minimum width -->
                                        <th style="min-width: 150px;">Description</th> <!-- Set a minimum width -->
                                        <th style="min-width: 100px;">Contributor</th> <!-- Set a minimum width -->
                                        <th style="min-width: 100px;">Verified</th> <!-- Set a minimum width -->
                                        <th style="min-width: 100px;">Actions</th> <!-- Set a minimum width -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datasets as $dataset)
                                        <tr>
                                            <td class="text-center">
                                                @switch($dataset->data_type)
                                                    @case('text')
                                                        <i class="fas fa-font"></i> Text
                                                        @break
                                                    @case('image')
                                                        <i class="fas fa-image"></i> Image
                                                        @break
                                                    @case('video')
                                                        <i class="fas fa-video"></i> Video
                                                        @break
                                                    @case('audio')
                                                        <i class="fas fa-microphone"></i> Audio
                                                        @break
                                                    @case('csv')
                                                        <i class="fas fa-file-csv"></i> CSV
                                                        @break
                                                    @case('json')
                                                        <i class="fas fa-file-code"></i> JSON
                                                        @break
                                                    @default
                                                        <i class="fas fa-question-circle"></i> Unknown
                                                @endswitch
                                            </td>

                                            <td class="text-truncate" style="max-width: 120px;">{{ $dataset->name }}</td> <!-- Truncated text for compactness -->
                                            <td class="text-truncate" style="max-width: 150px;">{{ Str::limit($dataset->description, 50) }}</td> <!-- Reduced description length -->
                                            <td>{{ $dataset->contributor_name }}</td>
                                            <td class="text-center">
                                                @if ($dataset->status == 'approved')
                                                    <i class="fas fa-check-circle text-success"></i>
                                                @else
                                                    <i class="fas fa-times-circle text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm"> <!-- Smaller buttons -->
                                                    <a href="#" class="btn btn-view btn-sm">Docs</a>
                                                    <a href="{{ $dataset->source_url }}" target="_blank" class="btn btn-outline-primary btn-sm">Source</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Contribute and Info) -->
            <div class="col-md-4 col-sm-12 mt-3 mt-sm-0">
                <div class="contribute-section mb-3">
                    <h4 class="mb-2 fs-5"><i class="fas fa-upload me-2"></i>Contribute Datasets</h4>
                    <p class="mb-2 fs-6">Help expand our community knowledge base by sharing your datasets.</p>
                    @auth
                        <a href="{{ route('datasets.create') }}" class="btn btn-primary w-100 btn-sm">
                            <i class="fas fa-plus me-2"></i>Upload New Dataset
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 btn-sm">
                            <i class="fas fa-sign-in-alt me-2"></i>Login to Contribute
                        </a>
                    @endauth
                </div>

                <div class="info-section">
                    <h4 class="mb-3 fs-5"><i class="fas fa-info-circle me-2 text-primary"></i>Platform Highlights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check-circle me-2 text-success"></i>
                            Verified and Approved Datasets
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-globe me-2 text-info"></i>
                            Diverse Data Categories
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lock me-2 text-warning"></i>
                            Secure Data Sharing
                        </li>
                        <li>
                            <i class="fas fa-users me-2 text-primary"></i>
                            Community-Driven Platform
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <footer class="text-center mt-4 text-muted">
            <p>
                &copy; 2024 V-Hub. Empowering Knowledge Sharing.
                <a href="#" class="text-muted ms-2">Privacy Policy</a> |
                <a href="#" class="text-muted">Terms of Service</a>
            </p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datasetsTable').DataTable({
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true
            });
        });
    </script>
</body>

</html>
