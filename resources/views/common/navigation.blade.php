<nav>
    <a href="/" class="{{ $current_page == 'home' ? 'highlighted' : '' }}">Home</a>
    <a href="/about-us" class="{{ $current_page == 'about-us' ? 'highlighted' : '' }}">About</a>
    @can('admin')
    <nav>
        <a href="{{route('admin.index')}}">Administrator's menu</a>
    </nav>
    @endcan
    @auth 
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <a href="/register" class="{{ $current_page == 'register' ? 'highlighted' : '' }}">Register</a>
        <a href="/login" class="{{ $current_page == 'login' ? 'highlighted' : '' }}">Login</a>
    @endauth

  

{{-- @elsecan('has_role', 'instructor')
    <nav>
        Instructor's menu
    </nav>
@endcan --}}
        
</nav>