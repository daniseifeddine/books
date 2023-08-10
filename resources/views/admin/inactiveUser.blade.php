@extends('admin.partiels.sidebar')

<!-- component -->

@section('section')
    <section class="home-section">

        <div class="overflow-x-auto">

            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="flex justify-between">
                        <div class="text">User</div>
                        <div class="text-xl flex justify-center items-center" style=";color:red;border-radius:10px">
                            Deactivated
                            user</div>
                    </div>

                    <div class="">
                        {{-- <a href="" class="text-right">
                            <p class="text-blue-500  hover:text-blue-700">Optional user information <i
                                    class="bi bi-arrow-right" style="margin: 5px;position: relative;top:2px"></i>
                            </p>
                        </a> --}}
                        <a href="{{ route('admin_user') }}">
                            <p class="text-blue-500 text-right hover:text-blue-700">Check active account<i
                                    class="bi bi-arrow-right" style="margin: 5px;position: relative;top:2px"></i>
                            </p>
                        </a>
                    </div>
                    <div class="bg-white shadow-md rounded my-6" id="ajax_search_result">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">id</th>
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-center">email</th>
                                    <th class="py-3 px-6 text-center">role</th>
                                    <th class="py-3 px-6 text-center">Created at</th>
                                    <th class="py-3 px-6 text-center"></th>
                                </tr>
                            </thead>
                            @if (session()->has('success'))
                                <div class="error flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700"
                                    role="alert">
                                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium"></span> {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <tbody class="text-gray-600 text-sm font-light">

                                @foreach ($users as $user)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div>

                                                    <h1 class="text-xl">{{ ++$iteration }}</h1>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                    @if ($user->ProfileImage)
                                                        <img class="w-6 h-6 rounded-full"
                                                            src="{{ asset('uploads/' . $user->ProfileImage) }}" />
                                                    @else
                                                        <img class="w-6 h-6 rounded-full"
                                                            src="{{ asset('uploads/default.jpg') }}" />
                                                    @endif
                                                </div>

                                                <span class="font-semibold">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <span class="font-semibold">{{ $user->email }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span
                                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs font-semibold">
                                                @if ($user->role === 0)
                                                    User
                                                @endif

                                                @if ($user->role === 1)
                                                    Admin
                                                @endif
                                                @if ($user->role === 2)
                                                    Moderator
                                                @endif
                                            </span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="py-1 px-3 rounded-full text-sm font-semibold">
                                                {{ $user->created_at }}
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">

                                                <form action="{{ route('editUser', $user->id) }}" method="get">
                                                    @csrf
                                                    @method('get')

                                                    <a href="{{ route('editUser', $user->id) }}"
                                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <i class="ri-pencil-line text-xl"></i>
                                                    </a>
                                                </form>
                                                <form action="{{ route('activateUser', encrypt($user->id)) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('post')
                                                    <button name="submit"
                                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <i class="bi bi-bell text-xl"></i>
                                                    </button>
                                            </div>
                                            </form>
                    </div>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="p-5">
                        {{ $users->links() }}

                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection