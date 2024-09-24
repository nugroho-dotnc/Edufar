<nav class="navbar bg-base-300 shadow-md">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl me-2">{{ config('app.name') }}</a>
{{--        @if (Route::currentRouteName() !== 'login.page' && Route::currentRouteName() !== 'register.page')--}}
            <div class="join">
                <input class="input input-bordered join-item" placeholder="Search here..." />
                <button class="btn btn-outline join-item">Search</button>
            </div>
    </div>
    <div class="flex-none gap-4">
{{--        @if (Auth::check())--}}
{{--            <button class="btn btn-sm btn-circle btn-outline">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                     stroke="currentColor" class="w-6 h-6">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            <div class="dropdown dropdown-end">--}}
{{--                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">--}}
{{--                    <div class="w-10 rounded-full">--}}
{{--                        <img alt="{{ Auth::user()->name }}"--}}
{{--                             src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <ul tabindex="0"--}}
{{--                    class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">--}}
{{--                    --}}{{----}}{{-- <li><a href="{{ route('profile.page', Auth::user()->username) }}">Profile</a></li> --}}
{{--                    <li><a>Inbox</a></li>--}}
{{--                    <li><a href="{{ route('logout.post') }}">Logout</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @else--}}
            <div class="flex-auto navbar-end gap-2">
                <a class="btn btn-outline btn-primary" >Signup</a>
                <a class="btn btn-active btn-primary" >Login</a>
            </div>
{{--        @endif--}}
    </div>
{{--    @endif--}}
</nav>
