<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    <title>@yield('title')</title>
    
    @yield('css')
</head>
<body>
    
    {{-- Navbar --}} 
        <div class="nav">
            <nav class="getNav">
                <h4>Logo</h4>
                <ul>
                    <li><a class="active" href="/">Home</a></li>
                    <li><a class="backHome" href="{{route('slider.index')}}">slider</a></li>
                    <li><a class="backHome" href="{{route('about.index')}}">about</a></li>
                    <li><a class="backHome" href="{{route('team.index')}}">team</a></li>
                    <li><a class="backHome" href="{{route('category.index')}}">category</a></li>
                    <li><a class="backHome" href="{{route('product.index')}}">product</a></li>
                    <li><a class="backHome" href="{{route('info.index')}}">info</a></li>
                    <li><a class="backHome" href="{{route('social.index')}}">social</a></li>
                    <li><a class="backHome" href="{{route('contact.index')}}">contact</a></li>
                    <li><a class="backHome" href="{{route('ajax-comments')}}">comments</a></li>
                    <li><a class="backHome" href="{{route('show-website')}}" target="_blank">Show-Website</a></li>
                    <li>
                        {{-- <form action="{{route('logout')}}" method="POST" class="form-not">
                            @csrf
                            <input type="submit" value="">
                        </form> --}}
                        <a class="danger" href="#about">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    {{-- End Navbar --}} 
    {{-- make Menu --}} 
        <h5 class="">Hello Admin</h5>
        
    {{-- end make Menu --}} 
    @yield("content")
   
    {{-- JS --}} 
     
     @yield('js')
</body>
</html>