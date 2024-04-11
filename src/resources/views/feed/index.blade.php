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
        <div class="flex flex-col px-8 py-6 mt-10 w-full bg-white rounded-3xl shadow-lg text-neutral-900 max-md:px-5 max-md:max-w-full">
            <div class="flex gap-5 justify-between w-full max-md:flex-wrap max-md:mr-1.5 max-md:max-w-full">
                <div class="flex gap-4 px-px">
                    @if($project->user->profile && $project->user->profile->profile_image)
                    <img src="{{ asset('storage/profile/' . $project->user->profile->profile_image) }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                    @else
                    <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
                    @endif
                    <div class="flex flex-col my-auto">
                        <div class="text-sm">{{ $project->user->name }}</div>
                        <div class="mt-2.5 text-xs leading-4">{{ $project->user->profile->title }}</div>
                    </div>
                </div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/58c4a5a5f1c790f1fd03172a6c3d20a1857e82f20a35d65c8ac9024f159555b7?" class="shrink-0 my-auto w-6 aspect-square" />
            </div>
            <div class="mt-5 mb-2 text-lg leading-5 max-md:max-w-full "> <strong>{{$project->title}}</strong> </div>
            <div class="text-sm max-h-24 mb-4 overflow-hidden leading-6 max-md:max-w-full" id="description_{{$loop->iteration}}">
                {{$project->description}}
            </div>
            @if(strlen($project->description) > 120)
            <button class="toggleDescriptionBtn text-sm text-blue-500 cursor-pointer">...lire la suite</button>
            @endif
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var description = document.getElementById('description_{{$loop->iteration}}');
                    var toggleBtn = description.nextElementSibling;

                    toggleBtn.addEventListener('click', function() {
                        if (description.classList.contains('max-h-24')) {
                            description.classList.remove('max-h-24');
                            toggleBtn.textContent = 'réduire';
                        } else {
                            description.classList.add('max-h-24');
                            toggleBtn.textContent = '...lire la suite';
                        }
                    });
                });
            </script>
            @php
            $imagePaths = [];
            @endphp
            @foreach ($project->media as $media)
            @if ($media->type === 'document')
            <div class="flex gap-5 justify-between px-6 py-5 mt-5 w-full bg-indigo-50 rounded leading-[150%] max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
                <div class="flex gap-4">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce3b78eb4910f8881d4d5316b82b4352381767a0953bf889bdd252361cba0248?" class="shrink-0 aspect-square w-[42px]" />
                    <div class="flex flex-col self-start mt-1.5">
                        <div class="text-sm ">{{ $media->path }}</div>
                        <div class="mt-3.5 text-xs">{{ strtoupper(pathinfo(asset('storage/documents/'.$media->path), PATHINFO_EXTENSION)) }} file, {{ round(Storage::size('public/documents/'.$media->path) / 1024, 2) }} Ko</div>
                    </div>
                </div>
                <div class="my-auto">
                    <a href="{{ asset('storage/documents/'.$media->path) }}" download>
                        <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0" />
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 7L12 14M12 14L15 11M12 14L9 11" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16 17H12H8" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" />
                            </g>
                        </svg>
                    </a>
                </div>

            </div>
            @elseif ($media->type === 'image')
            @php
            $imagePaths[] = asset('storage/images/'.$media->path);
            @endphp
            @elseif ($media->type === 'link')
            <!-- Afficher le lien en bleu -->
            <a href="{{ $media->path }}" class="text-blue-500 hover:underline" target="_blank">{{ $media->path }}</a>
            @endif



            @endforeach




            <div class="relative overflow-hidden" id="carousel_{{$loop->iteration}}" data-image-paths="{{ json_encode($imagePaths) }}">
                <div class="flex carousel-scroll">
                    <!-- Affichage de la première image dans le carrousel si elle existe -->
                    @if (!empty($imagePaths))
                    <div class="w-full flex-shrink-0">
                        <img src="{{ $imagePaths[0] }}" alt="Image">
                    </div>
                    @endif
                </div>
                <!-- Boutons de navigation du carrousel -->
                <button class="prevBtn absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Previous</button>
                <button class="nextBtn absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Next</button>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll('[id^="carousel_"]').forEach(function(carousel) {
                        var imagePaths = JSON.parse(carousel.getAttribute('data-image-paths'));
                        var totalSlides = imagePaths.length;
                        var slide = 0;

                        function nextSlide() {
                            slide = (slide + 1) % totalSlides;
                            updateSlide();
                        }

                        function prevSlide() {
                            slide = slide === 0 ? totalSlides - 1 : slide - 1;
                            updateSlide();
                        }

                        function updateSlide() {
                            carousel.querySelector('.flex > div').innerHTML = ''; // Nettoyer le contenu du carrousel
                            var img = document.createElement('img');
                            img.src = imagePaths[slide];
                            img.alt = 'Image';
                            carousel.querySelector('.flex > div').appendChild(img);
                        }

                        carousel.querySelector('.nextBtn').addEventListener('click', nextSlide);
                        carousel.querySelector('.prevBtn').addEventListener('click', prevSlide);
                    });
                });
            </script>

            <div class="flex gap-5 justify-between pr-4 mt-5 w-full text-xs uppercase whitespace-nowrap max-md:flex-wrap max-md:max-w-full">
                <div class="flex gap-5 justify-between items-center">
                    <div class="flex gap-2 justify-center self-stretch">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a862cab91e23dde7f8383a4feffc732259bb623074a83c1ce1feeb962fe83bd8?" class="shrink-0 aspect-[1.08] w-[30px]" />
                        <div class="justify-center py-1 my-auto italic">89</div>
                    </div>
                    <div class="flex gap-2 justify-center self-stretch my-auto">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/83ab785e57fcef036c27ac914090578f07e8d7c2b7eb22be4dc5c78085fa8b81?" class="shrink-0 aspect-square w-[25px]" />
                        <div class="justify-center py-1 my-auto italic">7</div>
                    </div>
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/365c044ff255cea15561a8e999b58b55360e80e822f95d1426492432405b46cd?" class="shrink-0 self-stretch my-auto border-2 border-solid aspect-[0.78] border-zinc-800 stroke-[1.5px] stroke-zinc-800 w-[18px]" />
                </div>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a9171304e9bca410d7d9699c8f0e1a63f9d398580dc7b58582c1c2bccc0ea64a?" class="shrink-0 my-auto w-5 border-2 border-black border-solid aspect-square stroke-[1.5px] stroke-black" />
            </div>
        </div>
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