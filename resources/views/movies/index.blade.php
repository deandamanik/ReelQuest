<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReelQuest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-bg text-brand-text antialiased font-sans min-h-screen">

    <div class="max-w-7xl mx-auto px-6 py-12">
        @include('movies.partials.header')
        @include('movies.partials.movie-grid')
        @include('movies.partials.movie-card-template')
    </div>

    @include('movies.partials.modal-detail')

    @include('movies.partials.scripts')
</body>
</html>
