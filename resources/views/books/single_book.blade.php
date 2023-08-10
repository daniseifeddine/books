@extends('layout.master_layout')
@section('title', 'home')

<link rel="stylesheet" href="{{ asset('css/books.css') }}">
@section('content')
    <div class="container" style="margin-top:150px">
        <a href="{{ route('all_books') }}"><i class="ri-arrow-left-line text-3xl pl-12"></i></a>
        <div class=" book_ flex flex-wrap gap-8 justify-center pt-5">
            <div>
                <img class="single_image_cover" src="{{ asset('books_cover/' . $book->cover_image) }}" alt="">
            </div>
            <div class="w-5/5 lg:w-3/5 md:w-3/5 sm:w-5/5">
                <h1 class="text-3xl lg:text-3xl md:text-3xl sm:text-2xl page-title">{{ $book->name }}</h1>
                <h1 class="rating flex items-center jutify-center gap-2 page-title text-lg mb-3">@lang('messages.World-Rating')
                    @if ($book->world_rate === 10)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 15)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-half-line text-lg text-yellow-300"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 20)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 25)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-half-line text-lg text-yellow-300"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 30)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-lg"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 35)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-half-line text-lg text-yellow-300"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 40)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-lg"></i>
                    @endif
                    @if ($book->world_rate === 45)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-half-line text-lg text-yellow-300"></i>
                    @endif
                    @if ($book->world_rate === 50)
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                        <i class="ri-star-fill text-yellow-300 text-xl"></i>
                    @endif
                </h1>
                <div class="author rounded">
                    <div class="rounded text-lg lg:text-2xl md:text-2xl sm:text-1xl p-1">@lang('messages.by') <span
                            class="font-bold">{{ $book->author }}</span>
                    </div>
                    <div class="text-lg lg:text-md md:text-md sm:text-md p-1">@lang('messages.Pages') {{ $book->pages }} |
                        @if (App::getLocale() == 'ar')
                            {{ $book->language_arabic }} |
                        @else
                            {{ $book->language }} |
                        @endif
                        @if (App::getLocale() == 'ar')
                            <span class="text-red-500">{{ $book->category_arabic }}</span>
                        @else
                            <span class="text-red-500">{{ $book->category }}</span>
                        @endif
                    </div>
                    <div class="text-lg lg:text-md md:text-md sm:text-md p-1">@lang('messages.published-date'):
                        {{ date('Y', strtotime($book->publication_date)) }}
                    </div>
                </div>
                <div class="description page-title text-md text-justify mt-2 p-1 rounded">
                    @if (App::getLocale() == 'ar')
                        <p class="font-bold text-lg">{{ $book->description_arabic }}</p>
                    @else
                        {{ $book->description }}
                    @endif
                </div>
                @auth
                    <div class="flex gap-2">
                        <div class="download-container">
                            @if ($book->pdf)
                                <a href="{{ route('download_pdf', ['bookId' => $book->id]) }}">
                                    <button
                                        class="bg-blue-500 text-white p-2 hover:bg-blue-700 mt-8 rounded">@lang('messages.Download-PDF')</button>
                                    <div class="pt-1">@lang('messages.download') {{ $book->download_count }}</div>
                                </a>
                            @else
                                <a href="">
                                    <p class="text-red-600 mt-12">Book is down for security reason </p>
                                </a>
                            @endif
                        </div>
                        <div>
                            @if ($book->pdf)
                                <a href="{{ route('embed_pdf', encrypt($book->id)) }}">
                                    <button
                                        class="bg-blue-500 text-white p-2 hover:bg-blue-700 mt-8 rounded">@lang('messages.Read-book')</button>
                                </a>
                            @else
                            @endif
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="flex gap-2">
                        <div class="download-container">
                            <p class="bg-blue-900 text-white p-2 mt-8" style="cursor:no-drop">@lang('messages.Download-PDF')</p>
                        </div>
                        <div>
                            <p class="bg-blue-900 text-white p-2 mt-8" style="cursor:no-drop">@lang('messages.Read-book')</p>
                        </div>
                    </div>
                    <div class="flex flex-rows items-center mt-2 gap-1 text-red-600">
                        <i class="ri-error-warning-line" style="font-size:25px"></i>
                        <p>@lang('messages.cant_download')</p>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <section class="container p-1">
        <h1 class="mt-12 text-xl lg:text-2xl md:text-2xl sm:text-2xl">@lang('messages.Books-you-may-like')</h1>
        <div class="grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-3 gap-5 p-2 mt-5">

            @foreach ($suggestedBooks as $suggestedBook)
                @if ($suggestedBook->category == $book->category)
                    <div class="all p-2 rounded" id="">
                        <div>
                            <a href="{{ route('single_book', $suggestedBook->name) }}"><img class="book-cover col-span-1"
                                    src="{{ asset('books_cover/' . $suggestedBook->cover_image) }}" alt="">
                                </img></a>
                        </div>
                        <div class="book-name">
                            <p class="text-sm lg:text-md font-light text-center md:text-md sm:text-base pt-3 p-1">
                                {{ $suggestedBook->name }}</p>
                        </div>
                        <div class="line"></div>
                        <div>
                            <p class="text-sm lg:text-lg font-light text-center md:text-lg m-0 p-0 sm:text-base pt-2 text-red-500 p-1"
                                style="line-height: 0.8rem">{{ $suggestedBook->category }}</p>
                        </div>
                        <div class="p-1 pt-1 text-center">
                            @if ($suggestedBook->world_rate === 10)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 15)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 20)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 25)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 30)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 35)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 40)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 45)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                            @endif
                            @if ($suggestedBook->world_rate === 50)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                            @endif
                        </div>
                        <div class="p-1 text-center	">
                            <a href="{{ route('single_book', $suggestedBook->name) }}"><button
                                    style="width: 100% !important;position: relative;;bottom:0"
                                    class="btn bg-blue-700 rounded text-white p-1 hover:bg-blue-800">Details</button></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <section class="container p-1">
        <h1 class="mt-12 text-xl lg:text-2xl md:text-2xl sm:text-2xl">@lang('messages.Books-with-the-Same-Author')</h1>
        <div class="grid grid-cols-2 lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-3 gap-5 p-2 mt-5">

            @foreach ($authorBooks as $authorBook)
                @if ($authorBook->author == $book->author)
                    <div class="all p-2 rounded" id="">
                        <div>
                            <a href="{{ route('single_book', $authorBook->name) }}"><img class="book-cover col-span-1"
                                    src="{{ asset('books_cover/' . $authorBook->cover_image) }}" alt="">
                                </img></a>
                        </div>
                        <div class="book-name">
                            <p class="text-sm lg:text-md font-light text-center md:text-md sm:text-base pt-3 p-1">
                                {{ $authorBook->name }}</p>
                        </div>
                        <div class="line"></div>
                        <div>
                            <p class="text-sm lg:text-lg font-light text-center md:text-lg m-0 p-0 sm:text-base pt-2 text-red-500 p-1"
                                style="line-height: 0.8rem">{{ $authorBook->category }}</p>
                        </div>
                        <div class="p-1 pt-1 text-center">
                            @if ($authorBook->world_rate === 10)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 15)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 20)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 25)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 30)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 35)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 40)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                            @endif
                            @if ($authorBook->world_rate === 45)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-half-line text-sm text-yellow-300"></i>
                            @endif
                            @if ($authorBook->world_rate === 50)
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                                <i class="ri-star-fill text-yellow-300 text-sm"></i>
                            @endif
                        </div>
                        <div class="p-1 text-center	">
                            <a href="{{ route('single_book', $authorBook->name) }}"><button
                                    style="width: 100% !important;position: relative;;bottom:0"
                                    class="btn bg-blue-700 rounded text-white p-1 hover:bg-blue-800">Details</button></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    @guest
        <section class="container p-1">
            <h1 class="mt-12 text-xl lg:text-2xl md:text-2xl sm:text-2xl pt-12">@lang('messages.comment')</h1>
            <form id="" class="pt-5">
                <div class="flex flex-rows items-center mt-2 gap-1 text-red-600">
                    <i class="ri-error-warning-line" style="font-size:25px"></i>
                    <p>@lang('messages.cant_comment')</p>
                </div>
                <textarea class="comment_textarea" name="review" style="width: 100%" readonly rows="2"
                    placeholder="@lang('messages.Write_your_review')"></textarea>
                <button class="btn bg-blue-800 text-white p-1 rounded mt-2 mb-12"
                    style="cursor: no-drop">@lang('messages.submit')</button>
            </form>
            <div class="comments-container comment mt-4 rounded m-1">
                {{-- each --}}
                @foreach ($comments as $comment)
                    <div class="each_comment p-3 mb-2">
                        @if ($comment->user->ProfileImage)
                            <div class="flex flex-wrap items-center gap-2">
                                <div class="block rounded-full shadow-xl bg-cover bg-center"
                                    style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
        background-image: url('{{ asset('uploads/' . $comment->user->ProfileImage) }}')">
                                </div>
                                <div>
                                    <p class="name text-sm font-bold">{{ $comment->user->name }}</p>
                                    <p class="email text-sm font-bold">{{ $comment->user->email }}</p>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-wrap items-center gap-2">
                                <div class=" rounded-full shadow-xl bg-cover bg-center flex"
                                    style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                background-image: url('{{ asset('uploads/default.jpg') }}')">
                                </div>
                                <div>
                                    <p class="name text-sm font-bold">{{ $comment->user->name }}</p>
                                    <p class="email text-sm font-bold">{{ $comment->user->email }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="review pt-7">
                            {{ $comment->comment }}
                        </div>
                        <div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    @endguest
    @auth
        <section class="container p-1">
            <div>
                <h1 class="mt-12 text-xl lg:text-2xl md:text-2xl sm:text-2xl pt-12">@lang('messages.comment')</h1>
                <form id="reviewForm" class="pt-5">
                    @csrf
                    @method('post')
                    <div class="error_comment text-red-500 font-bold"></div>
                    <p class="comment_success text-green-500 text-bold"></p>
                    <textarea class="comment_textarea shadow-orange-500	" name="review" style="width: 100%" rows="2"
                        placeholder="@lang('messages.Write_your_review')" minlength="5" maxlength="250"></textarea>

                    <div id="review-error" class="text-red-500 mt-1"></div>

                    <button class="btn bg-blue-500 text-white hover:bg-blue-700 p-1 rounded mt-2 mt-5" type="submit"
                        name="submit">@lang('messages.submit')</button>
                </form>
            </div>
            <div class="comments-container comment mt-4 rounded m-1">
                {{-- each --}}
                @foreach ($comments as $comment)
                    <div class="each_comment p-3 mb-2">
                        @if ($comment->user->ProfileImage)
                            <div class="flex items-center gap-2">
                                <div class="block rounded-full shadow-xl bg-cover bg-center"
                                    style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
            background-image: url('{{ asset('uploads/' . $comment->user->ProfileImage) }}')">
                                </div>
                                <div>
                                    <div class="flex justify-between">
                                        <p class="name text-sm font-bold">{{ $comment->user->name }}</p>
                                    </div>
                                    <p class="email text-sm font-bold">{{ $comment->user->email }}</p>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-wrap items-center gap-2">
                                <div class=" rounded-full shadow-xl bg-cover bg-center flex"
                                    style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                    background-image: url('{{ asset('uploads/default.jpg') }}')">
                                </div>
                                <div>
                                    <div class="flex justify-between">
                                        <p class="name text-sm font-bold">{{ $comment->user->name }}</p>
                                    </div>
                                    <p class="email text-sm font-bold">{{ $comment->user->email }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="review pt-7">
                            <p>{{ $comment->comment }}</p>
                            <div class="flex items-center justify-between">
                                <p class="mt-12 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                                @if ($comment->user_id == auth()->user()->id)
                                    <form action="" class="delete-comment-form mt-12"
                                        data-comment-id="{{ $comment->id }}">
                                        @csrf
                                        <button><i class="bi bi-trash3 trash_comment"></i></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                @endforeach
                @if (count($allcomment) >= 5)
                    <a href="{{ route('AllComment', encrypt($book->id)) }}"><button class="hover:text-black mt-5">Check all
                            comments</button></a>
                @endif
            </div>
        </section>
    @endauth
    </div>
    <script>
        $(document).ready(function() {

            $('.comment_textarea').keyup(function() {
                var value = $(this).val();
                var errorContainer = $('#review-error');
                errorContainer.text('');

                if (value.length < 5) {
                    errorContainer.text('@lang('messages.Review_min_length')');
                } else if (value.length > 250) {
                    errorContainer.text('@lang('messages.Review_max_length')');
                } else if (!/^[\p{L}\p{N}\s\p{Emoji}]*$/u.test(value)) {
                    errorContainer.text('@lang('messages.Review_invalid_characters')');
                }
            });

            $('#reviewForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('comment', $book->id) }}',
                    data: formData,

                    success: function(response) {
                        // Extract data from the JSON response
                        var comment = response.comment;
                        var username = response.username;
                        var email = response.email;
                        var profileImage = response.ProfileImage;
                        var successfuly = `Comment added`

                        if (response.false) {
                            var error = `@lang('messages.sorry-commented')`
                            $('.error_comment').append(error)

                            function removeAll() {
                                setTimeout(function() {
                                    $(".error_comment").fadeOut("slow", function() {
                                        $(this).remove();
                                    });
                                }, 5000);
                            }
                            removeAll();
                        } else {
                            $('.comment_success').prepend(successfuly)
                            var commentHtml = `
    <div class="each_comment p-3 mb-2">
        ${profileImage ? `<div class="flex flex-wrap items-center gap-2">
                                                                                        <div class="block rounded-full shadow-xl bg-cover bg-center"
                                                                style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                                                                background-image: url('{{ asset('uploads/${response.ProfileImage}') }}')">
                                                            </div>
                                                            <div>
                                                                <p class="name text-sm font-bold">${username}</p>
                                                                <p class="email text-sm font-bold">${email}</p>
                                                            </div>
                                                        </div>` : `
                                                        <div class="flex flex-wrap items-center gap-2">
                                                            <div class=" rounded-full shadow-xl bg-cover bg-center flex"
                                                                style="width: 40px; height: 40px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 50%;
                                                                background-image: url('{{ asset('uploads/default.jpg') }}')">
                                                            </div>
                                                            <div>
                                                                <p class="name text-sm font-bold">${username}</p>
                                                                <p class="email text-sm font-bold">${email}</p>
                                                            </div>
                                                        </div>
                                                    `}
                            <div class="review pt-7">${comment}</div>
                            <div class="flex justify-between items-center">
                                <p class="mt-12 text-sm">1 seconds ago</p>
                                <form class="delete-comment-form mt-12" data-comment-id="${response.commentId}">
                                @csrf
                                <button><i class="bi bi-trash3 trash_comment"></i></button>
                                </form>
                            </div>
                            <div>
                        </div>
            </div>
                        `;
                            setTimeout(function() {
                                $(".comment_success").fadeOut("slow", function() {
                                    $(this).remove();
                                });
                            }, 3000);
                        }
                        $('.comments-container').prepend(commentHtml);


                        $('#reviewForm textarea').val('');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('.comments-container').on('submit', '.delete-comment-form', function(event) {
                event.preventDefault();

                var commentId = $(this).data('comment-id');

                var form = $(this);
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('commentDelete') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        comment_id: commentId
                    },
                    success: function(response) {
                        form.closest('.each_comment').slideUp('slow', function() {
                            $(this).remove();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>




@endsection
