@extends('layouts.guest')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">


    <div class="flex flex-col">
        <div class="flex gap-5 justify-between px-20 w-full text-xl leading-7 text-black max-md:flex-wrap max-md:px-5 max-md:max-w-full">
            <div class="flex items-center">
                <img src="{{ asset('storage/images/devlinker_logo_1.png') }}" class=" my-auto max-w-full aspect-[3.7] w-[230px]" />
            </div>
            <div class="flex gap-5 justify-center items-center max-md:flex-wrap">
                @auth
                <a href="{{ url('/feed') }}" class="justify-center self-stretch px-7 py-3 text-center rounded-2xl border border-solid border-zinc-900 max-md:px-5">
                    Home
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="justify-center self-stretch px-7 py-3 text-center rounded-2xl border border-solid border-zinc-900 max-md:px-5">
                        LogOut
                    </button>
                </form>
                @endauth
                <a href="{{ route('auth.login') }}" class="justify-center px-7 py-2 text-center rounded-3xl text-white bg-sky-800 border  border-solid border-sky-900 max-md:px-5">
                    Login
                </a>
                <a href="{{ route('auth.register') }}" class="justify-center px-7 py-2 text-center rounded-3xl text-sky-800 border  border-solid border-sky-900 max-md:px-5">
                    Register
                </a>
            </div>
        </div>
        <div class="justify-between  px-20 mt-16 w-full max-md:px-5 max-md:mt-10 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col text-xl text-black max-md:mt-10 max-md:max-w-full">
                        <div class="text-6xl font-medium max-md:max-w-full max-md:text-4xl">
                            Navigating the digital landscape for success
                        </div>
                        <div class="mt-9 mr-8 leading-7 max-md:mr-2.5 max-md:max-w-full">
                            Our digital marketing agency helps businesses grow and succeed
                            online through a range of services including SEO, PPC, social media
                            marketing, and content creation.
                        </div>
                        <div class="justify-center self-start px-9 py-5 mt-9 text-center text-white rounded-2xl bg-zinc-900 leading-[140%] max-md:px-5">
                            Book a consultation
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8b676fb288e1199067b2fefecd14b887ec1902303c1b6ab14ebdcdf9aefcb01c?" class="grow w-full aspect-[1.16] max-md:mt-10 max-md:max-w-full" />
                </div>
            </div>
        </div>
    </div>
</div>




@endsection