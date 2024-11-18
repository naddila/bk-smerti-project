<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.head')
    <title>BK SMERTI | @yield('title')</title>
    <link rel="stylesheet" href="../css/form-data.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    {{-- dari section di view form-datasiswa --}}
    @yield('datas')

    @include('component.footer')
    @include('component.script')

</body>

</html>
