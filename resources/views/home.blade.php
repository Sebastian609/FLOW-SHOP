<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products - Your Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 dark:bg-gray-900 relative" x-data="{open: false, selectedProduct: null}">

    <div  @click="open = !open" x-cloak x-show="open"  class=" fixed  w-screen h-screen  flex justify-center items-center z-30">
        <div class="relative z-50 bg-white rounded-lg p-4 shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4" x-text="selectedProduct?.name || 'Product'"></h2>
            <!-- Aquí puedes mostrar más datos -->
        </div>
        <div class="absolute w-screen h-screen bg-accent/30 z-10 "></div>
    </div>
    

    <!-- Header -->
    @include('partials.header')

    <div class="flex max-w-screen-xl flex-wrap mx-auto mt-8 justify-center">
        <!-- Desktop Sidebar -->
        @include('partials.filters')

        <!-- Main Content -->
        @include('partials.products-grid')
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</body>

</html>