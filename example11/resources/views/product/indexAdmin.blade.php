<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
      
        /* Header Styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
      
        h1 {
            margin: 0;
            font-size: 24px;
        }
      
        /* Sidebar Styles */
        .sidebar {
            background-color: #f4f4f4;
            width: 200px;
            padding: 20px;
            float: left;
        }
      
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
      
        .sidebar li {
            margin-bottom: 10px;
        }
      
        .sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
      
        .sidebar a:hover {
            background-color: #ddd;
        }
      
        /* Main Content Styles */
        .main-content {
            padding: 20px;
            margin-left: 220px;
        }
      
        .main-content h2 {
            margin-top: 0;
        }
      
        /* Example Dashboard Cards */
        .dashboard-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
      
        .dashboard-card h3 {
            margin-top: 0;
            font-size: 18px;
        }
      
        .dashboard-card p {
            margin: 0;
            color: #888;
        }
        a {
            margin 9px;
        }
        /* CSS styles */

        /* Form */
        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        button[type="submit"] {
            padding: 5px 10px;
        }

        /* Table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Links */
        a {
            text-decoration: none;
            color: blue;
        }

        /* Buttons */
        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="navbar-brand" href="\dashboard">dashboard</a>
                <a class="navbar-brand" href="{{ route('userorders.index') }}">Orders</a>
                <a class="navbar-brand" href="category">Categories</a>
                <a class="navbar-brand" href="profile">Profile</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<form action="/products/search" method="POST">
    @csrf
    <input type="text" name="keyword" placeholder="Search products">
    <button type="submit">Search</button>
</form>
   <table>
    <a href="{{route('product.create')}}">Create Product</a>
    <thead>
        <tr>
            <th>Product name</th>
            <th>Product price</th>
            <th>Product availability</th>
            <th>Category Name</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->product_availability}}</td>
            <td>{{$product->category->name}}</td>

            <td>
                {{-- <a href="{{route('product.show',$product->product_id)}}">show</a> --}}

           <form action="{{route('product.show',$product->id)}}">
            <button type='submit'>show</button>
           </form>
           <form action="{{route('product.delete',$product->id)}}" method="POST">
            @method('DELETE')
            @csrf
               <button type="submit">Delete</button>
           </form>
            <form action="{{route('product.update',$product->id)}}">

                <button>Update</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>

</body>
</html>