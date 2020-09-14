<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @if( auth()->check() )
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10 lg:mb-10">
                    @yield('content')
                </div>

                @if( auth()->check() )
                    <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                        @include('_friends_list')
                    </div>
                @endif

            </div>
        </main>
    </section>

</x-master>
