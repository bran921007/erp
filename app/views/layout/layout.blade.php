<!DOCTYPE html>
<html lang="en">
@include('layout.header')
<section id="container" class="">
  @include('layout.navbar')

  @include('layout.mainside')
      @yield('content')
  @include('layout.footermain')

</section>

@yield('footerJS')
</body>
</html>
