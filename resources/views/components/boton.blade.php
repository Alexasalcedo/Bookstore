<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<button class="btn btn-blue">
    Button
</button>

<style>
    .btn {
        @apply font-bold py-2 px-4 rounded;
    }
    .btn-blue {
        @apply bg-blue-500 text-white;
    }
    .btn-blue:hover {
        @apply bg-blue-700;
    }
</style>