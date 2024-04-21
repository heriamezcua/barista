<div class="position-fixed d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 300px; height: 100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">ADMINPANEL</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('adminpanel')}}" class="nav-link text-white" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{route('adminpanel.products')}}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                </svg>
                Products
            </a>
        </li>
    </ul>
    @auth
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    @endauth
</div>
