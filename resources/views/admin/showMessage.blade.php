@extends('admin.partiels.sidebar')


@section('section')
    <section class="home-section">
        <!-- component -->


        <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="flex flex-col">
                    <div class="text">message sent by : {{ $data->user->name }}</div>
                    <div class="text">User email : {{ $data->user->email }}</div>
                    <div class="ml-4">
                        <form action="{{ route('delete_message', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button name="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <i class="ri-delete-bin-6-line text-xl"></i>
                            </button>
                    </div>
                </div>

                <div class="ml-5 mt-12 p-12 message bg-white rounded">
                    <div class="subject">
                        <h1 class="text-2xl"><span class="text-red-500 pb-">subject:</span><br><br> {{ $data->subject }}
                        </h1>
                    </div>
                    <div class="p-8" style="border-bottom: 1px solid black;height:100%;width:100%"></div>
                    <div>
                        <h1 class="text-2xl pt-12"><span class="text-red-500 pb-5">message:</span><br><br>
                            {{ $data->message }}
                        </h1>

                    </div>
                </div>
            </div>
        @endsection
