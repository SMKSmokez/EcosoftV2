const languageSelector = document.querySelector('.language-selector');
const languageDropdown = document.querySelector('.language-dropdown');
const languageSelectorImg = languageSelector.querySelector('img');
const languageOptions = document.querySelectorAll('.language-option');

// Map of language codes to flag icons (must match PHP $flagIcons)
const flagIcons = {
    'en': 'Images/Icons/en.svg',
    'al': 'Images/Icons/al.svg',
    'me': 'Images/Icons/me.svg'
};

// Toggle dropdown on click
languageSelector.addEventListener('click', (e) => {
    e.stopPropagation();
    languageDropdown.classList.toggle('active');
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!languageSelector.contains(e.target) && !languageDropdown.contains(e.target)) {
        languageDropdown.classList.remove('active');
    }
});

// Update selector icon and close dropdown when a language is selected
languageOptions.forEach(option => {
    option.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedLang = option.getAttribute('data-lang');
        const selectedFlag = flagIcons[selectedLang];

        // Update the selector's flag icon
        if (selectedFlag) {
            languageSelectorImg.src = selectedFlag;
            languageSelectorImg.alt = `${selectedLang.charAt(0).toUpperCase() + selectedLang.slice(1)} Flag`;
        }

        // Close the dropdown
        languageDropdown.classList.remove('active');

        // Update the URL with the new language
        window.location.href = `?lang=${selectedLang}`;
    });
});