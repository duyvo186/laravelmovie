<x-front-layout>
    <style>
        html {
            height: 100%;
        }

        body {
            background: #FFF;
            font: 400 1.5em/1.5 "Droid Serif", serif;
            color: #111;
            text-align: center;
            height: 100%;
        }

        h1 {
            font: 700 2.8em/1.2 "Droid Sans", sans-serif;
        }

        h2 {
            font: 700 1.5em/1.5 "Droid Sans", sans-serif;
            margin: 1em 0;
        }

        #banner {
            background: url(https://static1.colliderimages.com/wordpress/wp-content/uploads/2022/01/15-Best-Time-Travel-Movies.jpg?q=50&fit=contain&w=1140&h=&dpr=1.5) no-repeat fixed 100% 100%;
            background-size: cover;
            color: #fff;
            height: 100%;
            width: 100%;
        }

        #bannertext {
            width: 24em;
            position: fixed;
            top: 20%;
            left: 50%;
            border: .5em solid #fff;
            margin-left: -12em;
            padding: 2em 0;
        }

        #content {
            max-width: 28em;
            text-align: justify;
            margin: 0 auto;
            padding: 2em;
        }

        #content p {
            margin: 0 0 2em;
        }
    </style>

    <script>
        function EasyPeasyParallax() {
            scrollPos = $(this).scrollTop();
            $('#banner').css({
                'background-position': '50% ' + (-scrollPos / 4) + "px"
            });
            $('#bannertext').css({
                'margin-top': (scrollPos / 4) + "px",
                'opacity': 1 - (scrollPos / 250)
            });
        }
        $(document).ready(function() {
            $(window).scroll(function() {
                EasyPeasyParallax();
            });
        });
    </script>

    <div id="banner">

    </div>

    <section class="bg-gray-200 dark:bg-gray-900 dark:text-white mt-4 p-2 rounded">
        <div class="m-2 p-2 text-2xl font-bold text-indigo-600 dark:text-indigo-300">
            <h1>Movies</h1>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 rounded">
            @foreach ($movies as $movie)
                <x-movie-card>
                    <x-slot name="image">
                        <a href="{{ route('movies.show', $movie->slug) }}">
                            <div class="aspect-w-2 aspect-h-3">
                                <img class="object-cover"
                                    src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie->poster_path }}">
                            </div>
                            <div
                                class="absolute x-10 left-2 top-2 h-6 w-12 bg-gray-800 group-hover:bg-gray-700 text-blue-400 text-center rounded">
                                New
                            </div>
                            <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                            <div class="absolute inset-y-0 left-5 z-10 invisible group-hover:visible flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-12 w-12 text-blue-700 bg-red-700 rounded-full" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div
                                    class="absolute transition opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-16 group-hover:pr-2 text-white font-bold">
                                    Play</div>
                            </div>
                            <div
                                class="absolute z-10 bottom-2 left-2 text-indigo-300 text-sm font-bold group-hover:text-blue-700">
                                @foreach ($movie->genres as $genre)
                                    {{ $genre->title }}
                                @endforeach
                            </div>
                        </a>
                    </x-slot>
                    <a href="{{ route('movies.show', $movie->slug) }}">
                        <div class="dark:text-white font-bold group-hover:text-blue-400">
                            {{ $movie->title }}
                        </div>
                    </a>
                </x-movie-card>
            @endforeach
        </div>
    </section>

    <section class="bg-gray-200 dark:bg-gray-900 dark:text-white mt-4 p-2 rounded">
        <div class="tabs">
            <div class="tabs-header">
                <div class="border"></div>
                <ul>

                    <li class="active"><a href="#tab-2" tab-id="2" ripple="ripple" ripple-color="#FFF">Year 2020</a></li>
                    <li><a href="#tab-3" tab-id="3" ripple="ripple" ripple-color="#FFF">Year 2021</a></li>
                    <li><a href="#tab-4" tab-id="4" ripple="ripple" ripple-color="#FFF">Year 2022</a></li>
                </ul>
                <nav class="tabs-nav"><i class="material-icons" id="prev" ripple="ripple"
                        ripple-color="#FFF">&#xE314;</i><i class="material-icons" id="next" ripple="ripple"
                        ripple-color="#FFF">&#xE315;</i></nav>
            </div>
            <div class="tabs-content">

                <div class="tab active" tab-id="2"><div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 rounded">
                    @foreach ($moviesSortYear2020 as $movie)
                        <x-movie-card>
                            <x-slot name="image">
                                <a href="{{ route('movies.show', $movie->slug) }}">
                                    <div class="aspect-w-2 aspect-h-3">
                                        <img class="object-cover"
                                            src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie->poster_path }}">
                                    </div>
                                    <div
                                        class="absolute x-10 left-2 top-2 h-6 w-12 bg-gray-800 group-hover:bg-gray-700 text-blue-400 text-center rounded">
                                        New
                                    </div>
                                    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute inset-y-0 left-5 z-10 invisible group-hover:visible flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-12 w-12 text-blue-700 bg-red-700 rounded-full" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="absolute transition opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-16 group-hover:pr-2 text-white font-bold">
                                            Play</div>
                                    </div>
                                    <div
                                        class="absolute z-10 bottom-2 left-2 text-indigo-300 text-sm font-bold group-hover:text-blue-700">
                                        @foreach ($movie->genres as $genre)
                                            {{ $genre->title }}
                                        @endforeach
                                    </div>
                                </a>
                            </x-slot>
                            <a href="{{ route('movies.show', $movie->slug) }}">
                                <div class="dark:text-white font-bold group-hover:text-blue-400">
                                    {{ $movie->title }}
                                </div>
                            </a>
                        </x-movie-card>
                    @endforeach
                </div></div>
                <div class="tab" tab-id="3"><div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 rounded">
                    @foreach ($moviesSortYear2021 as $movie)
                        <x-movie-card>
                            <x-slot name="image">
                                <a href="{{ route('movies.show', $movie->slug) }}">
                                    <div class="aspect-w-2 aspect-h-3">
                                        <img class="object-cover"
                                            src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie->poster_path }}">
                                    </div>
                                    <div
                                        class="absolute x-10 left-2 top-2 h-6 w-12 bg-gray-800 group-hover:bg-gray-700 text-blue-400 text-center rounded">
                                        New
                                    </div>
                                    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute inset-y-0 left-5 z-10 invisible group-hover:visible flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-12 w-12 text-blue-700 bg-red-700 rounded-full" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="absolute transition opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-16 group-hover:pr-2 text-white font-bold">
                                            Play</div>
                                    </div>
                                    <div
                                        class="absolute z-10 bottom-2 left-2 text-indigo-300 text-sm font-bold group-hover:text-blue-700">
                                        @foreach ($movie->genres as $genre)
                                            {{ $genre->title }}
                                        @endforeach
                                    </div>
                                </a>
                            </x-slot>
                            <a href="{{ route('movies.show', $movie->slug) }}">
                                <div class="dark:text-white font-bold group-hover:text-blue-400">
                                    {{ $movie->title }}
                                </div>
                            </a>
                        </x-movie-card>
                    @endforeach
                </div>
                </div>
                <div class="tab" tab-id="4"> <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 rounded">
                    @foreach ($moviesSortYear2022 as $movie)
                        <x-movie-card>
                            <x-slot name="image">
                                <a href="{{ route('movies.show', $movie->slug) }}">
                                    <div class="aspect-w-2 aspect-h-3">
                                        <img class="object-cover"
                                            src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $movie->poster_path }}">
                                    </div>
                                    <div
                                        class="absolute x-10 left-2 top-2 h-6 w-12 bg-gray-800 group-hover:bg-gray-700 text-blue-400 text-center rounded">
                                        New
                                    </div>
                                    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute inset-y-0 left-5 z-10 invisible group-hover:visible flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-12 w-12 text-blue-700 bg-red-700 rounded-full" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div
                                            class="absolute transition opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-16 group-hover:pr-2 text-white font-bold">
                                            Play</div>
                                    </div>
                                    <div
                                        class="absolute z-10 bottom-2 left-2 text-indigo-300 text-sm font-bold group-hover:text-blue-700">
                                        @foreach ($movie->genres as $genre)
                                            {{ $genre->title }}
                                        @endforeach
                                    </div>
                                </a>
                            </x-slot>
                            <a href="{{ route('movies.show', $movie->slug) }}">
                                <div class="dark:text-white font-bold group-hover:text-blue-400">
                                    {{ $movie->title }}
                                </div>
                            </a>
                        </x-movie-card>
                    @endforeach
                </div></div>
                <div class="tab" tab-id="5">5. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo
                    quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus
                    porttitor.Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam eget risus varius
                    blandit sit amet non magna. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus,
                    porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum
                    faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed
                    diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus
                    posuere velit aliquet. Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum
                    nulla sed consectetur. Donec id elit non mi porta gravida at eget metus. Donec id elit non mi porta
                    gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus mus. Maecenas faucibus mollis interdum. Praesent commodo cursus magna, vel scelerisque
                    nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Maecenas faucibus mollis
                    interdum. Donec ullamcorper nulla non metus auctor fringilla. Aenean lacinia bibendum nulla sed
                    consectetur. Aenean lacinia bibendum nulla sed consectetur.</div>
            </div>
        </div>


        <style>

            [ripple] {
                z-index: 1;
                position: relative;
                overflow: hidden;
            }

            [ripple] .ripple {
                position: absolute;
                background: #FFFFFF;
                width: 12px;
                height: 12px;
                border-radius: 100%;
                -webkit-animation: ripple 1.6s;
                animation: ripple 1.6s;
            }

            @-webkit-keyframes ripple {
                0% {
                    transform: scale(1);
                    opacity: 0.2;
                }

                100% {
                    transform: scale(40);
                    opacity: 0;
                }
            }

            @keyframes ripple {
                0% {
                    transform: scale(1);
                    opacity: 0.2;
                }

                100% {
                    transform: scale(40);
                    opacity: 0;
                }
            }

            .tabs {
                z-index: 15px;
                position: relative;
                background: #202124;
                border-radius: 4px;
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                box-sizing: border-box;
                margin: 0px auto 10px;
                overflow: hidden;
            }

            .tabs-header {
                position: relative;
                background: #202124;
                overflow: hidden;
            }

            .tabs-header .border {
                position: absolute;
                bottom: 0;
                left: 0;
                background: #F4B142;
                width: auto;
                height: 2px;
                transition: 0.3s ease;
            }

            .tabs-header ul {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                width: calc(100% - 68px);
            }

            .tabs-header li {
                transition: 0.3s ease;
            }

            .tabs-header a {
                z-index: 1;
                display: block;
                box-sizing: border-box;
                padding: 15px 20px;
                color: #60A5FA;
                font-size: 20px;
            font-family:'Droid-Serif', serif;
                font-weight: 500;
                text-decoration: none;
                text-transform: uppercase;
            }

            .tabs-nav {
                position: absolute;
                top: 0;
                right: 0;
                background: #4285F4;
                display: flex;
                align-items: center;
                height: 100%;
                padding: 0 10px;
                color: #FFFFFF;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .tabs-nav:before {
                content: "";
                z-index: 1;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                box-shadow: 0 0 20px 10px #4285F4;
            }

            .tabs-nav i {
                border-radius: 100%;
                cursor: pointer;
            }

            .tabs-content {
                position: relative;
                padding: 15px 20px;
                transition: 0.3s ease;
                overflow: hidden;
            }

            .tabs-content:after {
                /* content: "";
                position: absolute;
                bottom: -1px;
                left: 0;
                display: block;
                width: 100%;
                height: 1px;
                box-shadow: 0 0 20px 10px #FFFFFF; */
            }

            .tabs-content .tab {
                display: none;
            }

            .tabs-content .tab.active {
                display: block;
            }

            .pen-footer {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 600px;
                margin: 20px auto 100px;
            }

            .pen-footer a {
                color: #FFFFFF;
                font-size: 12px;
                text-decoration: none;
                text-shadow: 1px 2px 0 rgba(0, 0, 0, 0.1);
            }

            .pen-footer a .material-icons {
                width: 12px;
                margin: 0 5px;
                vertical-align: middle;
                font-size: 12px;
            }

            .cp-fab {
                background: #FFFFFF !important;
                color: #4285F4 !important;
            }
        </style>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" integrity="sha512-egJ/Y+22P9NQ9aIyVCh0VCOsfydyn8eNmqBy+y2CnJG+fpRIxXMS6jbWP8tVKp0jp+NO5n8WtMUAnNnGoJKi4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {

                // Intial Border Position
                var activePos = $('.tabs-header .active').position();

                // Change Position
                function changePos() {

                    // Update Position
                    activePos = $('.tabs-header .active').position();

                    // Change Position & Width
                    $('.border').stop().css({
                        left: activePos.left,
                        width: $('.tabs-header .active').width()
                    });
                }

                changePos();

                // Intial Tab Height
                var tabHeight = $('.tab.active').height();

                // Animate Tab Height
                function animateTabHeight() {

                    // Update Tab Height
                    tabHeight = $('.tab.active').height();

                    // Animate Height
                    $('.tabs-content').stop().css({
                        height: tabHeight +100+ 'px'
                    });
                }

                animateTabHeight();

                // Change Tab
                function changeTab() {
                    var getTabId = $('.tabs-header .active a').attr('tab-id');

                    // Remove Active State
                    $('.tab').stop().fadeOut(300, function() {
                        // Remove Class
                        $(this).removeClass('active');
                    }).hide();

                    $('.tab[tab-id=' + getTabId + ']').stop().fadeIn(300, function() {
                        // Add Class
                        $(this).addClass('active');

                        // Animate Height
                        animateTabHeight();
                    });
                }

                // Tabs
                $('.tabs-header a').on('click', function(e) {
                    e.preventDefault();

                    // Tab Id
                    var tabId = $(this).attr('tab-id');

                    // Remove Active State
                    $('.tabs-header a').stop().parent().removeClass('active');

                    // Add Active State
                    $(this).stop().parent().addClass('active');

                    changePos();

                    // Update Current Itm
                    tabCurrentItem = tabItems.filter('.active');

                    // Remove Active State
                    $('.tab').stop().fadeOut(300, function() {
                        // Remove Class
                        $(this).removeClass('active');
                    }).hide();

                    // Add Active State
                    $('.tab[tab-id="' + tabId + '"]').stop().fadeIn(300, function() {
                        // Add Class
                        $(this).addClass('active');

                        // Animate Height
                        animateTabHeight();
                    });
                });

                // Tab Items
                var tabItems = $('.tabs-header ul li');

                // Tab Current Item
                var tabCurrentItem = tabItems.filter('.active');

                // Next Button
                $('#next').on('click', function(e) {
                    e.preventDefault();

                    var nextItem = tabCurrentItem.next();

                    tabCurrentItem.removeClass('active');

                    if (nextItem.length) {
                        tabCurrentItem = nextItem.addClass('active');
                    } else {
                        tabCurrentItem = tabItems.first().addClass('active');
                    }

                    changePos();
                    changeTab();
                });

                // Prev Button
                $('#prev').on('click', function(e) {
                    e.preventDefault();

                    var prevItem = tabCurrentItem.prev();

                    tabCurrentItem.removeClass('active');

                    if (prevItem.length) {
                        tabCurrentItem = prevItem.addClass('active');
                    } else {
                        tabCurrentItem = tabItems.last().addClass('active');
                    }

                    changePos();
                    changeTab();
                });

                // Ripple
                $('[ripple]').on('click', function(e) {
                    var rippleDiv = $('<div class="ripple" />'),
                        rippleOffset = $(this).offset(),
                        rippleY = e.pageY - rippleOffset.top,
                        rippleX = e.pageX - rippleOffset.left,
                        ripple = $('.ripple');

                    rippleDiv.css({
                        top: rippleY - (ripple.height() / 2),
                        left: rippleX - (ripple.width() / 2),
                        background: $(this).attr("ripple-color")
                    }).appendTo($(this));

                    window.setTimeout(function() {
                        rippleDiv.remove();
                    }, 0);
                });
            });
        </script>

    </section>
    <section class="bg-gray-200 dark:bg-gray-900 dark:text-white mt-4 p-2 rounded">
        <div class="m-2 p-2 text-2xl font-bold text-indigo-600 dark:text-indigo-300">
            <h1>Series</h1>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 rounded">
            @foreach ($series as $serie)
                <x-movie-card>
                    <x-slot name="image">
                        <a href="{{ route('series.show', $serie->slug) }}">
                            <div class="aspect-w-2 aspect-h-3">
                                <img class="object-cover"
                                    src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $serie->poster_path }}">
                            </div>
                            <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>

                            <div
                                class="absolute x-10 left-2 top-2 h-6 w-12 bg-gray-800 group-hover:bg-gray-700 text-blue-400 text-center rounded">
                                New
                            </div>
                            <div
                                class="absolute z-10 bottom-2 left-2 text-indigo-300 text-sm font-bold group-hover:text-blue-700">
                                {{ $serie->seasons_count }} Season/s
                            </div>
                        </a>
                    </x-slot>
                    <a href="{{ route('series.show', $serie->slug) }}">
                        <div class="dark:text-white font-bold group-hover:text-blue-400">
                            {{ $serie->name }}
                        </div>
                    </a>
                </x-movie-card>
            @endforeach
        </div>
    </section>
    </main>
</x-front-layout>
