<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- SEO --}}
    @yield("seo")
    {{-- End SEO --}}

    {{-- Favicon --}}
    <link href="{{asset('front/assets/img/favicon.ico')}}" rel="icon">
    

    {{-- start css --}}
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    @yield("css")
    {{-- end css --}}
    </head>
<body>
    {{-- make project --}}
        @yield("content")
    {{-- end project --}}
    
    {{-- start js --}}
   
        @yield("js")
    {{-- end js --}}

</body>
</html>