<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
nav {
    background-color: #171717;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* border-radius: 0.5rem; */
    font-family: "Inknut Antiqua", serif;
    color: white
}
nav ul li{
    margin: 0 1rem
}

.btn-profile {
    background-color: #A47D31;
    color: white;
}
</style>

<div>
    <nav class="flex justify-between items-center px-3 py-2">
        <div class="title flex items-center gap-2">
            <img src="assets/icon/logo.png" alt="" class="icon">
            <h1>Harris Hottel</h1>
        </div>
        <ul class="flex">
            <li>
                <a href="{{url('/')}}">home</a>
            </li>
            <li>
                <a href="">Amenities</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
            <li>
                <a href="">local Area</a>
            </li>
        </ul>
        <div class="profile">
            @if (Route::has('login'))
                
                @auth
                <div class="dropdown py-2">
                    <button class="btn-profile btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('user-dashboard')}}">history</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><form action="{{route('logout')}}" x-data method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">logout</button>
                            </form>
                        </li>
                    </ul>
                  </div>
                    
                @else
                    <div class="py-3">
                        <a class="btn-profile btn" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif --}}
                    </div>
                @endauth
                
            @endif
        </div>
    </nav>



    {{-- @if (Route::has('login'))
                
                    @auth
                    <div class="dropdown">
                        <button class="dropbtn">{{ Auth::user()->name }} 
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div> 
                        
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth

            @endif --}}
</div>
