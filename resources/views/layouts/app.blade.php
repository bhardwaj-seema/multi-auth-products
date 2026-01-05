<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="bg-gray-200">

<div class="flex justify-between">
    
    <header class="bg-indigo-600 text-white p-4 flex justify-between">
   
<h1> <span class="font-bold">@yield('header-title', 'Dashboard')</span></h1>
    <form class="mx-2" method="POST" action="{{ route(request()->routeIs('admin.*') ? 'admin.logout' : 'customer.logout') }}">
        @csrf
        <button class="text-sm underline">Logout</button>
    </form>
    
</header>
</div>

<div class="flex min-h-screen">
    <aside class="w-64 bg-white p-4 shadow">
    
         @if (auth('admin')->check())
             <p class="font-semibold mb-2">Menu</p>
           <li> <a href="{{ route('admin.products.index')}}">Products</a></li>
             
         @endif
        </ul>
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

<script>
    Echo.join('online-users')
    .here(users => {
        console.log('Currently online:', users);
    })
    .joining(user => {
        console.log('User joined:', user);
    })
    .leaving(user => {
        console.log('User left:', user);
    });

</script>
</body>
</html>
