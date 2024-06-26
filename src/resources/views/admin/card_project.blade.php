    <script src="{{ asset('js/project_script.js') }}" defer></script>


    <div class="grid gap-4">
        <div class="flex flex-col h-auto px-8 py-6 mt-10 w-full bg-white rounded-3xl shadow-lg text-neutral-900 max-md:px-5 max-md:max-w-full">


            <div class="flex justify-between items-center {{$project->trashed()? 'bg-gray-200  border-gray-400 text-gray-800' : 'bg-red-200  border-red-400 text-red-800'}}  border  px-4 py-2 rounded-md mb-4">
                @if ($project->trashed())
                <div>
                    <p class="font-semibold">This project has been reported</p>

                </div>
                <form action="{{ route('projects.softDelete', $project->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="projectId" value="{{ $project->id }}">
                    <button type="submit">
                      
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.52185 7H7C7.55229 7 8 7.44772 8 8C8 8.55229 7.55228 9 7 9H3C1.89543 9 1 8.10457 1 7V3C1 2.44772 1.44772 2 2 2C2.55228 2 3 2.44772 3 3V5.6754C4.26953 3.8688 6.06062 2.47676 8.14852 1.69631C10.6633 0.756291 13.435 0.768419 15.9415 1.73041C18.448 2.69239 20.5161 4.53782 21.7562 6.91897C22.9963 9.30013 23.3228 12.0526 22.6741 14.6578C22.0254 17.263 20.4464 19.541 18.2345 21.0626C16.0226 22.5842 13.3306 23.2444 10.6657 22.9188C8.00083 22.5931 5.54702 21.3041 3.76664 19.2946C2.20818 17.5356 1.25993 15.3309 1.04625 13.0078C0.995657 12.4579 1.45216 12.0088 2.00445 12.0084C2.55673 12.0079 3.00351 12.4566 3.06526 13.0055C3.27138 14.8374 4.03712 16.5706 5.27027 17.9625C6.7255 19.605 8.73118 20.6586 10.9094 20.9247C13.0876 21.1909 15.288 20.6513 17.0959 19.4075C18.9039 18.1638 20.1945 16.3018 20.7247 14.1724C21.2549 12.043 20.9881 9.79319 19.9745 7.8469C18.9608 5.90061 17.2704 4.3922 15.2217 3.6059C13.173 2.8196 10.9074 2.80968 8.8519 3.57803C7.11008 4.22911 5.62099 5.40094 4.57993 6.92229C4.56156 6.94914 4.54217 6.97505 4.52185 7Z" fill="#595959" />
                        </svg>
                    </button>
                </form>
                @else
                <!-- Informations sur le dernier rapport et le nombre total de rapports -->
                <p class="font-semibold">{{ $project->last_reporter }} and
                    @php
                    $otherReportsCount = max($project->reports->count() - 1, 0);
                    @endphp
                    @if($otherReportsCount > 0)
                    {{ $otherReportsCount }} other {{ $otherReportsCount === 1 ? 'person' : 'people' }} reported this project
                    @endif
                </p>
                <form action="{{ route('projects.softDelete', $project->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="projectId" value="{{ $project->id }}">
                    <button type="submit">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.364 5.63604C19.9926 7.26472 21 9.51472 21 12C21 16.9706 16.9706 21 12 21C9.51472 21 7.26472 19.9926 5.63604 18.364M18.364 5.63604C16.7353 4.00736 14.4853 3 12 3C7.02944 3 3 7.02944 3 12C3 14.4853 4.00736 16.7353 5.63604 18.364M18.364 5.63604L5.63604 18.364" stroke="#b91c1c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                       
                    </button>
                </form>
                @endif


            </div>
            <div class="flex gap-5 justify-between items-center w-full max-md:flex-wrap max-md:mr-1.5 max-md:max-w-full">
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
                <div class="relative  gap-5 justify-between text-xs max-md:flex cursor-pointer">
                    <svg onclick="toggleDropdownProject(event)" fill="#000000" width="25px" height="25px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">

                            <path d="M13,16c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,14.346,13,16z" id="XMLID_294_" />

                            <path d="M13,26c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,24.346,13,26z" id="XMLID_295_" />

                            <path d="M13,6c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,4.346,13,6z" id="XMLID_297_" />

                        </g>

                    </svg>


                    <div id="Drop_project_menu" class="text-md absolute right-0 mt-1 w-40 bg-white border border-gray-200 rounded shadow-lg z-10 hidden">
                        <a onclick="openLikesPopup('{{$project->id}}')" class="block px-5 py-3 text-gray-800 hover:bg-gray-200">See Likes</a>
                        <a href="{{ route('profile.show', ['user' => $project->user]) }}" class="block px-5 py-3 text-gray-800 hover:bg-gray-200">View User Profile</a>
                    </div>
                </div>






                <!-- pop up like -->
                <div id="likesPopup" class="z-20 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
                    <div class="bg-white rounded-lg p-8 w-[40%] relative">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Likes (<span id="likesCount">0</span>)</h2>
                            <button onclick="closeLikesPopup()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <ul id="likesList">
                            <!-- Likes will be dynamically inserted here -->
                        </ul>
                    </div>
                </div>

            </div>
            <div class="mt-5 mb-2 text-lg leading-5 max-md:max-w-full "> <strong>{{$project->title}}</strong> </div>
            <div class="text-sm max-h-24 mb-4 overflow-hidden leading-6 max-md:max-w-full" id="description_{{$project->id}}">
                {{$project->description}}
            </div>
            @if(strlen($project->description) > 120)
            <button class="toggleDescriptionBtn text-sm text-blue-500 cursor-pointer">...lire la suite</button>
            @endif




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




            <div class="relative overflow-hidden" id="carousel_{{$project->id}}" data-media="{{ json_encode($mediaData) }}">
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
                <button class="prevBtn absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-md">
                    <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="XMLID_287_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve" transform="rotate(180)">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <g id="next">
                                <g>
                                    <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 " />
                                </g>
                            </g>
                        </g>

                    </svg></button>
                <button class="nextBtn absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-md">

                    <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="XMLID_287_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" xml:space="preserve">

                        <g id="SVGRepo_bgCarrier" stroke-width="1" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <g id="next">
                                <g>
                                    <polygon points="6.8,23.7 5.4,22.3 15.7,12 5.4,1.7 6.8,0.3 18.5,12 " />
                                </g>
                            </g>
                        </g>

                    </svg>
                </button>
                @endif
            </div>


            <div class="flex gap-5 justify-between pr-4 mt-5 w-full text-xs uppercase whitespace-nowrap max-md:flex-wrap max-md:max-w-full">
                <div class="flex gap-5 justify-between items-center">
                    <div class="flex gap-2 justify-center self-stretch">
                        <div id="like">
                            <svg onclick="toggleColors(this , '{{ $project->id }}')" id="likeIcon" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="{{ $project->isLikedBy(auth()->user()) ? '#ff0000' : '#000000' }}">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <path id="heartPath" d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="{{ $project->isLikedBy(auth()->user()) ? '#ff0000' : '#ffffff' }}" />
                                </g>
                            </svg>
                        </div>
                        <div class="justify-center py-1 my-auto like-count">{{$project->likes()->count()}}</div>
                    </div>





                    <div class="flex gap-2 justify-center self-stretch my-auto">
                        <a href="{{ route('project.comments', $project->id) }}">
                            <svg width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="red">
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
                        </a>
                        <div class="justify-center py-1 my-auto italic">{{$project->comments()->count()}}</div>
                    </div>
                    <div id="save">


                        <svg onclick="toggleSave(this, '{{ $project->id }}')" id="saveIcon" fill="{{ $project->isSavedBy(auth()->user()) ? '#000000' : '#ffffff' }}" width="25px" height="25px" viewBox="0 0 56.00 56.00" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.001">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="5.5">

                                <path d="M 12.0156 53.1602 C 13.2344 53.1602 13.8672 52.4805 16.3047 50.1836 L 26.8516 40.0586 C 27.3906 39.5664 27.6719 39.4258 28 39.4258 C 28.3281 39.4258 28.6563 39.5898 29.1484 40.0586 L 41.1250 51.5898 C 42.0625 52.4805 42.7890 53.1602 43.9844 53.1602 C 45.4609 53.1602 46.5859 52.2696 46.5859 50.1367 L 46.5859 10.1758 C 46.5859 5.3008 44.1719 2.8398 39.3203 2.8398 L 16.6797 2.8398 C 11.8516 2.8398 9.4141 5.3008 9.4141 10.1758 L 9.4141 50.1367 C 9.4141 52.2696 10.5625 53.1602 12.0156 53.1602 Z" />

                            </g>

                            <g id="SVGRepo_iconCarrier">

                                <path d="M 12.0156 53.1602 C 13.2344 53.1602 13.8672 52.4805 16.3047 50.1836 L 26.8516 40.0586 C 27.3906 39.5664 27.6719 39.4258 28 39.4258 C 28.3281 39.4258 28.6563 39.5898 29.1484 40.0586 L 41.1250 51.5898 C 42.0625 52.4805 42.7890 53.1602 43.9844 53.1602 C 45.4609 53.1602 46.5859 52.2696 46.5859 50.1367 L 46.5859 10.1758 C 46.5859 5.3008 44.1719 2.8398 39.3203 2.8398 L 16.6797 2.8398 C 11.8516 2.8398 9.4141 5.3008 9.4141 10.1758 L 9.4141 50.1367 C 9.4141 52.2696 10.5625 53.1602 12.0156 53.1602 Z" />

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

            </div>
        </div>
    </div>