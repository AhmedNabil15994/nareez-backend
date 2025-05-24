<!DOCTYPE html>
<html lang="{{locale()}}">
@include('apps::frontend.layouts._head')
<body {{!empty($body_class) ? 'class='.$body_class:''}}>

@include('apps::frontend.layouts._header')

    @yield('content')

@include('apps::frontend.layouts._footer')
@include('apps::frontend.layouts._scripts')
</body>
</html>
