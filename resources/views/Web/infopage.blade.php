@extends('web.layouts.header')

@section('content')
    <div class="movie-info md:grid place-content-center">
        <div class="container px-4 py-10 flex items-center">
            <img src="/img/parasite.jpg" alt="parasite" class="w-28 md:h-auto h-28 md:w-52 md:rounded rounded-full ">
            <div class="md:ml-10 ml-6">
                <h2 class="md:text-3xl md:mt-10 text-2xl font-bold">Parasite</h2>
                <div class="mt-6">
                    <button
                        class="flex popup-modal items-center bg-orange-500 text-gray-900 rounded font-semibold px-2 py-1 hover:bg-orange-600 transition ease-in-out duration-150">
                        <ion-icon class="text-2xl" name="log-in-outline" type="button"></ion-icon>
                        <span class="ml-1">Login</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end movie info --}}

    <div>
        <div class="flex justify-around items-center border-b-2">
            <ion-icon class="text-2xl images cursor-pointer mb-1" name="images"></ion-icon>
            <ion-icon class="text-2xl videos cursor-pointer mb-1" name="videocam"></ion-icon>
        </div>

        {{-- Free Image --}}
        <div class="images-cast images" id="images">
            <div class="container mx-auto px-2 py-3">
                <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-1">
                    <div class="">
                        <a href="#" class="">
                            <img src="/img/image1.jpg" alt="parasite"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="">
                            <img src="/img/image2.jpg" alt="parasite"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="">
                            <img src="/img/image3.jpg" alt="parasite"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                </div>
            </div>
            {{-- Paid Image --}}
            <div class="container mx-auto p-2">
                <p class="font-extrabold border-b-2">login and seen the images </p>
                <div class="grid grid-cols-1 mt-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-4" id="imagepaid">
                    <img src="/img/image4.jpg" alt="parasite" class="">
                    <img src="/img/image5.jpg" alt="parasite" class="">
                </div>
            </div>
            {{-- END Paid Image --}}
        </div>
        {{-- END Free Image --}}

        {{-- Paid Video --}}
        <div class="videos-cast videos hidden" id="videos">
            <div class="container mx-auto px-2 py-3">
                <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-1">
                    <div class="">
                        <a href="#" class="">
                            <img src="/img/image5.jpg" alt="parasite"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                </div>
            </div>
            {{-- Paid Video --}}
            <div class="container mx-auto p-2">
                <p class="font-extrabold border-b-2">login and seen the videos </p>
                <div class="grid grid-cols-1 mt-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-4" id="videopaid">
                    <img src="/img/image5.jpg" alt="parasite">
                    <img src="/img/image6.jpg" alt="parasite">
                </div>
            </div>
            {{-- END Paid Video --}}
        </div>
        {{-- END Free Video --}}
    </div>

    {{-- LOGIN FORM --}}
    <div id="popup-modal" tabindex="-1" aria-hidden="true"
        class="absolute top-10 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow bg-gradient-to-t from-[#ff9d8a] to-[#ebc998]">
                <button type="button"
                    class="close absolute top-3 right-2.5 text-white bg-transparent hover:bg-white hover:text-black rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
                    <form class="space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-black dark:placeholder-black dark:text-black"
                                placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-black dark:placeholder-black dark:text-black"
                                required>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value=""
                                        class="w-4 h-4 border border-black rounded bg-white focus:ring-3 focus:ring-white dark:bg-white dark:border-black dark:focus:ring-black dark:ring-offset-white dark:focus:ring-offset-white"
                                        required>
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-white dark:text-white">Remember
                                    me</label>
                            </div>
                            <a href="#" class="text-sm text-black hover:underline dark:text-black">Lost
                                Password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-black hover:bg-white hover:text-black ring-1 ring-white focus:ring-1 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-white dark:hover:text-black dark:focus:ring-black">Login
                            to your account</button>
                        <div class="text-sm font-medium text-white dark:text-white">
                            Not registered? <a href="#" class="text-black hover:underline dark:text-black">Create
                                account</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#imagepaid,#videopaid").addClass("opacity-5");

            $(".close").click(function() {
                $("#popup-modal").addClass("hidden");
                $("#popup-modal").removeClass("block");
            });
            $(".popup-modal").click(function() {
                $("#popup-modal").addClass("block");
                $("#popup-modal").removeClass("hidden");
            });
            $(".images").click(function() {
                $("#images").addClass("block");
                $("#images").removeClass("hidden");
                $("#videos").addClass("hidden");
            });
            $(".videos").click(function() {
                $("#videos").addClass("block");
                $("#videos").removeClass("hidden");
                $("#images").addClass("hidden");
            });
        });
    </script>
@endsection
