<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Web Page
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="container mx-auto flex justify-between items-center py-2 px-4">
            <div class="flex items-center">
                <img alt="Logo" class="h-8" height="50" src="https://storage.googleapis.com/a1aa/image/lqSpp1LEcVqjIRgARqwu5eIUuqkOKjAFucTqaFJnag0wNp9JA.jpg" width="50" />
                <span class="text-white text-lg font-bold ml-2">
                    NagariMart
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a class="text-white" href="#">
                    Seller Centre
                </a>
                <a class="text-white" href="#">
                    Mulai Berjualan
                </a>
                <a class="text-white" href="#">
                    Download
                </a>
                <a class="text-white" href="#">
                    Ikuti kami di
                </a>
                <div class="flex space-x-2">
                    <i class="fab fa-facebook text-white">
                    </i>
                    <i class="fab fa-instagram text-white">
                    </i>
                    <i class="fab fa-twitter text-white">
                    </i>
                </div>
            </div>
        </div>
        <div class="container mx-auto flex justify-between items-center py-2 px-4">
            <div class="flex items-center space-x-4">
                <a class="text-white" href="#">
                    Notifikasi
                </a>
                <a class="text-white" href="#">
                    Bantuan
                </a>
                <a class="text-white" href="#">
                    Bahasa Indonesia
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </div>
        </div>
    </header>
    <!-- Search Bar -->
    <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 py-4">
        <div class="container mx-auto flex justify-center">
            <input class="w-1/2 p-2 rounded-l-md" placeholder="Search..." type="text" />
            <button class="bg-white text-orange-500 p-2 rounded-r-md">
                <i class="fas fa-search">
                </i>
            </button>
        </div>
    </div>
    <!-- Main Content -->
    <main class="container mx-auto py-4">
        <!-- Banner -->
        <div class="flex justify-between items-center mb-4">
            <img alt="Banner 1" class="w-1/2 h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/eWfIs7fILVX3wI7TWBAPm4XIYRsjfnQkMiP795LQK4PFtJtPB.jpg" width="800" />
            <img alt="Banner 2" class="w-1/2 h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/c2hWTjhDZEZLDhVv9NmEp0F03m9gJLft58pwIHgM9utrNp9JA.jpg" width="800" />
        </div>
        <!-- Categories -->
        <section class="container mx-auto py-8">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                <!--  category items -->
                <a href="{{ route('categories.electronics') }}" class="block bg-white rounded-lg shadow hover:shadow-lg transition p-4 text-center">
                    <i class="fas fa-tv text-4xl text-blue-500 mb-2"></i>
                    <p class="font-semibold">Electronics</p>
                </a>
            </div>
        </section>
        <!-- Sisipkan footer -->
        @include('partials.footer')
        </div>


</body>

</html>