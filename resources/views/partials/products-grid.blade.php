<!-- Main Content -->
<main class="flex-1 p-4 lg:p-6">
    <!-- Header with sorting and mobile filter button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Our Products</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Discover our amazing collection</p>
        </div>

        <div class="flex items-center gap-3">
            <!-- Mobile Filter Button -->
            <button
                class="lg:hidden text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                type="button" data-drawer-target="drawer-filters" data-drawer-show="drawer-filters"
                aria-controls="drawer-filters">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M2 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1ZM2 9a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Zm0 5a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z" />
                </svg>
                Filters
            </button>

            <!-- Sort dropdown -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Sort by
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li><a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Price:
                            Low to High</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Price:
                            High to Low</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Newest
                            First</a></li>
                    <li><a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Best
                            Rating</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Products Grid - OPTIMIZADO PARA DIFERENTES TAMAÑOS -->
    <div
        class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4 gap-4 lg:gap-6">
        @foreach($products as $product)
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        @if($product->productImages && $product->productImages->count())
                            <img class="rounded-t-lg w-full h-48 sm:h-56 lg:h-48 xl:h-56 object-cover"
                                src="{{ asset('storage/' . $product->productImages->first()->url) }}" alt="{{ $product->name }}" />
                        @else
                            <div
                                class="rounded-t-lg w-full h-48 sm:h-56 lg:h-48 xl:h-56 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12z" />
                                </svg>
                            </div>
                        @endif

                        @if($product->discount_price && $product->discount_price < $product->price)
                            <span
                                class="absolute top-2 left-2 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                            </span>
                        @endif
                    </div>

                    <div class="p-4 lg:p-5">
                        <h5 class="mb-2 text-lg lg:text-xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">
                            {{ $product->name }}
                        </h5>

                        @if($product->description)
                            <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-2 hidden sm:block">
                                {{ $product->description }}
                            </p>
                        @endif

                        <div class="flex items-center justify-between mb-4">
                            @if($product->discount_price && $product->discount_price < $product->price)
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                                    <span
                                        class="text-xl lg:text-2xl font-bold text-green-600 dark:text-green-400">${{ number_format($product->discount_price, 2) }}</span>
                                    <span
                                        class="text-sm line-through text-gray-500 dark:text-gray-400">${{ number_format($product->price, 2) }}</span>
                                </div>
                            @else
                                <span
                                    class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>

                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                            <button type="button"
                                class="flex-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Add to cart
                            </button>

                            <div>
                                <button @click="open = true; selectedProduct = {
                name: '{{ $product->name }}'
            }" class="flex-1 py-2.5 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 text-center">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <nav aria-label="Page navigation">
            {{ $products->links() }}
        </nav>
    </div>
</main>