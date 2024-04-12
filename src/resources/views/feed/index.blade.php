@extends('layouts.app')

@section('content')
<div class="flex justify-center gap-12 p-12">
    <div class="flex flex-col w-2/3">
        <div id="openModalButton" class="flex flex-col px-7 py-5 w-full bg-white rounded-3xl max-md:px-5 max-md:max-w-full cursor-pointer">
            <div class="flex gap-5 text-md text-neutral-900 text-opacity-20 max-md:flex-wrap max-md:max-w-full">

                @if(Auth::user()->profile && Auth::user()->profile->profile_image)
                <img src="{{ asset('storage/profile/' . Auth::user()->profile->profile_image) }}" class="shrink-0 aspect-square w-[60px] rounded-full" />
                @else
                <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[60px] rounded-full" />
                @endif
                <div class="grow justify-center items-start px-7 py-4 my-auto rounded-2xl bg-zinc-100 w-fit max-md:px-5 max-md:max-w-full">
                    Share something...
                </div>
            </div>



            <div class="flex gap-5 justify-between items-end self-end mt-2 w-[820px] text-xs whitespace-nowrap  text-zinc-400 max-md:flex-wrap max-md:max-w-full">
                <div class="flex gap-5 justify-between items-start my-auto">
                    <div class="flex gap-1.5 self-stretch">
                        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 31.612 31.612" xml:space="preserve">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path d="M10.871,13.671l-4.058,4.057c-0.234,0.234-0.367,0.553-0.367,0.885c0,0.333,0.133,0.65,0.367,0.885l3.923,3.924 c0.245,0.244,0.565,0.367,0.887,0.367c0.32,0,0.641-0.123,0.885-0.367c0.49-0.488,0.49-1.281,0-1.771L9.47,18.613l3.173-3.172 c0.489-0.488,0.489-1.281,0-1.77C12.152,13.182,11.36,13.182,10.871,13.671z" />
                                        <path d="M18.969,15.443l3.174,3.171l-3.039,3.038c-0.488,0.488-0.488,1.281,0,1.771c0.244,0.244,0.564,0.366,0.886,0.366 s0.642-0.122,0.887-0.366l3.923-3.924c0.234-0.234,0.367-0.554,0.367-0.886c0-0.333-0.133-0.651-0.367-0.886l-4.058-4.056 c-0.489-0.489-1.281-0.489-1.771,0C18.48,14.16,18.48,14.954,18.969,15.443z" />
                                        <path d="M13.265,26.844c0.081,0.023,0.162,0.037,0.245,0.037c0.356,0,0.688-0.232,0.798-0.592l4.59-14.995 c0.138-0.441-0.111-0.908-0.553-1.043c-0.443-0.135-0.906,0.113-1.043,0.554L12.71,25.799 C12.576,26.241,12.823,26.707,13.265,26.844z" />
                                        <path d="M11.216,0L3.029,8.643v22.969h25.554V0H11.216z M10.495,3.635v3.83H6.867L10.495,3.635z M26.605,29.637H5.005V9.441h7.465 V1.975h14.135V29.637z" />
                                    </g>
                                </g>
                            </g>

                        </svg>
                        <div class="my-auto">Document</div>
                    </div>
                    <div class="flex gap-2.5">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M14.2639 15.9375L12.5958 14.2834C11.7909 13.4851 11.3884 13.086 10.9266 12.9401C10.5204 12.8118 10.0838 12.8165 9.68048 12.9536C9.22188 13.1095 8.82814 13.5172 8.04068 14.3326L4.04409 18.2801M14.2639 15.9375L14.6053 15.599C15.4112 14.7998 15.8141 14.4002 16.2765 14.2543C16.6831 14.126 17.12 14.1311 17.5236 14.2687C17.9824 14.4251 18.3761 14.8339 19.1634 15.6514L20 16.4934M14.2639 15.9375L18.275 19.9565M18.275 19.9565C17.9176 20 17.4543 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908C4.12796 18.7313 4.07512 18.5321 4.04409 18.2801M18.275 19.9565C18.5293 19.9256 18.7301 19.8727 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V16.4934M4.04409 18.2801C4 17.9221 4 17.4575 4 16.8V7.2C4 6.0799 4 5.51984 4.21799 5.09202C4.40973 4.71569 4.71569 4.40973 5.09202 4.21799C5.51984 4 6.07989 4 7.2 4H16.8C17.9201 4 18.4802 4 18.908 4.21799C19.2843 4.40973 19.5903 4.71569 19.782 5.09202C20 5.51984 20 6.0799 20 7.2V16.4934M17 8.99989C17 10.1045 16.1046 10.9999 15 10.9999C13.8954 10.9999 13 10.1045 13 8.99989C13 7.89532 13.8954 6.99989 15 6.99989C16.1046 6.99989 17 7.89532 17 8.99989Z" stroke="#000000" stroke-width="1.248" stroke-linecap="round" stroke-linejoin="round" />
                            </g>

                        </svg>
                        <div>Image</div>
                    </div>
                    <div class="flex gap-2">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z" stroke="#000000" stroke-width="1.272" stroke-linecap="round" stroke-linejoin="round" />
                            </g>

                        </svg>
                        <div class="my-auto">Video</div>
                    </div>
                </div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/82ace3ab39ce7da47f8de2f6d0b36e9f8a9bedb7ff752f4109d67431a4365c16?" class="shrink-0 w-8 aspect-square" />
            </div>
        </div>
        <div class="mt-6 w-full border border-solid bg-neutral-200 border-neutral-200 min-h-[2px] max-md:max-w-full"></div>
        @foreach($projects as $project)

        @include('feed.projects')
        @endforeach
    </div>














    <div class="flex flex-col max-w-[290px]">
        <div class="flex flex-col items-center px-5 pb-7 w-full bg-white rounded text-neutral-900">
            <img loading="lazy" srcset="..." class="self-stretch w-full aspect-[2.44]" />
            <img loading="lazy" srcset="..." class="z-10 mt-0 max-w-full border-2 border-white border-solid aspect-square w-[100px]" />
            <div class="mt-5 text-sm">Dmitry Kargaev</div>
            <div class="mt-2.5 w-60 text-xs leading-4 text-center">
                Freelance UX/UI designer, 80+ projects in web design, mobile apps (iOS &
                android) and creative projects. Open to offers.
            </div>
        </div>
        <div class="flex flex-col px-5 pt-7 pb-4 mt-5 w-full bg-white rounded">
            <div class="flex gap-5 uppercase">
                <div class="flex-auto text-xs text-neutral-900">Suggested for YOU</div>
                <div class="text-xs text-right text-sky-800">See all</div>
            </div>
            <div class="shrink-0 mt-4 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
            <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-3 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    <img loading="lazy" srcset="..." class="shrink-0 border-2 border-white border-solid aspect-[1.02] w-[41px]" />
                    <div class="my-auto">idelkadiradia</div>
                </div>
                <div class="my-auto text-xs text-right text-sky-800 uppercase">
                    FOLLOW
                </div>
            </div>
            <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-1.5 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    <img loading="lazy" srcset="..." class="shrink-0 border-2 border-white border-solid aspect-[1.02] w-[41px]" />
                    <div class="my-auto">idelkadiradia</div>
                </div>
                <div class="my-auto text-xs text-right text-sky-800 uppercase">
                    FOLLOW
                </div>
            </div>
            <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-1.5 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    <img loading="lazy" srcset="..." class="shrink-0 border-2 border-white border-solid aspect-[1.02] w-[41px]" />
                    <div class="my-auto">idelkadiradia</div>
                </div>
                <div class="my-auto text-xs text-right text-sky-800 uppercase">
                    FOLLOW
                </div>
            </div>
            <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-1.5 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    <img loading="lazy" srcset="..." class="shrink-0 border-2 border-white border-solid aspect-[1.02] w-[41px]" />
                    <div class="my-auto">idelkadiradia</div>
                </div>
                <div class="my-auto text-xs text-right text-sky-800 uppercase">
                    FOLLOW
                </div>
            </div>
        </div>
    </div>
    @include('feed.add-project')

</div>
@endsection