<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>@yield('title')</title>
</head>
<body>

    <nav class="bg-gray-800 p-4 flex justify-between space-x-4">
        <div class="flex justify-between space-x-4">
           <ul class="itmes-center flex gap-2">
             <li><a href="{{route('home')}}" class="text-gray-300 hover:text-white">Accueil</a></li>
             <li><a href="{{route('contact.show')}}" class="text-gray-300 hover:text-white">Contact</a></li>
           </ul>
        </div>

        <a href="{{route('login')}}" ><box-icon class="fill-white" type='solid' name='user-circle'></box-icon></a>

    </nav>


    <div>
        @yield('content')
    </div>

</body>
</html>