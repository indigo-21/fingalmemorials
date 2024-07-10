<!doctype html>
<html class="no-js" lang="en">

@include('includes.head')

<body url="{{url('')}}">
    @include('includes.header')
    <div class="main-container">
        @yield('content')
    </div>    

    @include('includes.footer')


    @include('includes.scripts')
    @yield('page-scripts')

</body>

</html>
