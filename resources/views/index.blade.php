@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/parasite.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/joker.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/sonic.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/frozen2.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>

                {{-- end fist --}}
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/parasite.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible"
                                    transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/joker.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible"
                                    transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/sonic.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible"
                                    transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#" class="">
                        <img src="/img/frozen2.jpg" alt="parasite"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="" class="text-lg mt-2 hover:text-gray-300">Parasite</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path style="marker:none" fill="#f8b84e"
                                    d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z"
                                    color="#000" overflow="visible"
                                    transform="matrix(.04574 0 0 .04561 68.85 -40.34)" />
                            </svg>
                            <span class="ml-1">80%</span>
                            <span class="mx-2">|</span>
                            <span class="">Feb 20, 2022</span>
                        </div>
                        <div class="text-gray-400 text-sm">Action, Thriller, Comedy</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
