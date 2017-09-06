<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
@include('layouts.static-header')
<body>
<div class="page">
    @yield('content')
</div>
</body>
@include('layouts.static-footer')
</html>
