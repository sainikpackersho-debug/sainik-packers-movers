<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>

<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
<meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">

    <!-- Tailwind CSS v4 -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine JS -->
    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>
<!-- Swiper CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<!-- AOS CSS -->
    <link rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css">
 <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
<style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        :root {
            --primary: #071B45;
            --secondary: #FF6B00;
            --light: #F8FAFC;
            --dark: #111827;
        }

        .container-custom {
            max-width: 1280px;
            margin: auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(255,255,255,.85);
        }

        .gradient-bg {
            background: linear-gradient(
                135deg,
                #071B45 0%,
                #102C6A 100%
            );
        }
    </style>
<script src="https://unpkg.com/lucide@latest"></script>
</head>


<body class="bg-white text-slate-800">
<nav
    x-data="{
        mobileMenu:false,
        servicesMenu:false,
        scrolled:false
    }"
    x-init="
        window.addEventListener('scroll',()=>{
            scrolled = window.scrollY > 50
        })
    "
    class="sticky top-0 z-[9999]">

    <!-- TOP CONTACT BAR -->

    <div class="bg-[#071B45] text-white">

        <div class="container-custom">

            <div class="flex flex-wrap items-center justify-between py-2 text-sm">

                <div class="flex items-center gap-6">

                    <span>
                        <i class="fa-solid fa-shield-halved text-orange-500 mr-2"></i>
                        GST Registered
                    </span>

                    <span class="hidden lg:block">
                        <i class="fa-solid fa-award text-orange-500 mr-2"></i>
                        ISO Certified
                    </span>

                </div>

                <div class="flex items-center gap-5">

                    <a href="tel:9342422422">
                        <i class="fa-solid fa-phone text-orange-500 mr-2"></i>
                        9342-422-422
                    </a>

                    <a href="mailto:sainikpackermovers@gmail.com">
                        <i class="fa-solid fa-envelope text-orange-500 mr-2"></i>
                        Email Us
                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- MAIN NAVBAR -->

    <div
        :class="scrolled
        ? 'bg-white shadow-xl'
        : 'bg-white/95 backdrop-blur-md'"
        class="transition-all duration-300">

        <div class="container-custom">

            <div class="flex items-center justify-between h-[88px]">

                <!-- LOGO -->

                <a href="/" class="flex items-center gap-3">

                    <img
                        src="https://www.sainikpackersmovers.in/assets/img/logo/logo.png"
                        alt="Sainik Packers"
                        class="h-14">

                    <div>

                        <h2 class="font-extrabold text-2xl text-[#071B45]">
                            SAINIK
                        </h2>

                        <p class="text-xs text-slate-500">
                            Packers & Movers
                        </p>

                    </div>

                </a>

                <!-- DESKTOP MENU -->

                <!-- DESKTOP MENU -->

<ul class="hidden xl:flex items-center gap-7">

    <!-- Home -->

    <li>
        <a href="/"
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-house text-[13px]"></i>

            Home

        </a>
    </li>

    <!-- About -->

    <li>
        <a href="about.html"
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-circle-info text-[13px]"></i>

            About Us

        </a>
    </li>

    <!-- SERVICES -->

    <li
        class="relative"
        @mouseenter="servicesMenu=true"
        @mouseleave="servicesMenu=false">

        <button
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-truck-fast text-[13px]"></i>

            Services

            <i class="fa-solid fa-chevron-down text-[10px]"></i>

        </button>

        <!-- PREMIUM MEGA MENU -->

        <div
            x-show="servicesMenu"
            x-cloak
            x-transition
            class="absolute left-1/2 -translate-x-1/2 mt-7 w-[920px] bg-white rounded-[28px] shadow-[0_25px_60px_rgba(0,0,0,0.12)] border border-slate-100 overflow-hidden">

            <div class="grid grid-cols-3">

                <!-- COLUMN -->

                <div class="p-7 border-r border-slate-100">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center">

                            <i class="fa-solid fa-house text-orange-500"></i>

                        </div>

                        <h3 class="font-bold text-[#071B45]">
                            Household Moving
                        </h3>

                    </div>

                    <div class="space-y-4 text-sm">

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-box"></i>

                            Home Shifting

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-building"></i>

                            Apartment Moving

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-house-chimney"></i>

                            Villa Relocation

                        </a>

                    </div>

                </div>

                <!-- COLUMN -->

                <div class="p-7 border-r border-slate-100">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">

                            <i class="fa-solid fa-car-side text-blue-600"></i>

                        </div>

                        <h3 class="font-bold text-[#071B45]">
                            Vehicle Transport
                        </h3>

                    </div>

                    <div class="space-y-4 text-sm">

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-car"></i>

                            Car Transport

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-motorcycle"></i>

                            Bike Transport

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-scooter"></i>

                            Scooter Moving

                        </a>

                    </div>

                </div>

                <!-- COLUMN -->

                <div class="p-7">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center">

                            <i class="fa-solid fa-building-user text-green-600"></i>

                        </div>

                        <h3 class="font-bold text-[#071B45]">
                            Corporate Solutions
                        </h3>

                    </div>

                    <div class="space-y-4 text-sm">

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-briefcase"></i>

                            Office Relocation

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-warehouse"></i>

                            Warehousing

                        </a>

                        <a href="#" class="flex items-center gap-3 hover:text-orange-500">

                            <i class="fa-solid fa-boxes-stacked"></i>

                            Storage Solutions

                        </a>

                    </div>

                </div>

            </div>

            <!-- Footer CTA -->

            <div class="bg-slate-50 px-7 py-4 flex items-center justify-between">

                <div>

                    <h4 class="font-semibold text-[#071B45] text-sm">
                        Need Help Choosing a Service?
                    </h4>

                    <p class="text-xs text-slate-500">
                        Speak with our relocation expert.
                    </p>

                </div>

                <a href="tel:9342422422"
                    class="px-5 py-2.5 bg-orange-500 text-white rounded-xl text-sm font-semibold hover:bg-orange-600">

                    Call Now

                </a>

            </div>

        </div>

    </li>

    <!-- Cities -->

    <li>
        <a href="#"
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-location-dot text-[13px]"></i>

            Cities

        </a>
    </li>

    <!-- Gallery -->

    <li>
        <a href="#"
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-images text-[13px]"></i>

            Gallery

        </a>
    </li>

    <!-- Contact -->

    <li>
        <a href="#"
            class="flex items-center gap-2 font-medium text-slate-700 hover:text-orange-500 transition">

            <i class="fa-solid fa-headset text-[13px]"></i>

            Contact

        </a>
    </li>

</ul>

                <!-- CTA -->

                <div class="hidden xl:flex items-center gap-4">

                    <a
                        href="https://wa.me/919342422422"
                        target="_blank"
                        class="w-11 h-11 rounded-full bg-green-500 text-white flex items-center justify-center">

                        <i class="fa-brands fa-whatsapp"></i>

                    </a>

                    <a
                        href="#"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg">

                        Get Free Quote

                    </a>

                </div>

                <!-- MOBILE BUTTON -->

                <button
                    @click="mobileMenu=true"
                    class="xl:hidden text-3xl">

                    <i class="fa-solid fa-bars"></i>

                </button>

            </div>

        </div>

    </div>



    <!-- MOBILE MENU -->

   <!-- PREMIUM COMPACT APP STYLE MOBILE MENU -->



<div
    x-cloak
    x-show="mobileMenu"
    style="display:none;"
    x-transition.opacity
    class="fixed inset-0 z-[99999]">   
    <div
        @click="mobileMenu=false"
        class="absolute inset-0 bg-black/50 backdrop-blur-sm">
    </div>

    <!-- Drawer -->

    <div
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="absolute right-0 top-0 h-full w-[280px] bg-white shadow-2xl overflow-y-auto">

        <!-- Header -->

        <div class="bg-gradient-to-r from-[#071B45] to-[#0B2C6B] p-4">

            <div class="flex items-center justify-between">

                <div>

                    <h3 class="text-white font-semibold text-base">
                        Sainik Packers
                    </h3>

                    <p class="text-blue-100 text-[11px]">
                        Safe Moving Partner
                    </p>

                </div>

                <button
                    @click="mobileMenu=false"
                    class="w-8 h-8 rounded-lg bg-white/10 text-white flex items-center justify-center">

                    <i class="fa-solid fa-xmark text-sm"></i>

                </button>

            </div>

            <!-- Quick Actions -->

            <div class="grid grid-cols-3 gap-2 mt-4">

                <a
                    href="tel:9342422422"
                    class="bg-white/10 rounded-xl p-2 text-center">

                    <i class="fa-solid fa-phone text-white text-sm"></i>

                    <div class="text-white text-[10px] mt-1">
                        Call
                    </div>

                </a>

                <a
                    href="https://wa.me/919342422422"
                    class="bg-white/10 rounded-xl p-2 text-center">

                    <i class="fa-brands fa-whatsapp text-white text-sm"></i>

                    <div class="text-white text-[10px] mt-1">
                        WhatsApp
                    </div>

                </a>

                <a
                    href="#quote"
                    class="bg-white/10 rounded-xl p-2 text-center">

                    <i class="fa-solid fa-file-signature text-white text-sm"></i>

                    <div class="text-white text-[10px] mt-1">
                        Quote
                    </div>

                </a>

            </div>

        </div>

        <!-- Menu Links -->

        <div class="p-3 space-y-1">

            <a href="/"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center">

                    <i class="fa-solid fa-house text-orange-500 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        Home
                    </div>

                    <div class="text-[11px] text-slate-500">
                        Homepage
                    </div>

                </div>

            </a>

            <a href="about.html"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                    <i class="fa-solid fa-users text-blue-600 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        About Us
                    </div>

                    <div class="text-[11px] text-slate-500">
                        Company Profile
                    </div>

                </div>

            </a>

            <a href="#"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">

                    <i class="fa-solid fa-truck-fast text-green-600 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        Services
                    </div>

                    <div class="text-[11px] text-slate-500">
                        Moving Solutions
                    </div>

                </div>

            </a>

            <a href="#"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">

                    <i class="fa-solid fa-location-dot text-purple-600 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        Cities
                    </div>

                    <div class="text-[11px] text-slate-500">
                        500+ Locations
                    </div>

                </div>

            </a>

            <a href="#"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-pink-100 flex items-center justify-center">

                    <i class="fa-solid fa-image text-pink-600 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        Gallery
                    </div>

                    <div class="text-[11px] text-slate-500">
                        Our Projects
                    </div>

                </div>

            </a>

            <a href="#"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition">

                <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">

                    <i class="fa-solid fa-headset text-red-600 text-sm"></i>

                </div>

                <div>

                    <div class="font-medium text-sm text-[#071B45]">
                        Contact
                    </div>

                    <div class="text-[11px] text-slate-500">
                        24×7 Support
                    </div>

                </div>

            </a>

        </div>

        <!-- Bottom CTA -->

        <div class="p-3 border-t border-slate-100">

            <a
                href="#quote"
                class="flex items-center justify-center gap-2 h-11 bg-orange-500 hover:bg-orange-600 text-white rounded-xl text-sm font-medium transition">

                <i class="fa-solid fa-paper-plane text-xs"></i>

                Get Free Quote

            </a>

        </div>


</nav>