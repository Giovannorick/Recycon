<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('storage/image/Icon_noBG.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
{{-- Header --}}
<header>
  <nav class="navbar navbar-expand-lg bg-dark bg-gradient">
    <div class="container-fluid px-3">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  me-auto mb-3 mb-lg-1">
          <li class="nav-item ">
            <a class="nav-link active text-warning" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-warning" aria-current="page" href="/showProduct">Show Product</a>
          </li>
      
          @auth
            @if (Auth::user()->isAdmin == true)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage Item
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item " href="/viewItem">View Item</a></li>
                  <li><a class="dropdown-item " href="/addItem">Add Item</a></li>
                </ul>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link text-warning" aria-current="page" href="/myCartItems">My Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning" aria-current="page" href="/transactionHistory">Transaction History</a>
              </li>
            @endif
          @endauth
        </ul>

          @auth
            <ul class="w-50 mb-3 mb-lg-1">
              <form class="d-flex" action="/search">
                <input class="form-control me-3 " type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-outline-warning" type="submit">Search</button>
              </form>
            </ul>
            
            <ul class="navbar-nav ms-auto mb-3 mb-lg-1">   
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
                  <li><a class="dropdown-item" href="/editProfile/{{Auth::user()->id}}">Edit Profile</a></li>
                  <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                </ul>
              </li>
      
              <form action="/logout" method="get">
                <button class="btn btn-outline-warning" type="submit" value="logout">Log Out</button>
              </form>
            </ul>
          @else
            <ul class="navbar-nav ms-auto mb-3 mb-lg-1"> 
              <li class="nav-item">
                <a class="nav-link active fw-bold" aria-current="page" href="/login">
                    <button class="btn btn-outline-warning">Login</button>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/register">
                  <button class="btn btn-outline-warning">Register</button>
                </a>
              </li>
            </ul>
          @endauth
      </div>
    </div>
  </nav>
</header>


{{-- content --}}
 <div class="flex-grow-1 p-2" style="background-color: #f9f8f4; height: auto;">
  <div class="py-3" style="background-color: #f9f8f4;">
    @yield('body')
  </div>
</div>

{{-- footer --}}
<footer>
  <div class="fixed bg-dark bg-gradient text-center text-white py-3">
    <h5 class="py-2 my-3 text-warning">&copy; 2022 Copyright LC062</h5>
  </div>
</footer>
</body>
</html>