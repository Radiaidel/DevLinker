@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex flex-col mx-auto pb-6 mt-10 max-w-full bg-white rounded shadow-2xl w-[850px]">
        <div class="relative">
            @if(Auth::user()->profile && Auth::user()->profile->cover_image)

            <img src="{{ asset('storage/profile/' . Auth::user()->profile->cover_image) }}" class="w-full aspect-[4.76] max-md:max-w-full" />
            @else
            <img src="{{ asset('storage/profile/cover_default.jpeg') }}" class="w-full aspect-[4.76] max-md:max-w-full" />
            @endif
            <svg id="editCoverButton" class="absolute top-0 right-0 m-3 w-6 h-6 cursor-pointer text-gray-500 hover:text-gray-700" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#c0c0c0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#c0c0c0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
            <form id="coverForm" action="{{route('update.cover.image')}}" method="POST" enctype="multipart/form-data" style="display: none;">
                @csrf
                <input id="coverUploadInput" name="cover_image" type="file" style="display: none;" onchange="submitForm('coverForm')">
            </form>
        </div>
        <div class="z-10  ml-5 max-w-full w-[786px]">
            <div class="flex gap-5 items-center max-md:flex-col max-md:gap-0">
                <div class="flex flex-col w-[23%] max-md:ml-0 max-md:w-full relative">
                    @if(Auth::user()->profile && Auth::user()->profile->profile_image)
                    <img loading="lazy" src="{{ asset('storage/profile/' . Auth::user()->profile->profile_image) }}" class="shrink-0 max-w-full rounded-full border-white border-solid aspect-square border-[10px] w-[180px] max-md:mt-5" />
                    @else
                    <img loading="lazy" src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 max-w-full rounded-full border-white border-solid aspect-square border-[10px] w-[180px] max-md:mt-5" />
                    @endif
                    <div class="absolute top-0 rounded-full  left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <svg id="editImageButton" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>

                        </svg>
                    </div>
                    <form id="imageForm" action="{{route('update.profile.image')}}" method="POST" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <input id="imageUploadInput" name="profile_image" type="file" style="display: none;" onchange="submitForm('imageForm')">
                    </form>
                </div>


                <div class="flex flex-col ml-5 mt-2 w-[77%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col  max-md:mt-10 max-md:max-w-full">
                        <div class="flex gap-5 justify-between items-start w-full text-neutral-900 max-md:flex-wrap max-md:max-w-full">
                            <div class="flex flex-col">
                                <div class="text-lg ">{{Auth::user()->name}}</div>
                                @if(Auth::user()->profile && Auth::user()->profile->title)
                                <div class=" group mt-2 text-sm leading-5 hover:text-sky-800 profileTitle flex gap-6 justify-between">
                                    <div>
                                        {{ Auth::user()->profile->title }}

                                    </div>
                                    <button class="  hidden edit-button group-hover:block ml-6">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" />
                                        </svg>
                                    </button>
                                </div>
                                @else

                                <div class=" group mt-2 text-sm leading-5 hover:text-sky-800 profileTitle flex gap-6 justify-between">
                                    <div>

                                        Profile Title Not Set
                                    </div>
                                    <button class="  hidden edit-button group-hover:block ml-6">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                            <path d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @endif

                        </div>

                    </div>

                    <div class="flex gap-4 self-start mt-8 text-xs text-center uppercase">
                        <div class="justify-center px-11 py-3 text-white bg-sky-800 rounded max-md:px-5">
                            Contact info
                        </div>
                        <div class="justify-center px-7 py-3 text-sky-800 bg-white rounded border border-sky-800 border-solid max-md:px-5">
                            1,043 connections
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex mx-auto flex-col px-8 py-9 mt-4 max-w-full bg-white rounded shadow-2xl text-neutral-900 w-[850px] max-md:px-5">
    <div class="text-lg max-md:max-w-full">About</div>
    @if(Auth::user()->profile && Auth::user()->profile->about)
    <div class="relative group mt-5 text-sm leading-5 max-md:max-w-full hover:text-sky-800 aboutSection">
        {{ Auth::user()->profile->about }}
        <button class="absolute top-0 right-0 hidden edit-button group-hover:block editAboutButton">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" />
            </svg>
        </button>
    </div>
    @else
    <div class="relative group mt-5 text-sm leading-5 max-md:max-w-full hover:sky-800 aboutSection">
        About section not filled out.
        <button class="absolute top-0 right-0 hidden edit-button group-hover:block editAboutButton">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" />
            </svg>
        </button>
    </div>

    @endif
</div>




<div class="flex mx-auto flex-col px-8 py-8 mt-4 bg-white rounded shadow-2xl max-w-[850px] max-md:px-5">
    <div class="flex gap-5 justify-between self-start text-lg">
        <div class="text-neutral-900">Projects</div>
    </div>
    @if(Auth::user()->profile->projects && Auth::user()->profile->projects->count() > 0)

    <div class="mt-6 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            @foreach(Auth::user()->profile->projects as $project)
            <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow leading-[150%] text-neutral-900 max-md:mt-5">
                    <img loading="lazy" src="{{ $project->image }}" class="w-full aspect-[1.56]" />
                    <div class="mt-5 text-sm">{{ $project->name }}</div>
                    <div class="mt-3 text-xs">{{ $project->type }}, {{ $project->date }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-7 text-xs text-sky-800 uppercase max-md:max-w-full">
        Show all ({{ Auth::user()->profile->projects->count() }})
    </div>
    @else
    <div class="mt-6 max-md:max-w-full">
        <div class="text-sm text-neutral-900">No projects available.</div>
    </div>
    @endif
</div>

<div class="flex mx-auto flex-col px-8 py-8 mt-4 max-w-full text-xs leading-4 bg-white rounded shadow-2xl w-[850px] max-md:px-5">
    <div class="flex justify-between items-center">
        <div class="text-lg text-neutral-900 max-md:max-w-full">Experience</div>

        <div>
            <svg id="addExperienceButton" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </div>

    </div>

    @php
    $experiences = Auth::user()->profile->experience ?? [];

    usort($experiences, function($b, $a) {
    return strtotime($a['startDate']) - strtotime($b['startDate']);
    });
    @endphp

    @foreach($experiences as $experience)
    <div class="relative flex group gap-4 items-start mt-6 max-md:flex-wrap">
        @if(isset($experience['companyImage']))
        <img loading="lazy" src="{{ asset('storage/' . $experience['companyImage']) }}" class="shrink-0 aspect-square w-[54px]" />
        @else
        <div class="shrink-0 aspect-square w-[54px] bg-gray-200"></div>
        @endif
        <div class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full">
            <div class="text-sm text-neutral-900 max-md:max-w-full">
                {{ $experience['position'] }}
            </div>
            <div class="flex gap-3.5 self-start mt-4 whitespace-nowrap text-neutral-900">
                <div>{{ $experience['companyName'] }}</div>
                <div>{{ $experience['location'] }}</div>
            </div>
            <div class="flex gap-3.5 self-start mt-3">
                <div class="grow text-neutral-900">{{ $experience['startDate'] }} — {{ isset($experience['endDate']) ? $experience['endDate'] : 'Present' }}</div>
                @php
                $startDate = new DateTime($experience['startDate']);
                $endDate = isset($experience['endDate']) ? new DateTime($experience['endDate']) : new DateTime();
                $interval = $startDate->diff($endDate);
                $months = $interval->format('%m') + ($interval->format('%y') * 12);
                @endphp
                <div class="text-sky-800">{{ $months }} month</div>
            </div>
            <div class="mt-4 text-neutral-900 max-md:max-w-full">
                {{ $experience['about'] }}
            </div>
        </div>
        <div class="absolute top-0 right-0 hidden group-hover:block">
            <button class="text-sm text-sky-800 hover:text-indigo-800" onclick="editExperience(this)" data-experience='{"companyName": "{{ $experience['companyName'] }}", "position": "{{ $experience['position'] }}", "location": "{{ $experience['location'] }}", "startDate": "{{ $experience['startDate'] }}", "endDate": "{{ isset($experience['endDate']) ? $experience['endDate'] : 'Present' }}", "about": "{{ $experience['about'] }}"}'>Edit</button>
        </div>

    </div>
    <div class="shrink-0 mt-7 h-px border border-solid bg-zinc-100 border-zinc-100 max-md:max-w-full"></div>
    @endforeach

</div>


<div class="flex mx-auto flex-col px-8 py-8 mt-4 max-w-full text-xs leading-4 bg-white rounded shadow-2xl w-[850px] max-md:px-5">
    <div class="flex justify-between items-center">
        <div class="text-lg text-neutral-900 max-md:max-w-full">Education</div>

        <div>
            <svg id="addEducationButton" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </div>
    </div>

    @php
    $educations = Auth::user()->profile->education ?? [];
    @endphp
    @foreach($educations as $education)
    <div class="relative flex group gap-4 items-start mt-7 text-xs leading-4 max-md:flex-wrap">
        @if(isset($education['schoolImage']))
        <img loading="lazy" src="{{ asset('storage/' . $education['schoolImage']) }}" class="shrink-0 aspect-square w-[54px]" />
        @else
        <div class="shrink-0 aspect-square w-[54px] bg-gray-200"></div>
        @endif
        <div class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full">
            <div class="text-sm max-md:max-w-full">
                {{ $education['institution'] }}
            </div>
            <div class="mt-4 max-md:max-w-full">
                {{ $education['fieldOfStudy'] }}
            </div>
            <div class="mt-3 max-md:max-w-full">
                {{ $education['startDate'] }} — {{ isset($education['endDate']) ? $education['endDate'] : 'Present' }}
            </div>
            <div class="mt-4 max-md:max-w-full">
                {{ $education['description'] }}
            </div>
        </div>
        <div class="absolute top-0 right-0 hidden group-hover:block">
            <button class="text-sm text-sky-800 hover:text-indigo-800" onclick="editEducation(this)" data-education='{"institution": "{{ $education['institution'] }}", "fieldOfStudy": "{{ $education['fieldOfStudy'] }}", "startDate": "{{ $education['startDate'] }}", "endDate": "{{ isset($education['endDate']) ? $education['endDate'] : 'Present' }}", "description": "{{ $education['description'] }}"}'>Edit</button>
        </div>

    </div>
    <div class="shrink-0 mt-7 h-px border border-solid bg-zinc-100 border-zinc-100 max-md:max-w-full"></div>
    @endforeach
</div>




<div class="flex mx-auto flex-col px-8 py-8 mt-4 max-w-full text-xs leading-4 bg-white rounded shadow-2xl w-[850px] max-md:px-5">
    <div class="flex justify-between items-center">
        <div class="text-lg text-neutral-900 max-md:max-w-full">Skills</div>

        <div>
            <svg id="addSkillButton" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </div>
    </div>
    @php
    $skills = Auth::user()->profile->skills ?? [];
    @endphp
    <div class="flex flex-wrap mt-4">
        @foreach($skills as $skill)
        <div class="bg-sky-800 hover:bg-sky-700 text-white px-4 py-2 rounded-full mr-2 mb-2 shadow-md cursor-pointer" onclick="confirmDeleteSkill('{{ $skill }}')">{{ $skill }}</div>
        @endforeach
    </div>
</div>




<div class="flex mx-auto  flex-col px-8 py-8 mt-4 max-w-full bg-white rounded shadow-2xl w-[850px] max-md:px-5">
    <div class="flex justify-between items-center">
        <div class="text-lg text-neutral-900 max-md:max-w-full">Languages</div>

        <div>
            <svg id="addLanguageButton" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </div>
    </div>
    @php
    $languages = Auth::user()->profile->languages ?? [];
    @endphp
    <div class="p mt-4">
        @foreach($languages as $language => $level)
        <button class="text-neutral-900  mr-2 mb-2 flex items-center" onclick="confirmDelete('{{ $language }}')">
            <span class="mr-2">{{ $language }} : </span>
            <span class="text-xs text-white bg-gray-500 px-2 py-1 rounded">{{ $level }}</span>
        </button>
        @endforeach
    </div>
    <form id="deleteLanguageForm" method="POST" action="{{ route('language.delete') }}">
        @csrf
        <input type="hidden" name="languageKey" id="languageToDeleteInput" value="">

    </form>


    @include('profile.modals.profile-about')
    @include('profile.modals.profile-add-education')
    @include('profile.modals.profile-add-experience')
    @include('profile.modals.profile-add-language')
    @include('profile.modals.profile-add-skill')
    @include('profile.modals.profile-title')
    @include('profile.modals.profile-update-education')
    @include('profile.modals.profile-update-experience')


    <script src="js/profile_script.js"></script>
    @endsection