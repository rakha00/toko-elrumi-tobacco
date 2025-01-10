<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Toko Elrumi Tobacco</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
        <link rel="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@100;300;400;700&display=swap" rel="stylesheet" />

        <!--My Style-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-slate-950">
        <!--Navbar start-->
        <nav class="fixed left-0 right-0 top-0 z-50 border-b border-blue-950 bg-black/80" x-data="{ isOpen: false, isOpenCart: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-20 items-center justify-between">
                    <div class="flex items-center">
                        <p class="text-2xl font-bold italic text-white sm:text-4xl">Elrumi<span class="text-orange-500">Tobacco</span>.</p>
                    </div>

                    <!-- Desktop menu -->
                    <div class="hidden md:block">
                        <div class="flex items-center gap-4 lg:gap-10">
                            <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#home">Home</a>
                            <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#about">Tentang Kami</a>
                            <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#produk">Daftar Produk</a>
                            <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#products">Produk</a>
                            <a class="text-base font-bold text-white hover:text-orange-500 lg:text-lg" href="#contact">Kontak</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-5">
                        <button id="shopping-cart-button" @click="isOpenCart = !isOpenCart">
                            <x-feathericon-shopping-cart class="text-white hover:text-orange-500" />
                        </button>
                        <div class="relative" x-data="{ isOpenUser: false }">
                            <button @click="isOpenUser = !isOpenUser">
                                <x-feathericon-user class="text-white hover:text-orange-500" />
                            </button>
                            <div class="absolute right-0 z-50 mt-2 w-48 rounded-md bg-white shadow-lg" x-show="isOpenUser" @click.away="isOpenUser = false">
                                @auth
                                    <div class="py-1">
                                        <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('profile.edit') }}">Profile</a>
                                        <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('riwayat-pemesanan') }}">Riwayat Pemesanan</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="py-1">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('login') }}">Login</a>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('register') }}">Register</a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        <!-- Mobile menu button -->
                        <button class="md:hidden" @click="isOpen = !isOpen">
                            <x-feathericon-menu class="h-6 w-6 text-white" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <a class="block rounded-md px-3 py-2 text-base font-bold text-white hover:bg-orange-500" href="#home">Home</a>
                    <a class="block rounded-md px-3 py-2 text-base font-bold text-white hover:bg-orange-500" href="#about">Tentang Kami</a>
                    <a class="block rounded-md px-3 py-2 text-base font-bold text-white hover:bg-orange-500" href="#produk">Daftar Produk</a>
                    <a class="block rounded-md px-3 py-2 text-base font-bold text-white hover:bg-orange-500" href="#products">Produk</a>
                    <a class="block rounded-md px-3 py-2 text-base font-bold text-white hover:bg-orange-500" href="#contact">Kontak</a>
                </div>
            </div>

            <!--Shopping Cart start-->
            <div class="fixed right-0 top-0 z-20 mt-20 h-screen w-full bg-white p-4 shadow-lg transition-transform sm:w-3/4 md:w-1/2 lg:w-1/3 lg:p-5" id="shopping-cart" x-show="isOpenCart">
                <livewire:shopping-cart />
            </div>
            <!--Shopping Cart end-->
        </nav>
        <!--Navbar end-->

        <!--Hero Section start-->
        <section class="bg-cover bg-center bg-no-repeat" id="home" style="background-image: url('storage/img/hero.jpg')">
            <main class="flex h-screen flex-col items-start justify-center text-start">
                <h1 class="px-4 text-4xl font-bold text-white sm:px-8 sm:text-5xl md:px-16 md:text-6xl lg:px-28 lg:text-7xl">
                    <span class="text-white">Mari</span>
                    <br>
                    <span class="text-white">Ngelinting</span>
                    <span class="text-orange-500">Tembakau</span>
                </h1>
                <p class="px-4 pt-5 text-base text-white sm:px-8 sm:text-lg md:px-16 md:text-xl lg:px-28 lg:text-2xl">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit,
                    animi!
                </p>
                <a class="mx-4 mt-5 rounded-md bg-orange-500 px-4 py-2 text-base font-bold text-white hover:bg-orange-600 sm:mx-8 sm:px-6 sm:py-3 sm:text-lg md:mx-16 md:px-8 md:py-4 md:text-xl lg:mx-28"
                    href="#">Beli Sekarang</a>
            </main>
        </section>
        <!--Hero Section end-->

        <!--About Section start-->
        <section class="min-h-screen py-10 md:py-20" id="about">
            <h2 class="my-5 text-center text-3xl font-semibold text-white md:my-10 md:text-5xl"><span class="text-orange-500">Tentang</span> Kami</h2>

            <div class="flex flex-col items-center justify-center px-4 md:flex-row md:items-start md:px-28">
                <div class="mb-8 w-full md:mb-0 md:w-1/2">
                    <img class="w-full rounded-lg" src="{{ asset('storage/img/about-us.jpg') }}" alt="Tentang Kami" />
                </div>
                <div class="w-full px-0 text-center md:w-1/2 md:px-10 md:text-left">
                    <h3 class="mb-4 text-xl font-bold text-white md:text-2xl">Kenapa memilih produk kami?</h3>
                    <p class="text-base text-white md:text-lg">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id,
                        reiciendis.
                    </p>
                </div>
            </div>
        </section>
        <!--About Section end-->

        <!--Produk Section start-->
        <section class="min-h-screen py-10 md:py-20" id="produk">
            <h2 class="my-5 text-center text-3xl font-semibold text-white md:my-10 md:text-5xl"><span class="text-orange-500">Produk</span> Kami</h2>
            <div class="grid grid-cols-1 gap-5 px-4 sm:grid-cols-2 md:grid-cols-3 md:gap-8 md:px-16 lg:grid-cols-4 lg:gap-10 lg:px-28 xl:grid-cols-5">
                @foreach ($products as $product)
                    <div class="produk-card flex flex-col items-center">
                        <img class="w-36 rounded-lg sm:w-40 md:w-44 lg:w-48" src="{{ asset('storage/img/produk/' . $product->image) }}" alt="{{ $product->name }}" />
                        <h3 class="mt-3 text-xl font-bold text-white md:text-2xl">{{ $product->name }}</h3>
                        <p class="text-base text-white md:text-lg">IDR {{ number_format($product->price, 0, ',', '.') }}/kg</p>
                    </div>
                @endforeach
            </div>
        </section>
        <!--Produk Section end-->

        <!-- Products Section start-->
        <section class="py-10 md:py-20" id="products" x-data="products">
            <h2 class="my-5 text-center text-3xl font-semibold text-white md:my-10 md:text-5xl"><span class="text-orange-500">Produk</span> Best Seller</h2>
            <p class="px-4 text-center text-base text-white md:px-0 md:text-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem voluptatibus voluptas, est voluptate corporis quo?</p>

            <div class="mt-5 grid grid-cols-1 gap-5 px-4 sm:grid-cols-2 md:mt-10 md:grid-cols-3 md:gap-8 md:px-16 lg:grid-cols-4 lg:gap-10 lg:px-28 xl:grid-cols-5">
                @foreach ($products as $product)
                    <div class="flex h-[400px] w-full flex-col items-center justify-between rounded-lg border border-white p-3 md:p-5">
                        <livewire:add-to-cart-button :product="$product" />
                        <div class="flex h-48 w-48 items-center justify-center">
                            <img class="h-full w-full rounded-lg object-contain" src="{{ asset('storage/img/produk/' . $product->image) }}" alt="{{ $product->name }}" />
                        </div>
                        <div class="products-content text-center">
                            <h3 class="text-lg font-bold text-white md:text-xl">{{ $product->name }}</h3>
                            <div class="flex items-center justify-center gap-1 md:gap-2">
                                <x-bi-star-fill class="text-orange-500" />
                                <x-bi-star-fill class="text-orange-500" />
                                <x-bi-star-fill class="text-orange-500" />
                                <x-bi-star-fill class="text-orange-500" />
                                <x-bi-star class="text-white" />
                            </div>
                            <div class="flex items-center justify-center gap-1 text-base font-bold text-white md:gap-2 md:text-lg">IDR {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Products Section end-->

        <!--Contact Section start-->
        <section class="min-h-screen py-10 md:py-20" id="contact">
            <h2 class="my-5 text-center text-3xl font-semibold text-white md:my-10 md:text-5xl"><span class="text-orange-500">Kontak</span> Kami</h2>

            <div class="flex flex-col items-center justify-center gap-5 px-4 md:flex-row md:gap-10 md:px-16 lg:px-28">
                <iframe class="map h-[300px] w-full rounded-lg md:h-[500px] md:w-1/2"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5462597991836!2d106.82725669999995!3d-6.452245799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb61e89ece0f%3A0x243a01d307970ab0!2sELRUMI%20TOBACCO%20(Toko%20tembakau%20depok)!5e0!3m2!1sid!2sid!4v1722233807081!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <form class="w-full rounded-lg bg-gray-800 p-5 text-center md:w-1/2 md:p-10" action="">
                    <div class="flex items-center gap-4 pt-3 md:pt-5">
                        <x-feathericon-user class="text-white" />
                        <input class="w-full rounded-md p-2 text-sm md:text-base" type="text" placeholder="Nama" />
                    </div>
                    <div class="flex items-center gap-4 pt-3 md:pt-5">
                        <x-feathericon-mail class="text-white" />
                        <input class="w-full rounded-md p-2 text-sm md:text-base" type="text" placeholder="Email" />
                    </div>
                    <div class="flex items-center gap-4 pt-3 md:pt-5">
                        <x-feathericon-phone class="text-white" />
                        <input class="w-full rounded-md p-2 text-sm md:text-base" type="text" placeholder="No HP" />
                    </div>
                    <div class="flex items-center gap-4 pt-3 md:pt-5">
                        <x-feathericon-message-square class="text-white" />
                        <textarea class="w-full rounded-md p-2 text-sm md:text-base" placeholder="Pesan" rows="5"></textarea>
                    </div>
                    <button class="mt-3 rounded-md bg-orange-500 px-6 py-3 text-base font-bold text-white hover:bg-orange-600 md:mt-5 md:px-8 md:py-4 md:text-xl" type="submit">Kirim Pesan</button>
                </form>
            </div>
        </section>
        <!--Contact Section end-->

        <!--Footer start-->
        <footer class="bg-orange-500 py-3 md:py-4">
            <div class="flex items-center justify-center gap-2 md:gap-3">
                <a href=""><x-feathericon-instagram class="text-lg text-white hover:text-gray-200 md:text-xl" /></a>
            </div>

            <div class="mt-2 flex flex-col items-center justify-center gap-1 text-xs md:flex-row md:gap-3 md:text-sm">
                <a class="text-white hover:text-gray-200" href="#home">Home</a>
                <a class="text-white hover:text-gray-200" href="#about">Tentang Kami</a>
                <a class="text-white hover:text-gray-200" href="#produk">Produk</a>
                <a class="text-white hover:text-gray-200" href="#contact">Kontak</a>
            </div>
            <div class="mt-2 flex items-center justify-center gap-3 text-xs text-white md:text-sm">
                <p>Created by <a class="hover:text-gray-200" href="">fatihathllh</a>. | &copy; 2024</p>
            </div>
        </footer>
        <!--Footer end-->

        <!--Midtrans-->

        @livewireScripts
    </body>

</html>
