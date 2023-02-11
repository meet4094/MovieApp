@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="/img/parasite.jpg" alt="parasite" class="w-64 md:w-96">
            <div class="md:ml-24 mt-4">
                <h2 class="text-4xl font-semibold">Parasite (2019)</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                        <path style="marker:none" fill="#f8b84e"
                            d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                            color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                    </svg>
                    <span class="ml-1">80%</span>
                    <span class="mx-2">|</span>
                    <span class="">Feb 20, 2022</span>
                    <span class="mx-2">|</span>
                    <span class="">Action, Thriller, Drama</span>
                </div>
                <p class="text-gray-300 mt-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reprehenderit
                    magnam quod eos dolorum nihil sint odit amet, iure similique laborum. Commodi omnis voluptas a
                    reiciendis perferendis, harum reprehenderit? Assumenda! Lorem ipsum, dolor sit amet consectetur
                    adipisicing elit. Consectetur iste alias sapiente! Laboriosam beatae omnis, ipsum facere quo, labore
                    laudantium consectetur aperiam, totam quisquam dignissimos sit asperiores quibusdam reiciendis nam.
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Screenplay, Director, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Bong Joon-ho</div>
                            <div class="text-sm text-gray-400">Screenplay</div>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <button
                        class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16,10.27,11,7.38A2,2,0,0,0,8,9.11v5.78a2,2,0,0,0,1,1.73,2,2,0,0,0,2,0l5-2.89a2,2,0,0,0,0-3.46ZM15,12l-5,2.89V9.11L15,12ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" />
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end movie info --}}

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/actor1.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <h1 class="text-white text-lg">Real Name</h1>
                        <h2 class="text-white">John Smit</h2>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/actor2.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <h1 class="text-white text-lg">Real Name</h1>
                        <h2 class="text-white">John Smit</h2>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/actor3.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <h1 class="text-white text-lg">Real Name</h1>
                        <h2 class="text-white">John Smit</h2>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/actor4.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <h1 class="text-white text-lg">Real Name</h1>
                        <h2 class="text-white">John Smit</h2>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/actor5.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <h1 class="text-white text-lg">Real Name</h1>
                        <h2 class="text-white">John Smit</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-8">
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image1.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image2.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image3.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image4.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image5.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/image6.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
