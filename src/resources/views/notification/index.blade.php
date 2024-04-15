@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-end items-center pt-6 ">
    <div class="flex gap-5 justify-between px-5 mt-12 max-w-full text-xs text-center uppercase whitespace-nowrap text-neutral-900 w-[850px] max-md:flex-wrap max-md:mt-10">
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[360px]"></div>
        <div class="italic">recent</div>
        <div class="shrink-0 max-w-full border border-solid bg-neutral-200 border-neutral-200 h-[9px] w-[360px]"></div>
    </div>
    <div class="flex gap-5 justify-between px-6 py-3.5 mt-10 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:pl-5">
        <div class="flex gap-5 items-start self-start mt-4">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />

            <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                <div class="text-sm">
                    Audrey Alexander and 10 others likes your post
                </div>
                <div class="mt-2.5 text-xs italic">3 hours</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">

    </div>
    <div class="flex gap-5 justify-between px-7 py-3.5 mt-2.5 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:px-5">
        <div class="flex gap-5 justify-between self-start mt-2.5">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            <div class="flex flex-col self-start">
                <div class="text-sm">Comment your post.</div>
                <div class="mt-2.5 text-xs italic">9 hours</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">
    </div>
    <div class="flex gap-5 justify-between px-7 py-3.5 mt-2.5 max-w-full bg-white rounded shadow-lg leading-[150%] w-[850px] max-md:flex-wrap max-md:px-5">
        <div class="flex gap-5 justify-between self-start">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            <div class="flex flex-col my-auto">
                <div class="text-sm text-black">Eduardo Russel likes your post.</div>
                <div class="mt-2.5 text-xs italic text-neutral-900">12 hours</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">
    </div>
    <div class="flex gap-5 justify-between px-5 mt-11 max-w-full text-xs text-center uppercase whitespace-nowrap text-neutral-900 w-[850px] max-md:flex-wrap max-md:mt-10">
        <div class="shrink-0 max-w-full h-2 border border-solid bg-neutral-200 border-neutral-200 w-[360px]"></div>
        <div>Earlier</div>
        <div class="shrink-0 max-w-full h-2 border border-solid bg-neutral-200 border-neutral-200 w-[360px]"></div>
    </div>
    <div class="flex gap-5 justify-between px-7 py-3.5 mt-10 max-w-full bg-white rounded shadow-lg leading-[150%] text-neutral-900 w-[850px] max-md:flex-wrap max-md:px-5">
        <div class="flex gap-5 justify-between self-start mt-2.5">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            <div class="flex flex-col self-start">
                <div class="text-sm">Comment your post.</div>
                <div class="mt-2.5 text-xs italic">9 hours</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">
    </div>
    <div class="flex gap-5 justify-between px-7 py-3.5 mt-2.5 max-w-full bg-white rounded shadow-lg leading-[150%] w-[850px] max-md:flex-wrap max-md:px-5">
        <div class="flex gap-5 justify-between self-start">
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            <div class="flex flex-col my-auto">
                <div class="text-sm text-black">Eduardo Russel likes your post.</div>
                <div class="mt-2.5 text-xs italic text-neutral-900">12 hours</div>
            </div>
        </div>
        <img src="{{ asset('storage/images/project_default.jpg') }}" alt="Image" class="aspect-square w-[50px]">
    </div>

</div>
@endsection