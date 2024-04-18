@extends('layouts.app')

@section('content')

    <div class="px-12 py-4 justify-center flex gap-5 max-md:flex-col max-md:gap-0">
        <div class="flex flex-col w-1/4 max-md:ml-0 max-md:w-full">
            <div class="flex flex-col mt-2.5 max-md:mt-10">
                <div class="flex flex-col justify-center px-8 py-6 text-xs text-center text-white uppercase bg-white rounded max-md:px-5">
                    <div class="justify-center items-center px-16 py-3  bg-sky-800 rounded max-md:px-5">
                        Start new chat
                    </div>
                </div>
                <div class="flex flex-col py-6 mt-6 w-full bg-white rounded">
                    <div class="self-start ml-8 text-xs  uppercase text-neutral-900 max-md:ml-2.5">
                        Chats
                    </div>
                    <div class="shrink-0 mt-5 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
                    <div class="flex gap-4 pl-6 mt-5">
                        <div class="flex overflow-hidden relative flex-col items-start aspect-square w-[52px] max-md:pl-5">
                            <img src="{{ asset('storage/profile/unknown.png') }}" class=" rounded-full object-cover absolute inset-0 size-full" />
                        </div>
                        <div class="flex flex-col  my-auto">
                            <div class="text-sm  text-neutral-900">UserName</div>
                            <div class="flex gap-1 mt-2 justify-center text-xs leading-4 text-neutral-900 text-opacity-50">
                                <span class="shrink-0 self-start bg-sky-600 rounded-full aspect-square w-[9px]"></span>
                                <div class="flex-auto">last message</div>
                            </div>
                        </div>
                    </div>
                    <div class="shrink-0 mt-3.5 h-px border border-solid bg-zinc-100 border-zinc-100"></div>

                </div>
            </div>
        </div>
        <div class="flex flex-col ml-5 w-2/3 max-md:ml-0 max-md:w-full">
            <div class="flex flex-col grow pt-1.5 pb-5 w-full bg-white rounded-3xl text-neutral-900 max-md:mt-10 max-md:max-w-full">
                <div class="shadow-sm flex flex-col px-5 py-3 max-md:px-5 max-md:max-w-full">
                    <div class="flex gap-3 self-start">
                        <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                        <div class="flex flex-col my-auto">
                            <div class="text-sm">name of the friend </div>
                            <div class="mt-2 text-xs uppercase">last online: 4 hours ago</div>
                        </div>
                    </div>

                </div>
                <div class="flex flex-col px-8 mt-9 leading-[150%] max-md:px-5 max-md:max-w-full">

                    <div class="flex gap-5 text-xs text-center uppercase max-md:flex-wrap">
                        <div class="shrink-0 max-w-full h-1 border border-solid bg-zinc-100 border-zinc-100 w-[302px]"></div>
                        <div class="flex-auto ">yesterday, 29 aug</div>
                        <div class="shrink-0 max-w-full h-1 border border-solid bg-zinc-100 border-zinc-100 w-[302px]"></div>
                    </div>
                    <div class="flex gap-4 self-start mt-5">
                        <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                            <div class="justify-center text-white px-5 py-4 text-sm bg-sky-800 rounded-3xl">
                                Nope, they kicked me out of the office!
                            </div>
                            <div class="self-end mt-2.5 text-xs text-right">4:29 PM</div>
                        </div>
                    </div>
                    <div class="flex gap-4 self-end mt-5">
                        <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                            <div class="justify-center px-5 py-4 text-sm bg-sky-50 rounded-3xl">
                                Nope, they kicked me out of the office!
                            </div>
                            <div class="self-end mt-2.5 text-xs text-right">4:29 PM</div>
                        </div>
                        <img loading="lazy" srcset="..." class="shrink-0 self-start aspect-[0.98] w-[46px]" />
                    </div>
                </div>

                <div class="shrink-0 mt-7 h-px border border-solid bg-zinc-100 border-zinc-100 max-md:max-w-full"></div>
                <div class="flex gap-5 w-full items-center mx-8 mt-5 text-base text-neutral-500 text-opacity-50 ">
                    <input placeholder="Write your message" class="w-[85%] px-8 py-5 rounded-3xl bg-zinc-100 max-md:px-5">

                
                </div>

            </div>
        </div>
    </div>


@endsection