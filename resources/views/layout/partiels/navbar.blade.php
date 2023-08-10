<nav class="nav container">
    <div class="nav__data">
        <a href="{{ route('home') }}" class="nav__logo pr-2 pl-2" style="font-size:22px;">
            <i class="bi bi-book" style="font-size:30px"></i> OpenBook
        </a>

        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line nav__toggle-menu"></i>
            <i class="ri-close-line nav__toggle-close"></i>
        </div>
    </div>

    <!--=============== NAV MENU ===============-->
    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li>
                <a href="{{ route('home') }}" class="nav__link">@lang('messages.home')</a>
            </li>

            <!--=============== DROPDOWN 1 ===============-->
            <li class="dropdown__item">
                <div class="nav__link dropdown__button">
                    @lang('messages.discover') <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>

                <div class="dropdown__container">
                    <div class="dropdown__content">
                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-book-fill"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.Books')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('all_books') }}" class="dropdown__link">@lang('messages.Allbooks')</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.PopularBooks')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-medal-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.BookRatings')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.TopratedBooks')</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.AverageratedBooks')</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.WorstratedBooks')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-file-paper-2-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.NewReleases')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.LatestBooks')</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown__link">@lang('messages.UpcomingBooks')</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            {{-- DROPDOWN 2 --}}
            <li class="dropdown__item">
                <div class="nav__link dropdown__button">
                    @lang('messages.Categories') <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>

                <div class="dropdown__container">
                    <div class="dropdown__content">
                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-award-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.Fiction')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('Category', 'Mystery') }}"
                                        class="dropdown__link">@lang('messages.Mystery')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Romance') }}"
                                        class="dropdown__link">@lang('messages.Romance')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Science-fiction') }}"
                                        class="dropdown__link">@lang('messages.ScienceFiction')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Fantasy') }}"
                                        class="dropdown__link">@lang('messages.Fantasy')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-file-text-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.NonFiction')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('Category', 'Biography') }}"
                                        class="dropdown__link">@lang('messages.Biography')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Self-help') }}"
                                        class="dropdown__link">@lang('messages.SelfHelp')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'History') }}"
                                        class="dropdown__link">@lang('messages.History')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Science') }}"
                                        class="dropdown__link">@lang('messages.Science')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-bear-smile-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.ChildrenBooks')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('Category', 'Picture-Book') }}"
                                        class="dropdown__link">@lang('messages.PictureBooks')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Chapter-Book') }}"
                                        class="dropdown__link">@lang('messages.ChapterBooks')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-book-2-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.Poetry')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('Category', 'Poetry') }}"
                                        class="dropdown__link">@lang('messages.ClassicPoetry')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Arabic-Poetry') }}"
                                        class="dropdown__link">@lang('messages.arabicpoetry')</a>
                                </li>
                                <li>
                                    <a href="{{ route('Category', 'Love-Poetry') }}"
                                        class="dropdown__link">@lang('messages.LovePoetry')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>


            {{-- DROP DOWN 3 --}}
            <li class="dropdown__item">
                <div class="nav__link dropdown__button">
                    @lang('messages.Preferences') <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>

                <div class="dropdown__container">
                    <div class="dropdown__content">
                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-moon-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.Theme')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="#" id="dark-mode-button" class="dropdown__link"
                                        data-mode="dark">@lang('messages.DarkMode')
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="light-mode-button" class="dropdown__link"
                                        data-mode="light">@lang('messages.LightMode')</a>
                                </li>
                                <li>
                                    <a href="#" id="contrast-mode-button" class="dropdown__link"
                                        data-mode="green">@lang('messages.contrastMode')</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown__group">
                            <div class="dropdown__icon">
                                <i class="ri-earth-line"></i>
                            </div>

                            <span class="dropdown__title">@lang('messages.Language')</span>

                            <ul class="dropdown__list">
                                <li>
                                    <a href="{{ route('languageConvert', 'en') }}"
                                        class="dropdown__link toggle-ltr">@lang('messages.English')</a>
                                </li>
                                <li>
                                    <a href="{{ route('languageConvert', 'ar') }}" class="dropdown__link toggle-rtl"
                                        data-rtl="false">@lang('messages.Arabic')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                @guest
                    <button class="register nav__link" style="padding: 1.25rem 1.25rem" type="button"
                        data-modal-toggle="authentication-modal">
                        @lang('messages.Register')
                    </button>

                    <button class="register" style="padding: 1.25rem 1.25rem" type="button"
                        data-modal-toggle="login-modal">
                        @lang('messages.Login')
                    </button>
                @endguest
                @auth
                    @admin
                    <li>
                        <a href="{{ route('Add_Book') }}" class="nav__link">Add book</a>
                    </li>
                @endadmin
            @endauth

            @auth
                @moderator
                    <li>
                        <a href="{{ route('Add_Book') }}" class="nav__link">Add book</a>
                    </li>
                @endmoderator
            @endauth
            @auth
                @admin
                    <li>
                        <a href="{{ route('admin') }}" class="nav__link">Admin</a>
                    </li>
                @endadmin
            @endauth
            </li>

            @auth

                <li class="dropdown__item">

                    <div class="nav__link dropdown__button">
                        @if ($data->ProfileImage)
                            <div class="block rounded-full shadow-xl bg-cover bg-center"
                                style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                        background-image: url('{{ asset('uploads/' . $data->ProfileImage) }}')">
                            </div>
                        @else
                            <div class="block rounded-full shadow-xl bg-cover bg-center"
                                style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                                background-image: url('{{ asset('uploads/default.jpg') }}')">
                            </div>
                        @endif
                    </div>

                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-map-pin-user-fill"></i>
                                </div>

                                <span class="dropdown__title">@lang('messages.Me')</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="{{ route('profile') }}" class="dropdown__link">@lang('messages.Profile')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('Settings') }}" class="dropdown__link">@lang('messages.Setting')</a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown__link"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.logout')</a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('post')
                                    </form>
                                </ul>
                            </div>
                        @endauth
        </ul>
    </div>


</nav>

@guest


    <div class="max-w-2xl mx-auto">

        <div id="authentication-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto login_modal">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                    <div class="flex justify-end p-2">
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="authentication-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form method="POST" id="RegisterForm" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                        action="{{ route('register') }}">

                        @csrf
                        @method('POST')

                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">@lang('messages.Signintoourplatform')</h3>
                        <div>
                            <label for="name"
                                class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">@lang('messages.Yourname')</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder='@lang('messages.PlaceholderName')' autocomplete="off" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="email"
                                class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">@lang('messages.Youremail')</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@company.com" autocomplete="off" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password"
                                class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">@lang('messages.Yourpassword')</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                autocomplete="off">
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="bg-gray-50 border border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="text-sm ml-3">
                                    <label for="remember"
                                        class="font-medium text-gray-900 dark:text-gray-300">@lang('messages.Rememberme')</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('messages.Loginbutton')</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="max-w-2xl mx-auto">

            <div id="login-modal" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto login_modal">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="login-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form id="LoginForm" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="{{ route('login') }}" method="post">

                            @csrf
                            @method('POST')
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">@lang('messages.Signuptoourplatform')</h3>
                            <div>
                                <label for="new_email"
                                    class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">@lang('messages.Youremail')</label>
                                <input type="email" name="email" id="new_email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="name@email.com" autocomplete="off">
                            </div>
                            <div>
                                <label for="new_password"
                                    class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">@lang('messages.Yourpassword')
                                </label>
                                <input type="password" name="password" id="new_password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    autocomplete="off">
                            </div>
                            <div class="flex justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember_" aria-describedby="remember" type="checkbox"
                                            class="bg-gray-50 border border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                    </div>
                                    <div class="text-sm ml-3">
                                        <label for="remember"
                                            class="font-medium text-gray-900 dark:text-gray-300">@lang('messages.Rememberme')
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('messages.Registerbutton')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endguest
