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
            $mediaData = [];

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



            @elseif ($media->type === 'link')
            <!-- Afficher le lien en bleu -->
            <a href="{{ $media->path }}" class="text-blue-500 hover:underline" target="_blank">{{ $media->path }}</a>






            @elseif ($media->type === 'image')
            @php
            $mediaData[] = [
            'type' => 'image',
            'path' => asset('storage/images/'.$media->path)
            ];
            @endphp
            @elseif ($media->type === 'video')
            @php
            $mediaData[] = [
            'type' => 'video',
            'path' => asset('storage/videos/'.$media->path)
            ];
            @endphp

            @endif



            @endforeach




            <div class="relative overflow-hidden" id="carousel_{{$loop->iteration}}" data-media="{{ json_encode($mediaData) }}">
                <div class="flex carousel-scroll">
                    <!-- Affichage de la première image ou vidéo dans le carrousel -->
                    @foreach($mediaData as $media)
                    @if ($media['type'] === 'image')
                    <div class="w-full flex-shrink-0">
                        <img src="{{ $media['path'] }}" alt="Image">
                    </div>
                    @elseif ($media['type'] === 'video')
                    <div class="w-full flex-shrink-0">
                        <video controls>
                            <source src="{{ $media['path'] }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- Boutons de navigation du carrousel -->
                @if (count($mediaData) > 1)
                <button class="prevBtn absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Previous</button>
                <button class="nextBtn absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Next</button>
                @endif
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll('[id^="carousel_"]').forEach(function(carousel) {
                        var mediaData = JSON.parse(carousel.getAttribute('data-media'));
                        var totalMedia = mediaData.length;
                        var currentMediaIndex = 0;

                        function nextMedia() {
                            currentMediaIndex = (currentMediaIndex + 1) % totalMedia;
                            updateMedia();
                        }

                        function prevMedia() {
                            currentMediaIndex = currentMediaIndex === 0 ? totalMedia - 1 : currentMediaIndex - 1;
                            updateMedia();
                        }

                        function updateMedia() {
                            var flexContainer = carousel.querySelector('.flex');
                            flexContainer.innerHTML = ''; // Nettoyer le contenu du carrousel
                            if (totalMedia > 0) {
                                var currentMedia = mediaData[currentMediaIndex];
                                if (currentMedia['type'] === 'image') {
                                    var img = document.createElement('img');
                                    img.src = currentMedia['path'];
                                    img.alt = 'Image';
                                    flexContainer.appendChild(img);
                                } else if (currentMedia['type'] === 'video') {
                                    var video = document.createElement('video');
                                    video.controls = true;
                                    var source = document.createElement('source');
                                    source.src = currentMedia['path'];
                                    source.type = 'video/mp4';
                                    video.appendChild(source);
                                    flexContainer.appendChild(video);
                                }
                            }
                        }

                        if (totalMedia > 1) { // Vérifier s'il y a plus d'un média dans le carrousel
                            carousel.querySelector('.nextBtn').addEventListener('click', nextMedia);
                            carousel.querySelector('.prevBtn').addEventListener('click', prevMedia);
                        }
                    });
                });
            </script>

            <div class="flex gap-5 justify-between pr-4 mt-5 w-full text-xs uppercase whitespace-nowrap max-md:flex-wrap max-md:max-w-full">
                <div class="flex gap-5 justify-between items-center">
                    <div class="flex gap-2 justify-center self-stretch">
                        <div id="like">
                            <svg width="27px" height="27px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <path d="M8.96173 18.9109L9.42605 18.3219L8.96173 18.9109ZM12 5.50063L11.4596 6.02073C11.601 6.16763 11.7961 6.25063 12 6.25063C12.2039 6.25063 12.399 6.16763 12.5404 6.02073L12 5.50063ZM15.0383 18.9109L15.5026 19.4999L15.0383 18.9109ZM9.42605 18.3219C7.91039 17.1271 6.25307 15.9603 4.93829 14.4798C3.64922 13.0282 2.75 11.3345 2.75 9.1371H1.25C1.25 11.8026 2.3605 13.8361 3.81672 15.4758C5.24723 17.0866 7.07077 18.3752 8.49742 19.4999L9.42605 18.3219ZM2.75 9.1371C2.75 6.98623 3.96537 5.18252 5.62436 4.42419C7.23607 3.68748 9.40166 3.88258 11.4596 6.02073L12.5404 4.98053C10.0985 2.44352 7.26409 2.02539 5.00076 3.05996C2.78471 4.07292 1.25 6.42503 1.25 9.1371H2.75ZM8.49742 19.4999C9.00965 19.9037 9.55954 20.3343 10.1168 20.6599C10.6739 20.9854 11.3096 21.25 12 21.25V19.75C11.6904 19.75 11.3261 19.6293 10.8736 19.3648C10.4213 19.1005 9.95208 18.7366 9.42605 18.3219L8.49742 19.4999ZM15.5026 19.4999C16.9292 18.3752 18.7528 17.0866 20.1833 15.4758C21.6395 13.8361 22.75 11.8026 22.75 9.1371H21.25C21.25 11.3345 20.3508 13.0282 19.0617 14.4798C17.7469 15.9603 16.0896 17.1271 14.574 18.3219L15.5026 19.4999ZM22.75 9.1371C22.75 6.42503 21.2153 4.07292 18.9992 3.05996C16.7359 2.02539 13.9015 2.44352 11.4596 4.98053L12.5404 6.02073C14.5983 3.88258 16.7639 3.68748 18.3756 4.42419C20.0346 5.18252 21.25 6.98623 21.25 9.1371H22.75ZM14.574 18.3219C14.0479 18.7366 13.5787 19.1005 13.1264 19.3648C12.6739 19.6293 12.3096 19.75 12 19.75V21.25C12.6904 21.25 13.3261 20.9854 13.8832 20.6599C14.4405 20.3343 14.9903 19.9037 15.5026 19.4999L14.574 18.3219Z" fill="#082f49" />
                                </g>

                            </svg>
                        </div>
                        <div class="justify-center py-1 my-auto italic">89</div>
                    </div>
                    <div class="flex gap-2 justify-center self-stretch my-auto">
                        <div id="comment">
                            <svg width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <title>comment-1</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                        <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-100.000000, -255.000000)" fill="#082f49">
                                            <path d="M116,281 C114.832,281 113.704,280.864 112.62,280.633 L107.912,283.463 L107.975,278.824 C104.366,276.654 102,273.066 102,269 C102,262.373 108.268,257 116,257 C123.732,257 130,262.373 130,269 C130,275.628 123.732,281 116,281 L116,281 Z M116,255 C107.164,255 100,261.269 100,269 C100,273.419 102.345,277.354 106,279.919 L106,287 L113.009,282.747 C113.979,282.907 114.977,283 116,283 C124.836,283 132,276.732 132,269 C132,261.269 124.836,255 116,255 L116,255 Z" id="comment-1" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>

                            </svg>
                        </div>
                        <div class="justify-center py-1 my-auto italic">7</div>
                    </div>
                    <div id="save">
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 4C4 2.34315 5.34315 1 7 1H17C18.6569 1 20 2.34315 20 4V20.9425C20 22.6114 18.0766 23.5462 16.7644 22.5152L12 18.7717L7.23564 22.5152C5.92338 23.5462 4 22.6114 4 20.9425V4ZM7 3C6.44772 3 6 3.44772 6 4V20.9425L12 16.2283L18 20.9425V4C18 3.44772 17.5523 3 17 3H7Z" fill="#082f49" />
                            </g>

                        </svg>
                    </div>


                </div>
                <div id="share" class="flex gap-3">
        <p class="copiedText hidden text-xs text-gray-400 p-1">Copied !!</p>
        <svg onclick="CopyLink('{{ $project->id }}', event)" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.803 5.33333C13.803 3.49238 15.3022 2 17.1515 2C19.0008 2 20.5 3.49238 20.5 5.33333C20.5 7.17428 19.0008 8.66667 17.1515 8.66667C16.2177 8.66667 15.3738 8.28596 14.7671 7.67347L10.1317 10.8295C10.1745 11.0425 10.197 11.2625 10.197 11.4872C10.197 11.9322 10.109 12.3576 9.94959 12.7464L15.0323 16.0858C15.6092 15.6161 16.3473 15.3333 17.1515 15.3333C19.0008 15.3333 20.5 16.8257 20.5 18.6667C20.5 20.5076 19.0008 22 17.1515 22C15.3022 22 13.803 20.5076 13.803 18.6667C13.803 18.1845 13.9062 17.7255 14.0917 17.3111L9.05007 13.9987C8.46196 14.5098 7.6916 14.8205 6.84848 14.8205C4.99917 14.8205 3.5 13.3281 3.5 11.4872C3.5 9.64623 4.99917 8.15385 6.84848 8.15385C7.9119 8.15385 8.85853 8.64725 9.47145 9.41518L13.9639 6.35642C13.8594 6.03359 13.803 5.6896 13.803 5.33333Z" fill="#082f49" />
            </g>
        </svg>
    </div>
                <script>
    function CopyLink(projectId, event) {
        var encryptedProjectId = btoa(projectId); 
        var projectLink = window.location.origin + '/projects/' + encryptedProjectId; // URL originale + slug du projet
        navigator.clipboard.writeText(projectLink);
        
        // Récupérer l'élément .copiedText associé à l'icône SVG cliqué
        var copiedTextElement = event.target.parentNode.querySelector('.copiedText');

        // Afficher l'élément .copiedText
        copiedTextElement.classList.remove("hidden");

        // Masquer l'élément après 2 secondes
        setTimeout(function() {
            copiedTextElement.classList.add("hidden");
        }, 1000); // Masquer le message après 2 secondes
    }
</script>



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