@extends('components.app')

@section('content')
    <header class="relative mb-6">
        <div class="relative">
            <img style=""
                 src="/images/karim.jpeg"
            >

            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                width="120px"
                style="left:50%"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl mb-0"> {{ $user->name }} </h2>
                <p class="text-sm"> Joined {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div class="flex space-between">

                @can ('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-full shadow py-2 px-4 text-black text-xs">
                        Edit profile
                    </a>
                @endcan

               <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>

    </header>

    @include('_timeline', ['tweets' => $tweets])

@endsection
