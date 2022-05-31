@include('backend.layouts.header')

        <!-- content -->
        <div class="pr-8 p-10 pt-20 mainContentArea">
            @yield('content')
        </div>


        @include('backend.layouts.sidebar')
    </div>
    </div>

    @include('backend.layouts.footer')
