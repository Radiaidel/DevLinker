document.querySelector('.profileTitle .edit-button').addEventListener('click', function () {
    document.getElementById('editProfileTitleModal').classList.remove('hidden');
});

document.getElementById('cancelEditProfileTitle').addEventListener('click', function () {
    document.getElementById('editProfileTitleModal').classList.add('hidden');
});


const addLanguageButton = document.getElementById('addLanguageButton');

const addLanguageModal = document.getElementById('addLanguageModal');

const cancelAddLanguageButton = document.getElementById('cancelAddLanguage');

function openAddLanguageModal() {
    addLanguageModal.classList.remove('hidden');
}

function closeAddLanguageModal() {
    addLanguageModal.classList.add('hidden');
}

addLanguageButton.addEventListener('click', openAddLanguageModal);

cancelAddLanguageButton.addEventListener('click', closeAddLanguageModal);
const addSkillButton = document.getElementById('addSkillButton');
const addSkillModal = document.getElementById('addSkillModal');
const cancelAddSkill = document.getElementById('cancelAddSkill');

function openAddSkillModal() {
    addSkillModal.classList.remove('hidden');
}

function closeAddSkillModal() {
    addSkillModal.classList.add('hidden');
}

addSkillButton.addEventListener('click', openAddSkillModal);
cancelAddSkill.addEventListener('click', closeAddSkillModal);

function confirmDeleteSkill(skillName) {
    if (confirm("Are you sure you want to delete the skill '" + skillName + "'?")) {
        window.location.href = "{{ route('delete.skill') }}?skill=" + encodeURIComponent(skillName);
    }
}

function submitForm(idForm) {
    document.getElementById(idForm).submit();
}

document.getElementById('editCoverButton').addEventListener('click', function () {
    document.getElementById('coverUploadInput').click();
});

document.getElementById('editImageButton').addEventListener('click', function () {
    document.getElementById('imageUploadInput').click();
});
document.getElementById('addExperienceButton').addEventListener('click', function () {
    document.getElementById('experienceModal').classList.remove('hidden');
});

// Close modal when close button is clicked
document.getElementById('closeModalButton').addEventListener('click', function () {
    document.getElementById('experienceModal').classList.add('hidden');
});

function editExperience(button) {
    var experienceData = JSON.parse(button.getAttribute('data-experience'));


    document.getElementById('editCompanyName').value = experienceData.companyName;
    document.getElementById('editPosition').value = experienceData.position;
    document.getElementById('editLocation').value = experienceData.location;
    document.getElementById('editStartDate').value = experienceData.startDate;
    document.getElementById('editEndDate').value = experienceData.endDate;
    document.getElementById('editAbout').value = experienceData.about;

    document.getElementById('editExperienceModal').classList.remove('hidden');
}

document.getElementById('closeEditModalButton').addEventListener('click', function () {
    document.getElementById('editExperienceModal').classList.add('hidden');
});


function confirmDelete() {
    if (confirm("Are you sure you want to delete this experience?")) {
        document.getElementById("editExperienceForm").action = "{{ route('delete.experience') }}";
        document.getElementById("editExperienceForm").submit();
    }
}

document.getElementById("deleteExperienceButton").addEventListener("click", function () {
    confirmDelete();
});

const addEducationButton = document.getElementById('addEducationButton');

const educationModal = document.getElementById('educationModal');

addEducationButton.addEventListener('click', function () {
    educationModal.classList.remove('hidden');
});
document.getElementById('closeEducationModalButton').addEventListener('click', function () {
    document.getElementById('educationModal').classList.add('hidden');
});

function closeEditEducationModal() {
    document.getElementById('editEducationModal').classList.add('hidden');
}

function editEducation(button) {
    var educationData = JSON.parse(button.getAttribute('data-education'));


    document.getElementById('editInstitution').value = educationData.institution;
    document.getElementById('editFieldOfStudy').value = educationData.fieldOfStudy;
    document.getElementById('editStartDateEdu').value = educationData.startDate;
    document.getElementById('editEndDateEdu').value = educationData.endDate;
    document.getElementById('editDescription').value = educationData.description;

    document.getElementById('editEducationModal').classList.remove('hidden');
}

function confirmDelete() {
    if (confirm("Are you sure you want to delete this education?")) {
        document.getElementById("editEducationForm").submit();
    }
}

function confirmDeleteEducation() {
    if (confirm("Are you sure you want to delete this education?")) {
        document.getElementById("editEducationForm").action = "{{ route('education.delete') }}";
        document.getElementById("editEducationForm").submit();
    }
}

document.getElementById("deleteEducationButton").addEventListener("click", function () {
    confirmDeleteEducation();
});


function confirmDelete(languageKey) {
    if (confirm("Are you sure you want to delete this language?")) {
        document.getElementById("languageToDeleteInput").value = languageKey;
        document.getElementById("deleteLanguageForm").submit();
    }
}

