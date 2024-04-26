@extends('layouts.guest')

@section('content')
<div class="flex justify-center items-center px-16 py-10 bg-white max-md:px-5">
    <div class="w-full max-w-[1157px] max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
        <div class="flex flex-col w-[56%] max-md:ml-0 max-md:w-full">
                <a href="{{ url()->previous() }}">
                    <div class="flex md:w-[20%] w-full gap-1 justify-center self-start px-6 py-1 text-xs  rounded bg-zinc-200 max-md:px-5">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f4b63c3e07c8dfc747caca3517e2db2db71cad67d30d98339609c907b11055ac?" class="shrink-0 w-6 aspect-square" />
                        <div class="my-auto">Go back</div>
                    </div>
                </a>

                <div class=" hidden md:flex flex-col grow font-bold text-slate-600 max-md:mt-10 max-md:max-w-full">
                    <div class="mt-12 text-6xl  text-zinc-800 max-md:mt-10 max-md:max-w-full max-md:text-4xl ">
                        Dev<span class="text-sky-800">Linker</span>
                        <br>
                        <div class="text-xl mt-6">

                            Empowering Developers, Connecting Talent
                        </div>

                    </div>
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/73acedd960075093ca07fb10936f83f5e2c1edd648a20b7c095de13472c446a8?" class="mt-9 max-w-full aspect-square w-[400px]" />
                </div>
            </div>
            <div class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full ">
                <div class="shadow-md flex flex-col px-11 py-9 mt-4 w-full text-base bg-white rounded-3xl border border-solid border-zinc-200 max-md:px-5 max-md:mt-10 max-md:max-w-full">
                    <div class="text-2xl text-zinc-800">Create an Account</div>
                    <div class="mt-4 text-zinc-600">
                        Sign up to start your educational journey.
                    </div>
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <div class="mt-6 text-xs text-zinc-600">Name</div>
                        <input type="text" id="name" name="name" placeholder="Your Name" class="w-full flex flex-col justify-center px-4 py-2 mt-2 whitespace-nowrap rounded-lg border border-solid border-neutral-300 text-zinc-800">

                        <div class="mt-6 text-xs text-zinc-600">Email</div>
                        <input type="email" id="email" name="email" placeholder="Your Email Address" class="w-full flex flex-col justify-center px-4 py-2 mt-2 whitespace-nowrap rounded-lg border border-solid border-neutral-300 text-zinc-800">

                        <div class="mt-6 text-xs text-zinc-600">Password</div>
                        <input type="password" id="password" name="password" placeholder="Password" class="w-full flex flex-col justify-center px-4 py-2 mt-2 whitespace-nowrap rounded-lg border border-solid border-neutral-300 text-zinc-800">

                        <div class="flex items-center text-sm mt-5">
                            <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <label for="terms" class="ml-2 text-gray-700">I agree to the terms and conditions</label>
                        </div>

                        <button type="submit" class="justify-center px-4 py-4 mt-10 text-xl text-center text-white bg-sky-700 rounded-xl max-md:mt-10 w-full">Sign up</button>
                    </form>

                    <div class="mt-6 text-center text-blue-500">
                        Already have an account?
                        <a href="{{route('auth.login')}}" class="font-semibold text-blue-500">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection