<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama_perusahaan }}</title>
    <link rel="stylesheet" href="{{ asset('themplete/front') }}/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/upload/profil/{{ $profil->favicon }}">
    <style>
        .ytp-button ytp-overflow-button ytp-overflow-button-visible {
            display: none !important;
            visibility: hidden !important;
        }
    </style>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        #searchResults {
            margin-top: 20px;
        }
    </style>

    <style>
        .menu nav {
            ul {
                letter-spacing: -.3em;

                li {
                    background-color: transparent;
                    display: inline-block;
                    font-size: 13px;
                    letter-spacing: normal;

                    &.navParent {
                        position: relative;
                    }

                    a {
                        background-color: transparent;
                        color: #160b0a;
                        display: block;
                        padding: 12px;
                        text-decoration: none;

                        &:hover {
                            opacity: .8;
                        }
                    }

                    .navChild {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100vw;
                        height: 35vh;

                        z-index: -1;
                        /* blur sisa hieght */
                        backdrop-filter: blur(10px);
                        margin-bottom: 3rem;

                        background-color: #fafafc;

                        .navChildContainer {
                            display: flex;
                            flex-wrap: wrap;
                            /* justify-content: center; */
                            gap: 4rem;
                            align-items: start;
                            width: 100%;
                            max-width: 1200px;
                            margin: 0 auto;
                            padding-left: 5rem;
                            padding-top: 4rem;
                            box-sizing: border-box;


                            .submenu-header {

                                font-size: 12px;
                                line-height: 1.3333733333;
                                font-weight: 400;
                                margin-left: 1rem;
                                letter-spacing: -.01em;
                                font-family: SF Pro Text, SF Pro Icons, Helvetica Neue, Helvetica, Arial, sans-serif;
                                color: rgb(110, 110, 115);
                                display: block;
                            }

                            li {
                                display: block;
                                margin: 0;

                                background: transparent;

                                a {
                                    font-size: 17px;
                                    margin-top: 5px;
                                    line-height: 1.1428571429;
                                    font-weight: 600;
                                    letter-spacing: 0.007em;
                                    font-family: 'SF Pro Display', 'SF Pro Icons', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
                                    color: #161617;
                                }
                            }
                        }

                    }
                }
            }
        }
    </style>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Ek+Mukta:200);
       

        body {
            margin: 0;
            line-height: 1.4;
            background: #E1E1E1;
        }

        .containernav {
            position: relative;
            display: block;
            overflow: hidden;
            height: 100%;
            transition: height 0.5s ease-in-out;
            z-index: 999;


        }

        .containernav .header {
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            height: 50px;
            width: 100%;
            background: #fafafc;
            overflow: hidden;
            transition: all 0.5s ease-out, background 1s ease-out;
            transition-delay: 0.2s;
            z-index: 1;
        }

        .containernav .header .burger-container {
            position: relative;
            display: inline-block;
            height: 50px;
            width: 50px;
            cursor: pointer;
            transform: rotate(0deg);
            transition: all 0.3s cubic-bezier(0.4, 0.01, 0.165, 0.99);
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }

        .containernav .header .burger-container #burger {
            width: 18px;
            height: 8px;
            position: relative;
            display: block;
            margin: -4px auto 0;
            top: 50%;
        }

        .containernav .header .burger-container #burger .bar {
            width: 100%;
            height: 1px;
            display: block;
            position: relative;
            background: #160b0a;
            transition: all 0.3s cubic-bezier(0.4, 0.01, 0.165, 0.99);
            transition-delay: 0s;
        }

        .containernav .header .burger-container #burger .bar.topBar {
            transform: translateY(0px) rotate(0deg);
        }

        .containernav .header .burger-container #burger .bar.btmBar {
            transform: translateY(6px) rotate(0deg);
        }

        .containernav .header .icon {
            display: inline-block;
            position: absolute;
            height: 100%;
            line-height: 50px;
            width: 50px;
            height: 50px;
            text-align: center;
            color: #160b0a;
            font-size: 22px;
            left: 50%;
            transform: translateX(-50%);
        }

        .containernav .header .icon.icon-bag {
            right: 0;
            top: 0;
            left: auto;
            transform: translateX(0px);
            transition: transform 0.5s cubic-bezier(0.4, 0.01, 0.165, 0.99);
            transition-delay: 0.65s;
        }

        .containernav .header ul.menu {
            position: relative;
            display: block;
            padding: 0px 48px 0;
            list-style: none;
        }

        .containernav .header ul.menu li.menu-item {

            border-bottom: 1px solid #333;
            margin-top: 5px;
            transform: scale(1.15) translateY(-30px);
            opacity: 0;
            transition: transform 0.5s cubic-bezier(0.4, 0.01, 0.165, 0.99), opacity 0.6s cubic-bezier(0.4, 0.01, 0.165, 0.99);
        }

        .containernav .header ul.menu li.menu-item:nth-child(1) {
            transition-delay: 0.49s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(2) {
            transition-delay: 0.42s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(3) {
            transition-delay: 0.35s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(4) {
            transition-delay: 0.28s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(5) {
            transition-delay: 0.21s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(6) {
            transition-delay: 0.14s;
        }

        .containernav .header ul.menu li.menu-item:nth-child(7) {
            transition-delay: 0.07s;
        }

        .containernav .header ul.menu li.menu-item a {
            padding-left: 1rem;
            display: block;
            position: relative;
            color: #160b0a;
            font-family: "Ek Mukta", sans-serif;
            font-weight: 100;
            text-decoration: none;
            font-size: 22px;
            line-height: 2.35;
            font-weight: 200;
            width: 100%;
        }

        .containernav .header.menu-opened {
            height: 100%;
            background-color: white;
            transition: all 0.3s ease-in, background 0.5s ease-in;
            transition-delay: 0.25s;
        }

        .containernav .header.menu-opened .burger-container {
            transform: rotate(90deg);
        }

        .containernav .header.menu-opened .burger-container #burger .bar {
            transition: all 0.4s cubic-bezier(0.4, 0.01, 0.165, 0.99);
            transition-delay: 0.2s;
        }

        .containernav .header.menu-opened .burger-container #burger .bar.topBar {
            transform: translateY(4px) rotate(45deg);
        }

        .containernav .header.menu-opened .burger-container #burger .bar.btmBar {
            transform: translateY(3px) rotate(-45deg);
        }

        .containernav .header.menu-opened ul.menu li.menu-item {
            transform: scale(1) translateY(0px);
            opacity: 1;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(1) {
            transition-delay: 0.27s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(2) {
            transition-delay: 0.34s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(3) {
            transition-delay: 0.41s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(4) {
            transition-delay: 0.48s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(5) {
            transition-delay: 0.55s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(6) {
            transition-delay: 0.62s;
        }

        .containernav .header.menu-opened ul.menu li.menu-item:nth-child(7) {
            transition-delay: 0.69s;
        }

        .containernav .header.menu-opened .icon.icon-bag {
            transform: translateX(75px);
            transition-delay: 0.3s;
        }

        .containernav .content {
            font-family: "Ek Mukta", sans-serif;
            padding: 67px 4% 0;
            text-align: justify;
            overflow: scroll;
            max-height: 100%;
        }

        .containernav .content::-webkit-scrollbar {
            display: none;
        }

        .containernav .content h2 {
            margin-bottom: 0px;
            letter-spacing: 1px;
        }

        .containernav .content img {
            width: 95%;
            position: relative;
            display: block;
            margin: 75px auto 75px;
        }

        .containernav .content img:nth-of-type(2) {
            margin: 75px auto;
        }

        @media (max-width: 600px) {

            .containernav .header {
                position: fixed;
            }
        }

        @media(max-width: 600px) {
            .containernav .content {
                padding: 67px 4% 0;
            }

            #globalnav {
                display: none;
                visibility: hidden;
            }
        }
    </style>
    <style>
        #search {
            /* translate x */
            transform: translateX(200px);
            padding: 0;
        }

        .navParent a {
            transform: translateY(-15px);
        }

        #searchInput {
            width: 100%;
            border-radius: 5px;
            padding: 2rem;
            transform: translateY(40px);
        }
        .logo{
            display: block;
        }
        @media (max-width: 600px) {
           .logo{
            display: none;
        }
    }
    </style>

    <link rel="stylesheet" href="{{ asset('assets-globalheader.css') }}">
    @vite('resources/css/app.css')
    @stack('css')
</head>

<body>
    <div id="globalheader">
        <aside id="globalmessage-segment" lang="en-US" dir="ltr" class="globalmessage-segment">
            <ul data-strings='{"view":"{%STOREFRONT%} Store Home","segments":{"smb":"Business Store Home","eduInd":"Education Store Home","other":"Store Home"},"exit":"Exit"}'
                class="globalmessage-segment-content"></ul>
        </aside>
        <nav id="globalnav" class="z-10 " lang="en-US" dir="ltr" aria-label="Global"
            data-analytics-element-engagement-start="globalnav:onFlyoutOpen"
            data-analytics-element-engagement-end="globalnav:onFlyoutClose"
            data-store-api="/[storefront]/shop/bag/status" data-analytics-activitymap-region-id="global nav"
            data-analytics-region="global nav" class="globalnav js    ">
            <div class="globalnav-content ">
                <div class="globalnav-item globalnav-menuback">
                    <button aria-label="Main menu" class="globalnav-menuback-button">
                        <span class="globalnav-chevron-icon">
                            <svg height="48" viewbox="0 0 9 48" width="9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m1.5618 24.0621 6.5581-6.4238c.2368-.2319.2407-.6118.0088-.8486-.2324-.2373-.6123-.2407-.8486-.0088l-7 6.8569c-.1157.1138-.1807.2695-.1802.4316.001.1621.0674.3174.1846.4297l7 6.7241c.1162.1118.2661.1675.4155.1675.1577 0 .3149-.062.4326-.1846.2295-.2388.2222-.6187-.0171-.8481z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
                <ul id="globalnav-list" class="globalnav-list">
                    <li data-analytics-element-engagement="globalnav hover - apple"
                        class="globalnav-item globalnav-item-apple logo">
                        <a href="/" data-globalnav-item-name="apple" data-analytics-title="apple home"
                            aria-label="Apple" class="globalnav-link globalnav-link-apple">
                            <img src="/upload/profil/{{ $profil->gambar }}" alt="logo" width="80px"
                                class="pt-3 logo">

                          
                            
                        </a>

                    </li>

                    <li data-topnav-flyout-item="menu" data-topnav-flyout-label="Menu" role="none"
                        class="globalnav-item globalnav-menu">
                        <div class="menu">
                            <nav>
                                <ul>
                                    @php
                                        $categories = App\Models\KategoriProduk::all();
                                    @endphp
                                    <li class="navParent">
                                        <a href="{{ route('product') }}">Product</a>




                                        <div class="navChild">
                                            <div class="navChildContainer">
                                                <div
                                                    class="wrapper w-full mt-3 ml-4 flex justify-start gap-10 max-w-[1150px] mx-auto ">
                                                    <ul>
                                                        @foreach ($categories as $category)
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    data-category-id="{{ $category->id }}"
                                                                    class="globalnav-submenu-link">
                                                                    {{ $category->nama_kategori_produk }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <ul id="product-list">
                                                        <!-- Products will be loaded here via AJAX -->

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="navChildContainer">


                                            </div>

                                        </div>



                                    </li>

                                    @php
                                        $menu = App\Models\Menu::all();
                                        $submenu = App\Models\SubMenu::all();
                                    @endphp
                                    @foreach ($menu as $m)
                                        <li class="navParent">
                                            <a href="/menu/{{ $m->slug }}">{{ $m->name }}</a>
                                            <div class="navChild">

                                                <div class="navChildContainer">
                                                    <div class="wrapper ml-4 w-full mt-3 ">

                                                        <ul>
                                                            @foreach ($submenu as $sm)
                                                                @if ($sm->menu_id == $m->id)
                                                                    <li>
                                                                        <a href="/submenu/{{ $sm->slug }}"
                                                                            class="globalnav-submenu-link">{{ $sm->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="navParent">
                                        <a href="{{ route('location') }}">Location</a>
                                        <div class="navChild">

                                            <div class="navChildContainer">
                                                <div class="wrapper ml-4 w-full mt-3 ">

                                                    <ul>
                                                        @foreach ($submenu as $sm)
                                                            @if ($sm->menu_id == $m->id)
                                                                <li>
                                                                    <a href="/submenu/{{ $sm->slug }}"
                                                                        class="globalnav-submenu-link">{{ $sm->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                    </ul>
                                                </div>


                                                </div>
                                            </div>
                                    </li>
                                    <li class="navParent ">
                                        <a href="" id="search"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="15px" height="44px" viewbox="0 0 15 44">
                                                <path
                                                    d="M14.298,27.202l-3.87-3.87c0.701-0.929,1.122-2.081,1.122-3.332c0-3.06-2.489-5.55-5.55-5.55c-3.06,0-5.55,2.49-5.55,5.55 c0,3.061,2.49,5.55,5.55,5.55c1.251,0,2.403-0.421,3.332-1.122l3.87,3.87c0.151,0.151,0.35,0.228,0.548,0.228 s0.396-0.076,0.548-0.228C14.601,27.995,14.601,27.505,14.298,27.202z M1.55,20c0-2.454,1.997-4.45,4.45-4.45 c2.454,0,4.45,1.997,4.45,4.45S8.454,24.45,6,24.45C3.546,24.45,1.55,22.454,1.55,20z">
                                                </path>
                                            </svg>
                                        </a>
                                        </span>
                                        </svg>
                                        <div class="navChild">
                                            <div class="navChildContainer">
                                                <div class="wrapper w-full mt-10">
                                                    <form action="{{ route('product') }}" method="get"
                                                        style="width: 100%;">
                                                        <div
                                                            class="relative flex items-center w-full bg-gray-50 border-b border-gray-800 ">
                                                            <span class="absolute left-3 text-gray-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15px"
                                                                    height="44px" viewbox="0 0 15 44">
                                                                    <path
                                                                        d="M14.298,27.202l-3.87-3.87c0.701-0.929,1.122-2.081,1.122-3.332c0-3.06-2.489-5.55-5.55-5.55c-3.06,0-5.55,2.49-5.55,5.55 c0,3.061,2.49,5.55,5.55,5.55c1.251,0,2.403-0.421,3.332-1.122l3.87,3.87c0.151,0.151,0.35,0.228,0.548,0.228 s0.396-0.076,0.548-0.228C14.601,27.995,14.601,27.505,14.298,27.202z M1.55,20c0-2.454,1.997-4.45,4.45-4.45 c2.454,0,4.45,1.997,4.45,4.45S8.454,24.45,6,24.45C3.546,24.45,1.55,22.454,1.55,20z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="text" placeholder="Cari Nama Produk"
                                                                aria-label="Search" name="keyword" autocorrect="off"
                                                                autocapitalize="off" autocomplete="off"
                                                                class="w-full bg-gray-50 border-0  h-[50px] pl-10"
                                                                style="padding: 1rem; width: 100%; margin-left: 4rem;">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </li>



                                </ul>
                            </nav>
                        </div>

                    </li>



                    <li id="globalnav-bag" data-analytics-region="bag" class="globalnav-item globalnav-bag">
                        <div class="globalnav-bag-wrapper">
                            <a role="button" id="globalnav-menubutton-link-bag"
                                href="https://wa.me/{{ $profil->no_wa }}" aria-label="Shopping Bag"
                                data-globalnav-item-name="bag" data-topnav-flyout-trigger-regular="true"
                                data-topnav-flyout-trigger-compact="true" data-analytics-title="open - bag"
                                class="globalnav-link globalnav-link-bag">
                                <span class="globalnav-image-regular">
                                    <img src="{{ asset('themplete/front') }}/images/wa.png" width="16"
                                        class="mb-1" alt="shopping">

                                </span>
                                <span class="globalnav-image-compact">
                                    <img src="/upload/profil/{{ $profil->gambar }}" alt="logo" width="100px">

                                </span>
                            </a>
                            <span aria-hidden="true" data-analytics-title="open - bag"
                                class="globalnav-bag-badge"><span class="globalnav-bag-badge-separator"></span><span
                                    class="globalnav-bag-badge-number">0</span><span
                                    class="globalnav-bag-badge-unit">+</span></span>
                        </div>
                        <div id="globalnav-submenu-bag" aria-labelledby="globalnav-menubutton-link-bag"
                            class="globalnav-flyout globalnav-submenu">
                            <div class="globalnav-flyout-scroll-container">
                                <div class="globalnav-flyout-content globalnav-submenu-content"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>

    </div>
    <div class="containernav">

        <div class="header">
            <div class="burger-container z-20">
                <div id="burger">
                    <div class="bar topBar"></div>
                    <div class="bar btmBar"></div>
                </div>
            </div>
            <div class="icon icon-apple"></div>
            <ul class="menu">
            @foreach ($categories as $category)
                <li class="menu-item"><a href="/produk_sale">{{$category->nama_kategori_produk}}</a></li>
            @endforeach
            <li class="menu-item"><a href="/blog">Blog</a></li>

               
            </ul>
            <div class="shop icon icon-bag"></div>
        </div>
    </div>


    <div id="globalnav-curtain" class="globalnav-curtain"></div>
    <div id="globalnav-placeholder" class="h-[53px]"></div>


<div class="main">

    @yield('content')
</div>









    <div class="bg-[#00000019]">

        <div class="container">

            <div class="flex  py-10  flex-wrap ">
                <div class="w-full md:w-1/5 text-start md:text-center">
                    <p class="font-bold ">Apple Online Store</p>
                    <img src="{{ asset('themplete/front/images/png-apple-logo-9711.png') }}"
                        class="w-32 h-10 md:mx-auto mb-5 md:mb-0" alt="logo">
                </div>
                <div class="flex flex-col md:flex-row justify-around flex-wrap w-full md:w-4/5 gap-4">
                    <ul class="space-y-2">
                        <li class="font-bold">Shop and Learn</li>
                        @foreach ($shopAndLearnFooters as $p)
                            <li><a href="{{ $p->link }}"
                                    class="text-gray-900 hover:underline">{{ $p->nama_footer }}</a></li>
                        @endforeach

                    </ul>
                    <ul class="space-y-2">
                        <li class="font-bold">Company</li>
                        @foreach ($companyFooters as $p)
                            <li><a href="{{ $p->link }}"
                                    class="text-gray-900 hover:underline">{{ $p->nama_footer }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="space-y-2">
                        <li class="font-bold">Apple Values</li>
                        @foreach ($valueFooters as $p)
                            <li><a href="{{ $p->link }}"
                                    class="text-gray-900 hover:underline">{{ $p->nama_footer }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div id="searchModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Search</h2>
            <form action="{{ route('product') }}" method="get">
                <input type="text" id="searchInput" name="keyword" placeholder="Search here..." autofocus>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>Copyright © {{ date('Y') }} {{ $profil->nama_perusahaan }}. All rights reserved. Privacy Policy Terms
            of Use Sales Policy Legal Site Map
            Design By {{ $profil->nama_perusahaan }} </p>
    </div>
    </div>

    <!-- jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var modal = $('#searchModal');
            var span = $('.close');

            $('.nav-icons img[src$="search-icon-png-9969(1).png"]').on('click', function() {
                modal.show();
            });
            span.on('click', function() {
                modal.hide();
            });
            $(window).on('click', function(event) {
                if ($(event.target).is(modal)) {
                    modal.hide();
                }
            });
        });
    </script>
<script>
    $(function() {
        var timeout;

        $(".navParent").hover(
            function() {
                clearTimeout(timeout);
                $(this).find('.navChild').stop().slideDown('slow').css('display', 'block');
                $('.main').css('filter', 'blur(10px)');
            },
            function() {
                $(this).find('.navChild').stop().slideUp('slow');
                $('.main').css('filter', 'blur(0px)'); 
            }
        );

        $(".navChild").hover(
            function() {
                clearTimeout(timeout); 
            },
            function() {
                timeout = setTimeout(() => {
                    $(this).slideUp('slow');
                    $('.main').css('filter', 'blur(0px)');
                }, 500);
            }
        );
    });
</script>

    <script>
   $(document).ready(function() {
    var burger = $(".burger-container");
    var header = $(".header");
    var containernav = $(".containernav");

    burger.on("click", function() {
        console.log("clicked");
        if (containernav.height() === $(window).height()) {
            containernav.css("height", "0");
        } 
        header.toggleClass("menu-opened");
    });
});

    </script>
    <script>
        $(document).ready(function() {
            $('a[data-category-id]').on('click', function() {
                var categoryId = $(this).data('category-id');

                console.log(categoryId);

                $.ajax({
                    url: `{{ route('product.category') }}`,
                    method: 'GET',
                    data: {
                        category_id: categoryId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#product-list').html(response);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>


    @stack('js')
</body>

</html>
