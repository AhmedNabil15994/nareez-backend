<!DOCTYPE html>
<html lang="{{ locale() }}"
  dir="{{ is_rtl() }}">

@if (is_rtl() == 'rtl')
@include('apps::dashboard.layouts._head_rtl')
@else
@include('apps::dashboard.layouts._head_ltr')
@endif

{{-- styles --}}
<link href="{{asset('SewidanField/plugins/ck-editor-5/css/ckeditor.css')}}"
  rel="stylesheet"
  id="style_components"
  type="text/css" />

{{-- scripts --}}

<style>
  .table-striped {
    width: 100% !important;
  }

  .page-sidebar .page-sidebar-menu>li.active.open>a,
  .page-sidebar .page-sidebar-menu>li.active>a,
  .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a,
  .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a {
    background: #2C3542;
    border-top-color: transparent;
    color: #b4bcc8;
  }

  .page-sidebar .page-sidebar-menu>li.active.open>a:hover,
  .page-sidebar .page-sidebar-menu>li.active>a,
  .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a,
  .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a {
    background: #2C3542;
    border-top-color: transparent;
    color: #b4bcc8;
  }

</style>



<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
  <div class="page-wrapper">

    @include('apps::dashboard.layouts._header')

    <div class="clearfix"> </div>

    <div class="page-container">
      @include('apps::dashboard.layouts._aside')

      @yield('content')
    </div>

    @include('apps::dashboard.layouts._footer')
  </div>

  @include('apps::dashboard.layouts._jquery')
  @include('apps::dashboard.layouts._js')
</body>

</html>
