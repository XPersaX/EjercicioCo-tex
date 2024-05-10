<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos-@yield('title')</title>
    <meta name="descrition" content="@yield('meta-description', 'Default meta description')" /> 
</head>
<body>
    @include('layouts.header') 
    @include('layouts.sidebar') 
    
    @yield('content')

    @include('layouts.footer') 

</body>
</html>