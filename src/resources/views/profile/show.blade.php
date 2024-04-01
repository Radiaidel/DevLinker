@extends('layouts.app')

@section('content')
<div class="">
    <div class="flex flex-col mx-auto pb-6 mt-10 max-w-full bg-white rounded shadow-2xl w-[850px]">
        <div class="relative">
            @if(Auth::user()->profile && Auth::user()->profile->cover_image)

            <img src="{{ asset('storage/profile/' . Auth::user()->profile->cover_image) }}" class="w-full aspect-[4.76] max-md:max-w-full" />
            @else
            <img src="{{ asset('storage/profile/cover_default.jpeg') }}" class="w-full aspect-[4.76] max-md:max-w-full  " />
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
                                <div class="mt-2 text-sm leading-5">{{ Auth::user()->profile->title }}</div>
                                @else
                                <div class="mt-2 text-sm leading-5">Profile Title Not Set</div>
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
        <div class="mt-5 text-sm leading-5 max-md:max-w-full">
            {{ Auth::user()->profile->about }}
        </div>
        @else
        <div class="mt-5 text-sm leading-5 max-md:max-w-full">
            About section not filled out.
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
            <div id="experienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center block">
                    <!-- Overlay -->
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- Modal -->
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <!-- Close button -->
                        <button id="closeModalButton" class="absolute top-0 right-0 m-4 p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">&times;</button>

                        <!-- Form for adding experience -->
                        <form action="{{ route('add.experience') }}" method="POST" enctype="multipart/form-data" class="w-full px-6 py-4 mt-6">
                            @csrf
                            <div class="mb-4">
                                <label for="companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                                <input type="text" id="companyName" name="companyName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <input type="text" id="position" name="position" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" id="location" name="location" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                                    <input type="date" id="startDate" name="startDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="date" id="endDate" name="endDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                <textarea id="about" name="about" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="companyImage" class="block text-sm font-medium text-gray-700">Company Image</label>
                                <input type="file" id="companyImage" name="companyImage" accept="image/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Add Experience</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>

        @php
        // Récupérer les expériences de l'utilisateur
        $experiences = Auth::user()->profile->experience ?? [];

        // Trier les expériences par date de début
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
            <div class="absolute top-0 right-0 hidden group-hover:block" >
            <button class="text-sm text-indigo-600 hover:text-indigo-800" onclick="editExperience(this)" data-experience='{"companyName": "{{ $experience['companyName'] }}", "position": "{{ $experience['position'] }}", "location": "{{ $experience['location'] }}", "startDate": "{{ $experience['startDate'] }}", "endDate": "{{ isset($experience['endDate']) ? $experience['endDate'] : 'Present' }}", "about": "{{ $experience['about'] }}"}'>Edit</button></div>




        </div>
        <div class="shrink-0 mt-7 h-px border border-solid bg-zinc-100 border-zinc-100 max-md:max-w-full"></div>
        @endforeach

    </div>
    <div id="editExperienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center block">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Close button -->
                <button id="closeEditModalButton" class="absolute top-0 right-0 m-4 p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">&times;</button>

                <!-- Form for editing experience -->
                <form id="editExperienceForm" action="{{route('update.experience')}}" method="POST" enctype="multipart/form-data" class="w-full px-6 py-4 mt-6">
                    @csrf
                    <!-- Hidden input for experience ID -->
                    <input type="hidden" id="editExperiencedate" name="editExperiencedate">
                    <div class="mb-4">
                        <label for="editCompanyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" id="editCompanyName" name="editCompanyName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="editPosition" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" id="editPosition" name="editPosition" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="editLocation" class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" id="editLocation" name="editLocation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="editStartDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" id="editStartDate" name="editStartDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="editEndDate" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" id="editEndDate" name="editEndDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="editAbout" class="block text-sm font-medium text-gray-700">About</label>
                        <textarea id="editAbout" name="editAbout" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="editCompanyImage" class="block text-sm font-medium text-gray-700">Company Image</label>
                        <input type="file" id="editCompanyImage" name="editCompanyImage" accept="image/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="flex justify-end">
                        <button id="updateExperienceButton" type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Update Experience</button>
                        <button id="deleteExperienceButton" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Delete Experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex mx-auto flex-col px-8 py-8 mt-4 max-w-full text-xs leading-4 bg-white rounded shadow-2xl w-[850px] max-md:px-5">
        <div class="flex justify-between items-center">
            <div class="text-lg text-neutral-900 max-md:max-w-full">Education</div>

            <div>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>

                </svg>
            </div>
        </div>

        <div class="flex gap-4 items-start mt-7 text-xs leading-4 max-md:flex-wrap">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc95d00301bd3f7c1fd639ffb81c6d303123aac23ec8e96df9204990be6bb776?" class="shrink-0 aspect-square w-[54px]" />
            <div class="flex flex-col grow shrink-0 basis-0 w-fit max-md:max-w-full">
                <div class="text-sm max-md:max-w-full">
                    Moscow State Linguistic University
                </div>
                <div class="mt-4 max-md:max-w-full">
                    Bachelor's degree Field Of StudyComputer and Information Systems
                    Security/Information Assurance
                </div>
                <div class="mt-3 max-md:max-w-full">2013 — 2017</div>
                <div class="mt-4 max-md:max-w-full">
                    Additional English classes and UX profile courses​.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submitForm(idForm) {
        document.getElementById(idForm).submit();
    }

    document.getElementById('editCoverButton').addEventListener('click', function() {
        document.getElementById('coverUploadInput').click();
    });

    document.getElementById('editImageButton').addEventListener('click', function() {
        document.getElementById('imageUploadInput').click();
    });
    document.getElementById('addExperienceButton').addEventListener('click', function() {
        document.getElementById('experienceModal').classList.remove('hidden');
    });

    // Close modal when close button is clicked
    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('experienceModal').classList.add('hidden');
    });

    function editExperience(button) {
        // Récupérer les données de l'expérience à partir de l'attribut data-experience du bouton
        var experienceData = JSON.parse(button.getAttribute('data-experience'));

        // Remplir les champs du formulaire d'édition avec les données de l'expérience
        document.getElementById('editExperiencedate').value = experienceData.startDate;

        document.getElementById('editCompanyName').value = experienceData.companyName;
        document.getElementById('editPosition').value = experienceData.position;
        document.getElementById('editLocation').value = experienceData.location;
        document.getElementById('editStartDate').value = experienceData.startDate;
        document.getElementById('editEndDate').value = experienceData.endDate;
        document.getElementById('editAbout').value = experienceData.about;

        // Afficher le modal d'édition
        document.getElementById('editExperienceModal').classList.remove('hidden');
    }

    // Function to close edit modal
    document.getElementById('closeEditModalButton').addEventListener('click', function() {
        document.getElementById('editExperienceModal').classList.add('hidden');
    });
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this experience?")) {
            // Si l'utilisateur confirme, soumettre le formulaire de suppression
            document.getElementById("editExperienceForm").action = "{{ route('delete.experience') }}"; // Définir l'action de suppression
            document.getElementById("editExperienceForm").submit();
        }
    }

    // Attacher un événement au bouton de suppression
    document.getElementById("deleteExperienceButton").addEventListener("click", function() {
        confirmDelete();
    });
</script>

@endsection