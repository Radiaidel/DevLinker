@extends('layouts.app')

@section('content')

<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-2 gap-4 md:grid-cols-2 md:gap-8 xl:grid-cols-4 2xl:gap-7.5">
            <!-- Card Item Start -->

            <div class="rounded-xl border border-stroke bg-white p-6 shadow-md">
                <div class="flex justify-start  w-[50px] h-[50px] items-center justify-center rounded-full bg-sky-50  ">
                    <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C9.92893 8.25 8.25 9.92893 8.25 12C8.25 14.0711 9.92893 15.75 12 15.75C14.0711 15.75 15.75 14.0711 15.75 12C15.75 9.92893 14.0711 8.25 12 8.25ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z" fill="#075985" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.25C7.48587 3.25 4.44529 5.9542 2.68057 8.24686L2.64874 8.2882C2.24964 8.80653 1.88206 9.28392 1.63269 9.8484C1.36564 10.4529 1.25 11.1117 1.25 12C1.25 12.8883 1.36564 13.5471 1.63269 14.1516C1.88206 14.7161 2.24964 15.1935 2.64875 15.7118L2.68057 15.7531C4.44529 18.0458 7.48587 20.75 12 20.75C16.5141 20.75 19.5547 18.0458 21.3194 15.7531L21.3512 15.7118C21.7504 15.1935 22.1179 14.7161 22.3673 14.1516C22.6344 13.5471 22.75 12.8883 22.75 12C22.75 11.1117 22.6344 10.4529 22.3673 9.8484C22.1179 9.28391 21.7504 8.80652 21.3512 8.28818L21.3194 8.24686C19.5547 5.9542 16.5141 3.25 12 3.25ZM3.86922 9.1618C5.49864 7.04492 8.15036 4.75 12 4.75C15.8496 4.75 18.5014 7.04492 20.1308 9.1618C20.5694 9.73159 20.8263 10.0721 20.9952 10.4545C21.1532 10.812 21.25 11.2489 21.25 12C21.25 12.7511 21.1532 13.188 20.9952 13.5455C20.8263 13.9279 20.5694 14.2684 20.1308 14.8382C18.5014 16.9551 15.8496 19.25 12 19.25C8.15036 19.25 5.49864 16.9551 3.86922 14.8382C3.43064 14.2684 3.17374 13.9279 3.00476 13.5455C2.84684 13.188 2.75 12.7511 2.75 12C2.75 11.2489 2.84684 10.812 3.00476 10.4545C3.17374 10.0721 3.43063 9.73159 3.86922 9.1618Z" fill="#075985" />
                        </g>

                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-black ">
                            {{$totalVisitors}}
                        </h4>
                        <span class="text-sm text-gray-600 font-medium">Total views</span>
                    </div>

                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-xl border border-stroke bg-white p-6 shadow-md">
                <div class="flex justify-start  w-[50px] h-[50px] items-center justify-center rounded-full bg-sky-50  "> <svg width="25px" height="25px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <title>project</title>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Combined-Shape" fill="#075985" transform="translate(64.000000, 34.346667)">
                                    <path d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M42.666,157.654 L42.6666667,307.920144 L170.666,381.82 L170.666,231.555 L42.666,157.654 Z M341.333,157.655 L213.333,231.555 L213.333,381.82 L341.333333,307.920144 L341.333,157.655 Z M192,49.267223 L66.1333333,121.936377 L192,194.605531 L317.866667,121.936377 L192,49.267223 Z"> </path>
                                </g>
                            </g>
                        </g>

                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-black">
                            {{$totalProjects}}
                        </h4>
                        <span class="text-sm font-medium text-gray-600">Total projects</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-xl border border-stroke bg-white p-6 shadow-md">
                <div class="flex justify-start  w-[50px] h-[50px] items-center justify-center rounded-full bg-sky-50  "> <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <path d="M18.364 5.63604C19.9926 7.26472 21 9.51472 21 12C21 16.9706 16.9706 21 12 21C9.51472 21 7.26472 19.9926 5.63604 18.364M18.364 5.63604C16.7353 4.00736 14.4853 3 12 3C7.02944 3 3 7.02944 3 12C3 14.4853 4.00736 16.7353 5.63604 18.364M18.364 5.63604L5.63604 18.364" stroke="#075985" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>

                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-black ">
                            {{$totalBlockedUsers}}
                        </h4>
                        <span class="text-sm font-medium text-gray-600">Total Blocked users</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-xl border border-stroke bg-white p-6 shadow-md">
                <div class="flex justify-start  w-[50px] h-[50px] items-center justify-center rounded-full bg-sky-50  "> <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <circle cx="9" cy="6" r="4" stroke="#075985" stroke-width="1.5" />
                            <path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="#075985" stroke-width="1.5" stroke-linecap="round" />
                            <ellipse cx="9" cy="17" rx="7" ry="4" stroke="#075985" stroke-width="1.5" />
                            <path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="#075985" stroke-width="1.5" stroke-linecap="round" />
                        </g>

                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-black ">
                            {{$totalUsers}}
                        </h4>
                        <span class="text-sm font-medium text-gray-600">Total Users</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->
        </div>

        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            @include('admin.partials.visitors')
            @include('admin.partials.doc_analytics')
            @include('admin.partials.users_block')
            @include('admin.partials.projects_analytics')

        </div>
    </div>
</main>
@endsection