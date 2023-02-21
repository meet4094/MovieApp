<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="font-sans bg-blue-50">
    <h2 class="md:block hidden font-bold text-3xl">this website is not sapota</h2>
    <div class="md:hidden" id="maindiv">
        <header class="bg-gradient-to-t from-[#ff9d8a] to-[#ebc998] rounded-b-2xl font-bold">
            <nav class="container flex justify-between items-center mx-auto">
                <div class="py-3 px-4">
                    <a href="#" class="flex" style="align-items: center">
                        <span class="ml-2 text-lg">ABCD</span>
                    </a>
                </div>
                <ion-icon class="text-3xl md:hidden pr-4" onclick="onToggleMenu(this)" name="menu"></ion-icon>
                <div
                    class="nav-links md:bg-transparent bg-blue-50 duration-700 md:static absolute md:min-h-fit min-h-max left-0 top-[-100%] md:w-auto w-full">
                    <ul class="flex md:flex-row flex-col md:items-center md:gap-[3vw] gap-5 m-5">
                        <li class="">
                            <a href="/" class="hover:text-gray-600">Home</a>
                        </li>
                        <li class="">
                            <a href="about" class="hover:text-gray-600">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>
    <script>
        const navLinks = document.querySelector('.nav-links');

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu';
            navLinks.classList.toggle('top-[10%]')
        }
    </script>

</body>

</html>
