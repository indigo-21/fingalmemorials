<!doctype html>
<html class="no-js" lang="en">

@include('includes.head')

<body url="{{url('')}}">
    @include('includes.header')

    @yield('content')
  

    @include('includes.footer')


    @include('includes.scripts')
    @yield('page-scripts')

</body>

</html>
