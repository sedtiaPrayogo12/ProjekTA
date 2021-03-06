<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bintang Pelajar</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@next/dist/tailwind.min.css" rel="stylesheet">

    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!--Header-->
    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
                    <i class="fas fa-sun text-pink-600 pr-3"></i> Bintang Pelajar
                </a>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">

                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"> <span class="hidden md:inline-block">Hi, {{ Auth::user()->name }} </span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 hover:border-yellow-600">
                            <i class="fas fa-home fa-fw mr-3 text-gray-500"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('course') }}" class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline border-b-2 border-pink-500 hover:border-pink-500">
                            <i class="fas fa-tasks fa-fw mr-3 text-pink-600"></i><span class="pb-1 md:pb-0 text-sm">Course</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Upload</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Salary</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                            <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Payments</span>
                        </a>
                    </li>
                </ul>

                <div class="relative pull-right pl-4 pr-4 md:pr-0">
                    <input type="search" placeholder="Search" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                        <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                </div>

            </div>

        </div>
    </nav>


    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <div class="container my-12 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Mathematics" class="block h-auto w-full" src="{{ asset('img/maths_banner.jpg') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Mathematics
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class=" text-sm">
                                        Here you can learn the basics
                                        of mathematics to math expert
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>

                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Physics" class="block h-auto w-full" src="{{ asset('img/physics.png') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Physics
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        Author Name
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Chemistry" class="block h-auto w-full" src="{{ asset('img/chemistry.png') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Chemistry
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        Author Name
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Biology" class="block h-auto w-full" src="{{ asset('img/biology.jpg') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Biology
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        Author Name
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Geography" class="block h-auto w-full" src="{{ asset('img/geography.webp') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Geography
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        Author Name
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a href="#">
                                <img alt="Astronomy" class="block h-auto w-full" src="{{ asset('img/astronomy.png') }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black font-bold" href="#">
                                        Astronomy
                                    </a>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    11/1/19
                                </p>
                            </header>

                            {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        Author Name
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer> --}}

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->

                        <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Economy" class="block h-auto w-full" src="{{ asset('img/economy.webp') }}">
                                </a>

                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline hover:underline text-black font-bold" href="#">
                                            Economy
                                        </a>
                                    </h1>
                                    <p class="text-grey-darker text-sm">
                                        11/1/19
                                    </p>
                                </header>

                                {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            Author Name
                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </footer> --}}

                            </article>
                            <!-- END Article -->

                        </div>
                        <!-- END Column -->

                        <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="Sociology" class="block h-auto w-full" src="{{ asset('img/sociology.webp') }}">
                                </a>

                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline hover:underline text-black font-bold" href="#">
                                            Sociology
                                        </a>
                                    </h1>
                                    <p class="text-grey-darker text-sm">
                                        11/1/19
                                    </p>
                                </header>

                                {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            Author Name
                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </footer> --}}

                            </article>
                            <!-- END Article -->

                        </div>
                        <!-- END Column -->

                        <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">

                                <a href="#">
                                    <img alt="English" class="block h-auto w-full" src="{{ asset('img/english.webp') }}">
                                </a>

                                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                    <h1 class="text-lg">
                                        <a class="no-underline hover:underline text-black font-bold" href="#">
                                            English
                                        </a>
                                    </h1>
                                    <p class="text-grey-darker text-sm">
                                        11/1/19
                                    </p>
                                </header>

                                {{-- <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2 text-sm">
                                            Author Name
                                        </p>
                                    </a>
                                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                        <span class="hidden">Like</span>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </footer> --}}

                            </article>
                            <!-- END Article -->

                        </div>
                        <!-- END Column -->

                </div>
            </div>

        </div>


    </div>
    <!--/container-->

    <!--Footer-->
    @include('layouts.footer')

    <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else { userMenuDiv.classList.add("invisible"); }
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else { navMenuDiv.classList.add("hidden"); }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) { return true; }
            t = t.parentNode;
        }
        return false;
    }
    </script>

</body>

</html>
