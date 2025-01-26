<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Elrumi Tobacco</title>

    <!--Fonts-->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link rel="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@100;300;400;700&display=swap"
        rel="stylesheet" />

    <!--My Style-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-950" x-data="{ isOpen: false, isOpenCart: false }">
    <!--Navbar start-->
    <nav class="fixed top-0 left-0 right-0 z-50 border-b border-blue-950 bg-black/80">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center">
                    <p class="text-2xl italic font-bold text-white sm:text-4xl">Elrumi<span
                            class="text-orange-500">Tobacco</span>.</p>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:block">
                    <div class="flex items-center gap-4 lg:gap-10">
                        <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#home">Home</a>
                        <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#about">Tentang
                            Kami</a>
                        <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#produk">Daftar
                            Produk</a>
                        <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg"
                            href="#products">Produk</a>
                        <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg"
                            href="#contact">Kontak</a>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <button class="relative" id="shopping-cart-button" @click="isOpenCart = !isOpenCart">
                        <livewire:button-cart />
                    </button>
                    <div class="relative" x-data="{ isOpenUser: false }">
                        <button class="relative" @click="isOpenUser = !isOpenUser">
                            <x-feathericon-user class="text-white hover:text-orange-500" />
                        </button>
                        <div class="absolute right-0 z-50 w-48 mt-2 bg-white rounded-md shadow-lg" x-show="isOpenUser"
                            @click.away="isOpenUser = false">
                            @auth
                            <div class="py-1">
                                <a class="block px-4 py-2 text-sm text-gray-700"
                                    href="{{ route('profile.edit') }}">Profile</a>
                                <a class="block px-4 py-2 text-sm text-gray-700"
                                    href="{{ route('riwayat-pemesanan') }}">Riwayat Pemesanan</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100"
                                        type="submit">Logout</button>
                                </form>
                            </div>
                            @else
                            <div class="py-1">
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ route('login') }}">Login</a>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ route('register') }}">Register</a>
                            </div>
                            @endauth
                        </div>
                    </div>
                    <!-- Mobile menu button -->
                    <button class="md:hidden" @click="isOpen = !isOpen">
                        <x-feathericon-menu class="w-6 h-6 text-white" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a class="block px-3 py-2 text-base font-bold text-white rounded-md hover:bg-orange-500"
                    href="#home">Home</a>
                <a class="block px-3 py-2 text-base font-bold text-white rounded-md hover:bg-orange-500"
                    href="#about">Tentang Kami</a>
                <a class="block px-3 py-2 text-base font-bold text-white rounded-md hover:bg-orange-500"
                    href="#produk">Daftar Produk</a>
                <a class="block px-3 py-2 text-base font-bold text-white rounded-md hover:bg-orange-500"
                    href="#products">Produk</a>
                <a class="block px-3 py-2 text-base font-bold text-white rounded-md hover:bg-orange-500"
                    href="#contact">Kontak</a>
            </div>
        </div>

        <!--Shopping Cart start-->
        <div class="fixed top-0 right-0 z-20 w-full h-screen p-4 mt-20 transition-transform bg-white shadow-lg sm:w-3/4 md:w-1/2 lg:w-1/3 lg:p-5"
            id="shopping-cart" x-show="isOpenCart" @click.outside="isOpenCart = false">
            <livewire:shopping-cart />
        </div>
        <!--Shopping Cart end-->
    </nav>
    <!--Navbar end-->

    <!--Hero Section start-->
    <section class="bg-center bg-no-repeat bg-cover" id="home" style="background-image: url('storage/img/hero.jpg')">
        <main class="flex flex-col items-start justify-center h-screen text-start">
            <h1
                class="px-4 text-4xl font-bold text-white sm:px-8 sm:text-5xl md:px-16 md:text-6xl lg:px-28 lg:text-7xl">
                <span class="text-white">TEST</span>
                <br>
                <span class="text-white">Ngelinting</span>
                <span class="text-orange-500">Tembakau</span>
            </h1>
            <a class="px-4 py-2 mx-4 mt-5 text-base font-bold text-white bg-orange-500 rounded-md hover:bg-orange-600 sm:mx-8 sm:px-6 sm:py-3 sm:text-lg md:mx-16 md:px-8 md:py-4 md:text-xl lg:mx-28"
                href="#products">Beli Sekarang</a>
        </main>
    </section>
    <!--Hero Section end-->

    <!--About Section start-->
    <section class="min-h-screen py-10 md:py-20" id="about">
        <h2 class="my-5 text-3xl font-semibold text-center text-white md:my-10 md:text-5xl"><span
                class="text-orange-500">Tentang</span> Kami</h2>

        <div class="flex flex-col items-center justify-center px-4 md:flex-row md:items-start md:px-28">
            <div class="w-full mb-8 md:mb-0 md:w-1/2">
                <img class="w-full rounded-lg" src="{{ asset('storage/img/about-us.jpg') }}" alt="Tentang Kami" />
            </div>
            <div class="w-full px-0 text-center md:w-1/2 md:px-10 md:text-left">
                <h3 class="mb-4 text-xl font-bold text-white md:text-2xl">Kenapa memilih produk kami?</h3>
                <p class="text-base text-white md:text-lg">
                    Selamat datang di Elrumi Tobacco, tempat terbaik untuk mendapatkan tembakau berkualitas dan berbagai
                    kebutuhan merokok Anda. Kami berdedikasi untuk menyediakan produk tembakau pilihan dengan cita rasa
                    khas yang sesuai dengan selera para penikmat sejati.
                </p>
            </div>
        </div>
    </section>
    <!--About Section end-->

    <!--Produk Section start-->
    <section class="min-h-screen py-10 md:py-20" id="produk">
        <h2 class="my-5 text-3xl font-semibold text-center text-white md:my-10 md:text-5xl"><span
                class="text-orange-500">Produk</span> Kami</h2>
        <div
            class="grid grid-cols-1 gap-5 px-4 sm:grid-cols-2 md:grid-cols-3 md:gap-8 md:px-16 lg:grid-cols-4 lg:gap-10 lg:px-28 xl:grid-cols-5">
            @foreach ($products as $product)
            <div class="flex flex-col items-center produk-card">
                <img class="rounded-lg w-36 sm:w-40 md:w-44 lg:w-48" src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}" />
                <h3 class="mt-3 text-xl font-bold text-white md:text-2xl">{{ $product->name }}</h3>
                <p class="text-base text-white md:text-lg">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>
    </section>
    <!--Produk Section end-->

    <!-- Products Section start-->
    <section class="py-10 md:py-20" id="products">
        <h2 class="my-5 text-3xl font-semibold text-center text-white md:my-10 md:text-5xl"><span
                class="text-orange-500">Produk</span> Best Seller</h2>

        <div
            class="grid grid-cols-1 gap-5 px-4 mt-5 sm:grid-cols-2 md:mt-10 md:grid-cols-3 md:gap-8 md:px-16 lg:grid-cols-4 lg:gap-10 lg:px-28 xl:grid-cols-5">
            @foreach ($products as $product)
            <div
                class="flex h-[400px] w-full flex-col items-center justify-between rounded-lg border border-white p-3 md:p-5">
                <div @click.stop="isOpenCart">
                    <livewire:add-to-cart-button :product="$product" />
                </div>
                <div class="flex items-center justify-center w-48 h-48">
                    <img class="object-contain w-full h-full rounded-lg" src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}" />
                </div>
                <div class="text-center products-content">
                    <h3 class="text-lg font-bold text-white md:text-xl">{{ $product->name }}</h3>
                    <div class="flex items-center justify-center gap-1 md:gap-2">
                        <x-bi-star-fill class="text-orange-500" />
                        <x-bi-star-fill class="text-orange-500" />
                        <x-bi-star-fill class="text-orange-500" />
                        <x-bi-star-fill class="text-orange-500" />
                        <x-bi-star class="text-white" />
                    </div>
                    <div
                        class="flex items-center justify-center gap-1 text-base font-bold text-white md:gap-2 md:text-lg">
                        IDR {{ number_format($product->price, 0, ',', '.') }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Products Section end-->

    <!--Contact Section start-->
    <section class="min-h-screen py-10 md:py-20" id="contact">
        <h2 class="my-5 text-3xl font-semibold text-center text-white md:my-10 md:text-5xl"><span
                class="text-orange-500">Kontak</span> Kami</h2>

        <div class="flex flex-col items-center justify-center gap-5 px-4 md:flex-row md:gap-10 md:px-16 lg:px-28">
            <iframe class="map h-[300px] w-full rounded-lg md:h-[500px] md:w-1/2"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5462597991836!2d106.82725669999995!3d-6.452245799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb61e89ece0f%3A0x243a01d307970ab0!2sELRUMI%20TOBACCO%20(Toko%20tembakau%20depok)!5e0!3m2!1sid!2sid!4v1722233807081!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div
                class="w-full p-8 transition-all duration-300 bg-gray-800 rounded-lg shadow-xl hover:bg-gray-700 md:w-1/2">
                <h3 class="mb-6 text-2xl font-bold text-orange-500">Informasi Kontak</h3>

                <div class="space-y-6">
                    <div class="p-4 overflow-hidden transition-transform bg-gray-700 rounded-lg hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-orange-500 rounded-full">
                                <x-feathericon-user class="w-6 h-6 text-white" />
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-white">Nama</p>
                                <p class="text-base font-medium text-white md:text-lg">Muhammad Fatih Athallah</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 overflow-hidden transition-transform bg-gray-700 rounded-lg hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-orange-500 rounded-full">
                                <x-feathericon-mail class="w-6 h-6 text-white" />
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-white">Email</p>
                                <p class="text-base font-medium text-white md:text-lg">fatihathallah26@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 overflow-hidden transition-transform bg-gray-700 rounded-lg hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-orange-500 rounded-full">
                                <x-feathericon-phone class="w-6 h-6 text-white" />
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-white">Telepon</p>
                                <p class="text-base font-medium text-white md:text-lg">089516129537</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Section end-->

    <!--Footer start-->
    <footer class="py-3 bg-orange-500 md:py-4">
        <div class="flex items-center justify-center gap-2 md:gap-3">
            <a href="">
                <x-feathericon-instagram class="text-lg text-white hover:text-gray-200 md:text-xl" />
            </a>
        </div>

        <div class="flex flex-col items-center justify-center gap-1 mt-2 text-xs md:flex-row md:gap-3 md:text-sm">
            <a class="text-white hover:text-gray-200" href="#home">Home</a>
            <a class="text-white hover:text-gray-200" href="#about">Tentang Kami</a>
            <a class="text-white hover:text-gray-200" href="#produk">Produk</a>
            <a class="text-white hover:text-gray-200" href="#contact">Kontak</a>
        </div>
        <div class="flex items-center justify-center gap-3 mt-2 text-xs text-white md:text-sm">
            <p>Created by <a class="hover:text-gray-200" href="">fatihathllh</a>. | &copy; 2024</p>
        </div>
    </footer>
    <!--Footer end-->

    <!--Midtrans-->

    @livewireScripts
</body>

</html>
