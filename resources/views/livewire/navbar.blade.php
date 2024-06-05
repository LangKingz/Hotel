<style>

nav {
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;

}

nav ul li{
    margin: 0 1rem
}
</style>



<div>
    <nav class="flex justify-between items-center px-3 py-2">
        <div class="title">
            <h1>Navbar</h1>
        </div>
        <ul class="flex">
            <li>
                <a href="">About</a>
            </li>
            <li>
                <a href="">Services</a>
            </li>
            <li>
                <a href="">Blog</a>
            </li>
        </ul>
        <div class="profile">
            @if (Route::has('login'))
                
                @auth
                <div class="dropdown py-2">
                    <button class="btn bg-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('dashboard')}}">Action</a></li>
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
                        <a class="bg-black text-white px-3 py-2" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

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
