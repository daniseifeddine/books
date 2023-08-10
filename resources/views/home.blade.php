@extends('layout.master_layout')
@section('title', 'home')

<link rel="stylesheet" href="{{ asset('css/Home.css') }}">
<link rel="stylesheet" href="{{ asset('css/books.css') }}">


@section('content')

    @if ($errors->has('email'))
        <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium"></span> @lang('messages.email_exists')
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="notification">
            @lang('messages.welcome') {{ $data->name }}! 👋
            <div class="notification__progress">
                <div class="notification__progress-bar"></div>
            </div>
        </div>
    @endif
    @if (session()->has('fail'))
        <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium"></span> @lang('messages.invalidCredentials')
            </div>
        </div>
    @endif
    @if (session()->has('inactive'))
        <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium"></span> {{ session('inactive') }}
            </div>
        </div>
    @endif
    @if (session()->has('denied'))
        <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium"></span> {{ session('denied') }}
            </div>
        </div>
    @endif

    @if (session()->has('sent'))
        <div class="notification">
            @lang('messages.MessageSent')
            <div class="notification__progress">
                <div class="notification__progress-bar"></div>
            </div>
        </div>
    @endif

    <div class="Home">
        <div class="container">
            <section class="section-1 flex content-center items-center pr-2 pl-2 flex-row" style="min-height:100vh">
                <p class="text mt-3">@lang('messages.Home_text')</p>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_icnvjpdc.json" background="transparent"
                    speed="1" style=" max-height: 50% !important;min-width:50% !important;padding" loop autoplay>
                </lottie-player>
            </section>
        </div>

        <div class="slider mb-5">
            <div class="slide_viewer">
                <div class="slide_group">
                    <div class="slide">
                        <div class="slide_content">
                            <h2>@lang('messages.ExploreaVastCollection')</h2>
                            <p>@lang('messages.50000books')</p>
                            <a href="{{ route('all_books') }}"><button
                                    class="bg-blue-500 text-white p-2 mt-3 rounded hover:bg-blue-700">@lang('messages.discover')</button></a>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide_content">
                            <h2>@lang('messages.EasyAccess')</h2>
                            <p>@lang('messages.extensive')</p>
                            <a href="{{ route('all_books') }}"><button
                                    class="bg-blue-500 text-white p-2 mt-3 rounded hover:bg-blue-700">Discover</button></a>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide_content">
                            <h2>@lang('messages.EnhanceYourKnowledge')</h2>
                            <p>@lang('messages.expandknowledge')</p>
                            <a href="{{ route('all_books') }}"><button
                                    class="bg-blue-500 text-white p-2 mt-3 rounded hover:bg-blue-700">Discover</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>

        <div id="services" class="section relative pt-20 pb-8 md:pt-16 md:pb-0 fade-in-section">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <!-- Heading start -->
                <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-2xl leading-normal mb-2 font-bold mt-5">@lang('messages.WhyOpenBook!')</h2>

                    <p class="semititle leading-relaxed font-light text-xl mx-auto pb-2">@lang('messages.Effortlessly')
                    </p>
                </header>
                <!-- End heading -->
                <!-- row -->
                <div class="flex flex-wrap flex-row -mx-4 text-center">
                    <div class=" flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="cart_advatange py-8 px-12 mb-12 -50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block mb-4">
                                <i class="ri-search-line" style="font-size:30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold">@lang('messages.EfficientSearch')</h3>
                            <p class=""> @lang('messages.searchfunctionality')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class=" flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="cart_advatange py-8 px-12 mb-12 -50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block -900 mb-4">
                                <!-- icon -->
                                <i class="ri-file-pdf-line" style="font-size: 30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold ">@lang('messages.PDFFormat')</h3>
                            <p class="">@lang('messages.PDFformatforeffortless')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".3s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="cart_advatange py-8 px-12 mb-12 -50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block -900 mb-4">
                                <!-- icon -->
                                <i class="ri-advertisement-line" style="font-size:30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold text">@lang('messages.Ad-Free')</h3>
                            <p class="-500"> @lang('messages.Immerseyourself')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="cart_advatange py-8 px-12 mb-12 -50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block -900 mb-4">
                                <i class="ri-refresh-line" style="font-size: 30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold text">@lang('messages.RegularUpdates')</h3>
                            <p class="-500"> @lang('messages.ever-growing')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".1s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="cart_advatange py-8 px-12 mb-12 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block -900 mb-4">
                                <i class="ri-user-5-line" style="font-size: 30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold">@lang('messages.User-Friendly')</h3>
                            <p class="-500"> @lang('messages.Navigatethrough')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s" data-wow-delay=".3s"
                        style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div
                            class="mb-12 cart_advatange py-8 px-12 mb-12 -50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block -900 mb-4">
                                <i class="ri-book-3-line" style="font-size: 30px"></i>
                            </div>
                            <h3 class="semititle text-lg leading-normal mb-2 font-semibold text">@lang('messages.BookSuggestions')</h3>
                            <p class="-500">@lang('messages.tailored')
                            </p>
                        </div>
                        <!-- end service block -->
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </section>
    <section>
        @auth
            @if ($data->favorite_book_genre)
                <section class="container">
                    <h1 class="text-center mt-12 text-xl lg:text-2xl md:text-2xl sm:text-2xl">Suggested books</h1>
                    <div class="grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-3 gap-5 p-2 mt-5">

                        @foreach ($books as $book)
                            @if ($book->category == $data->favorite_book_genre)
                                <div class="all p-2 rounded" id="">
                                    <div>
                                        <a href="{{ route('single_book', $book->name) }}"><img class="book-cover col-span-1"
                                                src="{{ asset('books_cover/' . $book->cover_image) }}" alt="">
                                            </img></a>
                                    </div>
                                    <div class="book-name">
                                        <p class="text-sm lg:text-md font-light text-center md:text-md sm:text-base pt-3 p-1">
                                            {{ $book->name }}</p>
                                    </div>
                                    <div class="line"></div>
                                    <div>
                                        <p class="text-sm lg:text-lg font-light text-center md:text-lg m-0 p-0 sm:text-base pt-2 text-red-500 p-1"
                                            style="line-height: 0.8rem">{{ $book->category }}</p>
                                    </div>
                                    <div class="p-1 pt-1 text-center">
                                        @if ($book->world_rate === 10)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 15)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 20)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 25)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 30)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 35)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 40)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-sm"></i>
                                        @endif
                                        @if ($book->world_rate === 45)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                        @endif
                                        @if ($book->world_rate === 50)
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                            <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                        @endif
                                    </div>
                                    <div class="p-1 text-center	">
                                        <a href="{{ route('single_book', $book->name) }}"><button
                                                style="width: 100% !important;position: relative;;bottom:0"
                                                class="btn bg-blue-700 rounded text-white p-1 hover:bg-blue-800">Details</button></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            @endif
        @endauth
    </section>
    <section>
        <section class="contact" id="contact">
            <div class="container p-3">
                <div class="heading text-center">
                    <h2 class="text-3xl font-bold">{{ __('messages.contact_us') }}</h2>
                    <p>{{ __('messages.contact_us_description') }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <div class="title">
                            <h3 class="text-xl font-semibold">{{ __('messages.contact_details') }}</h3>
                            <p>{{ __('messages.more_info_assistance') }}</p>
                        </div>
                        <div class="content">
                            <!-- Info-1 -->
                            <div class="info flex items-center mb-4">
                                <i class="fas fa-mobile-alt mr-2"></i>
                                <h4 class="text-lg font-semibold">{{ __('messages.phone') }}:</h4>
                                <span class="ml-2">{{ __('messages.phone_number') }}</span>
                            </div>
                            <!-- Info-2 -->
                            <div class="info flex items-center mb-4">
                                <i class="far fa-envelope mr-2"></i>
                                <h4 class="text-lg font-semibold">{{ __('messages.email') }}:</h4>
                                <span class="ml-2">{{ __('messages.email_address') }}</span>
                            </div>
                            <!-- Info-3 -->
                            <div class="info flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <h4 class="text-lg font-semibold">{{ __('messages.address') }}:</h4>
                                <span class="ml-2">{{ __('messages.address_details') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        @auth
                            <form id="contactForm" action="{{ route('Contact_Form') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="form_contact grid grid-cols-1 sm:grid-cols-2 gap-1">
                                    <div>
                                        <input type="text" class="form-control" id="contact_name"
                                            placeholder="{{ __('messages.your_name') }}" value="{{ $data->name }}"
                                            readonly>
                                        <div class="error-message" id="nameError"></div>
                                    </div>
                                    <div>
                                        <input type="email" class="form-control" id="contact_email"
                                            placeholder="{{ __('messages.your_email') }}" value="{{ $data->email }}"
                                            readonly>
                                        <div class="error-message" id="emailError"></div>
                                    </div>
                                    <div class="col-span-2">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="{{ __('messages.subject') }}" name="subject">
                                        <div class="error-message" id="subjectError"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" rows="5" placeholder="{{ __('messages.your_message') }}"
                                        name="message"></textarea>
                                    <div class="error-message" id="messageError"></div>
                                </div>
                                <button class="btn bg-blue-500 text-white px-4 py-2 rounded-full"
                                    type="submit">{{ __('messages.send_now') }}</button>
                            </form>
                        @endauth

                        @guest
                            <form id="contactForm">
                                @csrf
                                @method('post')
                                <div class="form_contact grid grid-cols-1 sm:grid-cols-2 gap-1">
                                    <div>
                                        <input type="text" class="form-control" id="contact_name"
                                            placeholder="{{ __('messages.your_name') }}" readonly value=@lang('messages.unvailable')>
                                        <div class="error-message" id="nameError"></div>
                                    </div>
                                    <div>
                                        <input type="email" class="form-control" id="contact_email"
                                            placeholder="{{ __('messages.your_email') }}" readonly value=@lang('messages.unvailable')>
                                        <div class="error-message" id="emailError"></div>
                                    </div>
                                    <div class="col-span-2">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="{{ __('messages.subject') }}" readonly value=@lang('messages.unvailable')>
                                        <div class="error-message" id="subjectError"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" rows="5" placeholder="{{ __('messages.your_message') }}"
                                        readonly>@lang('messages.unvailable')</textarea>
                                    <div class="error-message" id="messageError"></div>
                                </div>
                                <p class="text-sm text-red-400 font-medium flex items-center gap-1 pt-5">
                                    <i class="ri-error-warning-line" style="font-size:25px"></i>
                                    @lang('messages.cantcontact')
                                </p>
                            </form>
                        @endguest

                    </div>
                </div>
            </div>
        </section>

    </section>
    </div>

    <script src="{{ asset('js/home/others.js') }}"></script>

    <script src="{{ asset('js/anime.min.js') }}"></script>

    <script src="{{ asset('js/anime.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@endsection
