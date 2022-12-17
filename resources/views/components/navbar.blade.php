    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
        integrity="sha512-egJ/Y+22P9NQ9aIyVCh0VCOsfydyn8eNmqBy+y2CnJG+fpRIxXMS6jbWP8tVKp0jp+NO5n8WtMUAnNnGoJKi4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="w-full text-gray-700 bg-white dark:text-gray-200 dark:bg-gray-800">
        <div x-data="{ open: true }"
            class="flex flex-col px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between space-x-2">
                <a href="/"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Movie
                    App</a>
                <livewire:search />
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row" @role('Guest') style="margin-top: -20px" @endrole>

                <a class="{{ request()->routeIs('movies.index') ? 'bg-gray-200 dark:bg-gray-700' : 'bg-transparent' }} px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('movies.index') }}">Movies</a>
                <a class="{{ request()->routeIs('series.index') ? 'bg-gray-200 dark:bg-gray-700' : 'bg-transparent' }} px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('series.index') }}">Series</a>
                <a class="{{ request()->routeIs('casts.index') ? 'bg-gray-200 dark:bg-gray-700' : 'bg-transparent' }} px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('casts.index') }}">Casts</a>
                <div @click.away="open = false" class="relative" x-data="{ open: true }">
                    <button @click="open = !open"
                        class="{{ request()->routeIs('genres.*') ? 'bg-gray-200 dark:bg-gray-700' : 'bg-transparent dark:bg-transparent' }} flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left rounded-lg dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Genres</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                            class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute z-10 right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-96">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark:bg-gray-800 flex flex-wrap">
                            @foreach (App\Models\Genre::all() as $genre)
                                <a class="text-sm p-2 m-2 font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ route('genres.show', $genre->slug) }}">{{ $genre->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <nav class="main-nav" id="open-close-nav">
                    <ul id="nav-sign-in-up">
                        <!-- inser more links here -->
                        <li><a class="cd-signin" href="#0">Sign in</a></li>
                        <li><a class="cd-signup" href="#0">Sign up</a></li>
                    </ul>
                    @role('Guest')
                        <ul id="have-guest">
                            <li>
                                <div x-data="{ dropdownOpen: false }" class="relative">
                                    <button @click="dropdownOpen = ! dropdownOpen"
                                        class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                                        <img class="h-full w-full object-cover"
                                            src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80"
                                            alt="Your avatar">
                                    </button>

                                    <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                        class="fixed inset-0 h-full w-full z-10"></div>

                                    <div x-show="dropdownOpen"
                                        class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                                        <a href="{{ route('profile.show') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                                        @role('admin')
                                            <a href="{{ route('admin.index') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Admin</a>
                                        @endrole
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white"
                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endrole
                </nav>
                {{-- <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form> --}}

                <div class="cd-user-modal">
                    <!-- this is the entire modal form, including the background -->
                    <div class="cd-user-modal-container">
                        <!-- this is the container wrapper -->
                        <ul class="cd-switcher">
                            <li><a href="#0">Sign in</a></li>
                            <li><a href="#0">New account</a></li>
                        </ul>

                        <div id="cd-login">
                            <!-- log in form -->

                            <x-jet-validation-errors class="mb-4 validate-error">

                            </x-jet-validation-errors>

                            <form method="POST" action="{{ route('login') }}" class="cd-form">
                                @csrf
                                <p class="fieldset">
                                    <label class="image-replace cd-email" for="email"
                                        value="{{ __('Email') }}">E-mail</label>
                                    <input class="full-width has-padding has-border" id="email" type="email"
                                        name="email" :value="old('email')" required autofocus />
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace cd-password" for="password"
                                        value="{{ __('Password') }}">Password</label>
                                    <input class="full-width has-padding has-border" id="password" type="password"
                                        name="password" required autocomplete="current-password" />
                                    <a href="#0" class="hide-password">Hide</a>
                                </p>

                                <p class="fieldset">
                                    <input type="checkbox" id="remember-me" checked>
                                    <label for="remember-me">Remember me</label>
                                </p>

                                <p class="fieldset">
                                    <button class="full-width" type="submit" value="Login">
                                </p>
                                {{ __('Log in') }}
                            </form>

                            <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
                            <!-- <a href="#0" class="cd-close-form">Close</a> -->


                        </div> <!-- cd-login -->

                        <div id="cd-signup">
                            <!-- sign up form -->
                            <form class="cd-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <p class="fieldset">
                                    <label class="image-replace cd-username" for="signup-username">Username</label>
                                    <input class="full-width has-padding has-border" type="text"
                                        placeholder="Username" id="name" name="name" :value="old('name')"
                                        required autofocus autocomplete="name">
                                    <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace cd-email" for="signup-email">E-mail</label>
                                    <input class="full-width has-padding has-border" id="email" type="email"
                                        placeholder="E-mail" name="email" :value="old('email')" required>
                                    <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace cd-password" for="password">Password</label>
                                    <input class="full-width has-padding has-border" id="password" type="password"
                                        name="password" placeholder="Password">
                                    <a href="#0" class="hide-password">Hide</a>
                                    <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace cd-password" for="password_confirmation">Password
                                        Confirmation</label>
                                    <input class="full-width has-padding has-border" id="password_confirmation"
                                        type="password" name="password_confirmation" placeholder="Password">
                                    <a href="#0" class="hide-password">Hide</a>
                                    <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                    <input type="checkbox" id="accept-terms">
                                    <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                                </p>

                                <x-jet-button class="ml-4">
                                    {{ __('Register') }}
                                </x-jet-button>
                            </form>

                            <!-- <a href="#0" class="cd-close-form">Close</a> -->
                        </div> <!-- cd-signup -->

                        {{-- <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-jet-label for="name" value="{{ __('Name') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                    name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms" />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <x-jet-button class="ml-4">
                                    {{ __('Register') }}
                                </x-jet-button>
                            </div>
                        </form> --}}
                        <div id="cd-reset-password">
                            <!-- reset password form -->
                            <p class="cd-form-message">Lost your password? Please enter your email address. You will
                                receive a link to create a new password.</p>

                            <form class="cd-form">
                                <p class="fieldset">
                                    <label class="image-replace cd-email" for="reset-email">E-mail</label>
                                    <input class="full-width has-padding has-border" id="reset-email" type="email"
                                        placeholder="E-mail">
                                    <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width has-padding" type="submit" value="Reset password">
                                </p>
                            </form>

                            <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
                        </div> <!-- cd-reset-password -->
                        <a href="#0" class="cd-close-form">Close</a>
                    </div> <!-- cd-user-modal-container -->
                </div> <!-- cd-user-modal -->
        </div>

        </nav>
    </div>

    <style>
        /* --------------------------------


/* --------------------------------

Main components

-------------------------------- */
        header[role=banner] {
            position: relative;
            height: 50px;
            background: #343642;
        }

        header[role=banner] #cd-logo {
            float: left;
            margin: 4px 0 0 5%;
            /* reduce logo size on mobile and make sure it is left aligned with the transform-origin property */
            -webkit-transform-origin: 0 50%;
            -moz-transform-origin: 0 50%;
            -ms-transform-origin: 0 50%;
            -o-transform-origin: 0 50%;
            transform-origin: 0 50%;
            -webkit-transform: scale(0.8);
            -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
            -o-transform: scale(0.8);
            transform: scale(0.8);
        }

        header[role=banner] #cd-logo img {
            display: block;
        }

        header[role=banner]::after {
            /* clearfix */
            content: "";
            display: table;
            clear: both;
        }

        @media only screen and (min-width: 768px) {
            header[role=banner] {
                height: 80px;
            }

            header[role=banner] #cd-logo {
                margin: 20px 0 0 5%;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        .main-nav {
            float: right;
            margin-right: 5%;
            width: 44px;
            height: 100%;
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-menu.svg") no-repeat center center;
            cursor: pointer;
        }

        .main-nav ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            -webkit-transform: translateY(-100%);
            -moz-transform: translateY(-100%);
            -ms-transform: translateY(-100%);
            -o-transform: translateY(-100%);
            transform: translateY(-100%);
        }

        .main-nav ul.is-visible {
            -webkit-transform: translateY(50px);
            -moz-transform: translateY(50px);
            -ms-transform: translateY(50px);
            -o-transform: translateY(50px);
            transform: translateY(50px);
        }

        /* .main-nav a {
            display: block;
            height: 50px;
            line-height: 50px;
            padding-left: 5%;
            background: #292a34;
            border-top: 1px solid #3b3d4b;
            color: #fff;
        } */

        @media only screen and (min-width: 768px) {
            .main-nav {
                width: auto;
                height: auto;
                background: none;
                cursor: auto;
            }

            .main-nav ul {
                position: static;
                width: auto;
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -ms-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0);
                line-height: 80px;
            }

            .main-nav ul.is-visible {
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -ms-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0);
            }

            .main-nav li {
                display: inline-block;
                margin-left: 1em;
            }

            .main-nav li:nth-last-child(2) {
                margin-left: 2em;
            }

            .main-nav a {
                /* display: inline-block;
                height: auto;
                line-height: normal;
                background: transparent; */
            }

            .main-nav a.cd-signin,
            .main-nav a.cd-signup {
                padding: 0.6em 1em;
                border: 1px solid rgba(255, 255, 255, 0.6);
                border-radius: 50em;
            }

            .main-nav a.cd-signup {
                background: #2f889a;
                border: none;
            }
        }

        /* --------------------------------

xsigin/signup popup

-------------------------------- */
        .bg-transparent {
            margin-top: 20px;
            font-size: 20px;
            font-weight: 100;

        }

        .cd-user-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(52, 54, 66, 0.9);
            z-index: 3;
            overflow-y: auto;
            cursor: pointer;
            visibility: hidden;
            opacity: 0;
            -webkit-transition: opacity 0.3s 0, visibility 0 0.3s;
            -moz-transition: opacity 0.3s 0, visibility 0 0.3s;
            transition: opacity 0.3s 0, visibility 0 0.3s;
        }

        .cd-user-modal.is-visible {
            visibility: visible;
            opacity: 1;
            -webkit-transition: opacity 0.3s 0, visibility 0 0;
            -moz-transition: opacity 0.3s 0, visibility 0 0;
            transition: opacity 0.3s 0, visibility 0 0;
        }

        .cd-user-modal.is-visible .cd-user-modal-container {
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            -o-transform: translateY(0);
            transform: translateY(0);
        }

        .cd-user-modal-container {
            position: relative;
            width: 90%;
            max-width: 600px;
            background: #fff;
            margin: 3em auto 4em;
            cursor: auto;
            border-radius: 0.25em;
            -webkit-transform: translateY(-30px);
            -moz-transform: translateY(-30px);
            -ms-transform: translateY(-30px);
            -o-transform: translateY(-30px);
            transform: translateY(-30px);
            -webkit-transition-property: -webkit-transform;
            -moz-transition-property: -moz-transform;
            transition-property: transform;
            -webkit-transition-duration: 0.3s;
            -moz-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .cd-user-modal-container .cd-switcher::after {
            clear: both;
            content: "";
            display: table;
        }

        .cd-user-modal-container .cd-switcher li {
            width: 50%;
            float: left;
            text-align: center;
        }

        .cd-user-modal-container .cd-switcher li:first-child a {
            border-radius: 0.25em 0 0 0;
        }

        .cd-user-modal-container .cd-switcher li:last-child a {
            border-radius: 0 0.25em 0 0;
        }

        .cd-user-modal-container .cd-switcher a {
            display: block;
            width: 100%;
            height: 50px;
            line-height: 50px;
            background: #d2d8d8;
            color: #809191;
        }

        .cd-user-modal-container .cd-switcher a.selected {
            background: #fff;
            color: #505260;
        }

        @media only screen and (min-width: 600px) {
            .cd-user-modal-container {
                margin: 4em auto;
            }

            .cd-user-modal-container .cd-switcher a {
                height: 70px;
                line-height: 70px;
            }
        }

        .cd-form {
            padding: 1.4em;
        }

        .cd-form .fieldset {
            position: relative;
            margin: 1.4em 0;
        }

        .cd-form .fieldset:first-child {
            margin-top: 0;
        }

        .cd-form .fieldset:last-child {
            margin-bottom: 0;
        }

        .cd-form label {
            font-size: 14px;
            font-size: 0.875rem;
        }

        .cd-form label.image-replace {
            /* replace text with an icon */
            display: inline-block;
            position: absolute;
            left: 15px;
            top: 50%;
            bottom: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            height: 20px;
            width: 20px;
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            color: transparent;
            text-shadow: none;
            background-repeat: no-repeat;
            background-position: 50% 0;
        }

        .cd-form label.cd-username {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-username.svg");
        }

        .cd-form label.cd-email {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-email.svg");
        }

        .cd-form label.cd-password {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-password.svg");
        }

        .cd-form input {
            margin: 0;
            padding: 0;
            border-radius: 0.25em;
        }

        .cd-form input.full-width {
            width: 100%;
        }

        .cd-form input.has-padding {
            padding: 12px 20px 12px 50px;
        }

        .cd-form input.has-border {
            border: 1px solid #d2d8d8;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }

        .cd-form input.has-border:focus {
            border-color: #343642;
            box-shadow: 0 0 5px rgba(52, 54, 66, 0.1);
            outline: none;
        }

        .cd-form input[type=password] {
            /* space left for the HIDE button */
            padding-right: 65px;
        }

        .cd-form input[type=submit] {
            padding: 16px 0;
            cursor: pointer;
            background: #242424;
            color: #fff;
            font-weight: bold;
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }

        .no-touch .cd-form input[type=submit]:hover,
        .no-touch .cd-form input[type=submit]:focus {
            background: #242424;
            outline: none;
        }

        .cd-form .hide-password {
            display: inline-block;
            position: absolute;
            right: 0;
            top: 0;
            padding: 6px 15px;
            border-left: 1px solid #d2d8d8;
            top: 50%;
            bottom: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 14px;
            font-size: 0.875rem;
            color: #343642;
        }

        .cd-form .cd-error-message {
            display: inline-block;
            position: absolute;
            left: -5px;
            bottom: -35px;
            background: rgba(215, 102, 102, 0.9);
            padding: 0.8em;
            z-index: 2;
            color: #fff;
            font-size: 13px;
            font-size: 0.8125rem;
            border-radius: 0.25em;
            /* prevent click and touch events */
            pointer-events: none;
            visibility: hidden;
            opacity: 0;
            -webkit-transition: opacity 0.2s 0, visibility 0 0.2s;
            -moz-transition: opacity 0.2s 0, visibility 0 0.2s;
            transition: opacity 0.2s 0, visibility 0 0.2s;
        }

        .cd-form .cd-error-message::after {
            /* triangle */
            content: "";
            position: absolute;
            left: 22px;
            bottom: 100%;
            height: 0;
            width: 0;
            border-bottom: 8px solid rgba(215, 102, 102, 0.9);
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
        }

        .cd-form .cd-error-message.is-visible {
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.2s 0, visibility 0 0;
            -moz-transition: opacity 0.2s 0, visibility 0 0;
            transition: opacity 0.2s 0, visibility 0 0;
        }

        @media only screen and (min-width: 600px) {
            .cd-form {
                padding: 2em;
            }

            .cd-form .fieldset {
                margin: 2em 0;
            }

            .cd-form .fieldset:first-child {
                margin-top: 0;
            }

            .cd-form .fieldset:last-child {
                margin-bottom: 0;
            }

            .cd-form input.has-padding {
                padding: 16px 20px 16px 50px;
            }

            .cd-form input[type=submit] {
                padding: 16px 0;
            }
        }

        .cd-form-message {
            padding: 1.4em 1.4em 0;
            font-size: 14px;
            font-size: 0.875rem;
            line-height: 1.4;
            text-align: center;
        }

        @media only screen and (min-width: 600px) {
            .cd-form-message {
                padding: 2em 2em 0;
            }
        }

        .cd-form-bottom-message {
            position: absolute;
            width: 100%;
            left: 0;
            bottom: -30px;
            text-align: center;
            font-size: 14px;
            font-size: 0.875rem;
        }

        .cd-form-bottom-message a {
            color: #fff;
            text-decoration: underline;
        }

        .cd-close-form {
            /* form X button on top right */
            display: block;
            position: absolute;
            width: 40px;
            height: 40px;
            right: 0;
            top: -40px;
            background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-close.svg") no-repeat center center;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

        @media only screen and (min-width: 1170px) {
            .cd-close-form {
                display: none;
            }
        }

        #cd-login,
        #cd-signup,
        #cd-reset-password {
            display: none;
        }

        #cd-login.is-selected,
        #cd-signup.is-selected,
        #cd-reset-password.is-selected {
            display: block;
        }
    </style>
    @if (session('status'))
        111111111111111111111111111111111111111111111111111111111111111111111111111
        {{-- <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div> --}}
    @endif


    <script>
        if ($('div.font-medium.text-red-600').length) {
            $(".cd-user-modal").last().removeClass("is-visible");
            $("div#cd-login").last().addClass("is-selected");
        }
        if ($('#have-guest').length) {
            $('ul#nav-sign-in-up').empty();
           $('nav#open-close-nav.main-nav').removeClass('main-nav').addClass('new-nav');
            $('nav#open-close-nav.new-nav').css({
                "width" : "auto",
                "height" : "auto",
                "background": "none",
                "cursor": "auto",
                "float": "right",
                "margin-right": "5%",
                "margin-top" : "20px",
            });
        }
        jQuery(document).ready(function($) {
            var $form_modal = $('.cd-user-modal'),
                $form_login = $form_modal.find('#cd-login'),
                $form_signup = $form_modal.find('#cd-signup'),
                $form_forgot_password = $form_modal.find('#cd-reset-password'),
                $form_modal_tab = $('.cd-switcher'),
                $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
                $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
                $forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
                $back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
                $main_nav = $('.main-nav');

            //open modal
            $main_nav.on('click', function(event) {

                if ($(event.target).is($main_nav)) {
                    // on mobile open the submenu
                    $(this).children('ul').toggleClass('is-visible');
                } else {
                    // on mobile close submenu
                    $main_nav.children('ul').removeClass('is-visible');
                    //show modal layer
                    $form_modal.addClass('is-visible');
                    //show the selected form
                    ($(event.target).is('.cd-signup')) ? signup_selected(): login_selected();
                }

            });

            //close modal
            $('.cd-user-modal').on('click', function(event) {
                if ($(event.target).is($form_modal) || $(event.target).is('.cd-close-form')) {
                    $form_modal.removeClass('is-visible');
                }
            });
            //close modal when clicking the esc keyboard button
            $(document).keyup(function(event) {
                if (event.which == '27') {
                    $form_modal.removeClass('is-visible');
                }
            });

            //switch from a tab to another
            $form_modal_tab.on('click', function(event) {
                event.preventDefault();
                ($(event.target).is($tab_login)) ? login_selected(): signup_selected();
            });

            //hide or show password
            $('.hide-password').on('click', function() {
                var $this = $(this),
                    $password_field = $this.prev('input');

                ('password' == $password_field.attr('type')) ? $password_field.attr('type', 'text'):
                    $password_field.attr('type', 'password');
                ('Hide' == $this.text()) ? $this.text('Show'): $this.text('Hide');
                //focus and move cursor to the end of input field
                $password_field.putCursorAtEnd();
            });

            //show forgot-password form
            $forgot_password_link.on('click', function(event) {
                event.preventDefault();
                forgot_password_selected();
            });

            //back to login from the forgot-password form
            $back_to_login_link.on('click', function(event) {
                event.preventDefault();
                login_selected();
            });

            function login_selected() {
                $form_login.addClass('is-selected');
                $form_signup.removeClass('is-selected');
                $form_forgot_password.removeClass('is-selected');
                $tab_login.addClass('selected');
                $tab_signup.removeClass('selected');
            }

            function signup_selected() {
                $form_login.removeClass('is-selected');
                $form_signup.addClass('is-selected');
                $form_forgot_password.removeClass('is-selected');
                $tab_login.removeClass('selected');
                $tab_signup.addClass('selected');
            }

            function forgot_password_selected() {
                $form_login.removeClass('is-selected');
                $form_signup.removeClass('is-selected');
                $form_forgot_password.addClass('is-selected');
            }

            // //REMOVE THIS - it's just to show error messages
            // $form_login.find('input[type="submit"]').on('click', function(event) {
            //     event.preventDefault();
            //     $form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass(
            //         'is-visible');
            // });
            // $form_signup.find('input[type="submit"]').on('click', function(event) {
            //     event.preventDefault();
            //     $form_signup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass(
            //         'is-visible');
            // });


            //IE9 placeholder fallback
            //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
            if (!Modernizr.input.placeholder) {
                $('[placeholder]').focus(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                }).blur(function() {
                    var input = $(this);
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                }).blur();
                $('[placeholder]').parents('form').submit(function() {
                    $(this).find('[placeholder]').each(function() {
                        var input = $(this);
                        if (input.val() == input.attr('placeholder')) {
                            input.val('');
                        }
                    })
                });
            }

        });


        //credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
        jQuery.fn.putCursorAtEnd = function() {
            return this.each(function() {
                // If this function exists...
                if (this.setSelectionRange) {
                    // ... then use it (Doesn't work in IE)
                    // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
                    var len = $(this).val().length * 2;
                    this.setSelectionRange(len, len);
                } else {
                    // ... otherwise replace the contents with itself
                    // (Doesn't work in Google Chrome)
                    $(this).val($(this).val());
                }
            });
        };
    </script>
