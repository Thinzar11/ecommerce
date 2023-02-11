<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Dashboard</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="{{ asset('js/app.js') }}" defer></script>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row g-0">
            <div class="col-2 bg-light ">
               <h1 class="h4 text-primary text-center my-4">
                  <i class="fas fa-ghost"></i>
                  <span class="ms-2 d-none d-lg-inline text-uppercase">Ghost Admin</span>
               </h1>
               <p class=" text-uppercase ms-3 text-black-50 mb-2 " style="font-size:13px ;">contorls</p>
               <ul class="list-group mb-4 pe-3">
                <a href="{{"/adminpanel"}}" class="text-decoration-none">
                  <li class="list-group-item text-center text-lg-start active text-white">
                     <i class="fas fa-home text-light"></i>
                     <span class="ms-2 d-none d-lg-inline text-white">Dashboard</span>
                  </li>
                </a>

                <a href="{{"/adminpanel/products"}}" class="text-decoration-none">
                  <li class="list-group-item text-center text-lg-start">
                     <span class="ms-2 d-none d-lg-inline">Products</span>
                  </li>
                </a>

                <a href="{{"/adminpanel/categories"}}" class="text-decoration-none">
                  <li class="list-group-item text-center text-lg-start">
                     <span class="ms-2 d-none d-lg-inline">Categories</span>
                  </li>
                </a>

                <a href="{{"/adminpanel/colors"}}" class="text-decoration-none">
                  <li class="list-group-item text-center text-lg-start">
                     <span class="ms-2 d-none d-lg-inline">Colors</span>
                  </li>
                </a>

                <a href="{{"/adminpanel/sizes"}}" class="text-decoration-none">
                    <li class="list-group-item text-center text-lg-start">
                       <span class="ms-2 d-none d-lg-inline">Sizes</span>
                    </li>
                  </a>

                <a href="{{"/adminpanel/orders"}}" class="text-decoration-none">
                  <li class="list-group-item text-center text-lg-start">
                     <span class="ms-2 d-none d-lg-inline">Orders</span>
                  </li>
                </a>
               </ul>
            </div>
            <div class="col-10">
               <nav class="navbar bg-light navbar-expand">
                  <div class="container-fluid">
                     <div class="flex-grow"></div>
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                           <i class="fas fa-cog"></i>
                           </a>
                        </li>
                        <li class="nav-item dropdown">
                           <a
                              href="#"
                              class="nav-link dropdown-toggle"
                              data-bs-toggle="dropdown"
                              >
                           <i class="fas fa-user-circle"></i>
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
               </nav>
               @yield('content')
            </div>

         </div>
      </div>
      {{-- <script src="./js/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script> --}}
   </body>

</html>
