@extends('layouts.guest')

@section('content')
<div class="relative sm:flex sm:justify-center bg-white sm:items-center min-h-screen">


    <div class="flex flex-col">
        <div class="flex gap-5 justify-between items-center px-20 w-full text-xl leading-7 text-black max-md:flex-wrap max-md:px-5 max-md:max-w-full">
            <div class="flex items-center">
                <img src="{{ asset('storage/images/devlinker_logo_1.png') }}" class=" my-auto max-w-full aspect-[3.7] md:w-[200px] w-[120px]" />
            </div>
            <div class="flex gap-2 md:gap-5 justify-center items-center max-md:flex-wrap">
                @auth
                <a href="{{ url('/feed') }}"  class="justify-center px-7 py-2 text-center rounded-3xl text-white bg-sky-800 border  border-solid border-sky-900 max-md:px-5">
                    Home
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class=" justify-center px-7 py-2 text-center rounded-3xl text-sky-800 border border-solid border-sky-900 max-md:px-5">
                        LogOut
                    </button>
                </form>
                @endauth
                @if(!auth()->user())
                <a href="{{ route('auth.login') }}" class="text-sm  justify-center px-7 py-2 text-center rounded-3xl text-white bg-sky-800 border  border-solid border-sky-900 max-md:px-5">
                    Login
                </a>
                <a href="{{ route('auth.register') }}" class="text-sm justify-center px-7 py-2 text-center rounded-3xl text-sky-800 border  border-solid border-sky-900 max-md:px-5">
                    Register
                </a>
                @endif
            </div>
        </div>
        <div class="justify-between  px-20 mt-8 w-full max-md:px-5 max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 items-center max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col text-xl text-black max-md:mt-10 max-md:max-w-full">
                        <div class="text-5xl  max-md:max-w-full max-md:text-3xl">
                            Empowering Developers, Connecting Talent
                        </div>
                        <div class="mt-9 mr-8 text-lg max-md:mr-2.5 max-md:max-w-full">
                            DevLinker is the platform where developers showcase their projects and skills, empowering them to reach a wider audience and connect with potential employers. Whether you're a developer looking to share your work or an employer seeking talented individuals for your projects, DevLinker provides the space for collaboration and growth.
                        </div>
                        <div class="justify-center self-start px-6 py-3 text-sm mt-9 text-center text-white rounded-2xl bg-sky-800 leading-[140%] max-md:px-5">
                            Join DevLinker today
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full max-md:hidden">
                    <img src="{{asset("storage\images\welcome.jpg")}}" class="grow w-full aspect-[1.16] max-md:mt-10 max-md:max-w-full" />
                </div>
            </div>
        </div>
    </div>
</div>




@endsection