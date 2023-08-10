@extends('layout.master_layout')
@section('title', 'home')

<link rel="stylesheet" href="{{ asset('css/books.css') }}">
@section('content')
    <div class="container" style="margin-top:120px">
        <a href="{{ url()->previous() }}"><i class="ri-arrow-left-line text-3xl hover:text-red-600"></i></a>
        <h1 class="text-4xl mb-3 page-title pb-5">All reviews for {{ $book->name }}
        </h1>
        <section class="container p-1">
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
        </section>
    </div>
