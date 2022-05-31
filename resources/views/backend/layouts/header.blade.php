<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        #sidebar {
            width: 250px;
            transition: all 0.4s ease;
            top: 0;
            left: 0;
        }

        #sidebar.sidebarClose {
            left: -252px;
        }

        .mainContentArea {
            padding-left: 280px;
            transition: all 0.4s ease;
        }

        .mainContentArea.fullWidthContent {
            padding-left: 32px;
        }

        #headerDropdown {
            display: none;
        }

    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <div class="h-16 bg-sky-300 shadow-sm pr-8 fixed w-full top-0 left-0 flex items-center mainContentArea"
            id="headerTop">
            <div class="text-xl">
                <i class="fa-solid fa-bars cursor-pointer" id="toggle-btn"></i>
                <span class="ml-2 font-semibold">@yield('page')</span>
            </div>
            <div class="ml-auto flex items-center">
                <div>Welcome, {{ auth()->user()->name }}</div>
            </div>

            <div class="ml-4 relative">
                <div class="cursor-pointer flex">
                    <img class="w-8 h-8 rounded-full object-cover"
                        src="https://ui-avatars.com/api/?uppercase=false&name=different+Case" />
                    <div class="mt-2 ml-2" id="downArrow">
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>

                <div class="absolute z-50 mt-4 rounded-md shadow-lg w-48 right-0 py-1 bg-white" id="headerDropdown">
                    <div class="px-4 py-2 text-xs text-gray-400">Manage Account</div>
                    <a href="#"
                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 transition">Profile</a>
                    <div class="border-t border-gray-100"></div>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 transition">Logout</button>

                    </form>



                </div>
            </div>
        </div>
