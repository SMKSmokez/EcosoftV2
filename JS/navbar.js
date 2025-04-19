const languageSelector = document.querySelector('.language-selector');
const languageDropdown = document.querySelector('.language-dropdown');
const languageSelectorImg = languageSelector.querySelector('img');
const languageOptions = document.querySelectorAll('.language-option');

const flagIcons = {
    'en': 'Images/Icons/us.svg',
    'al': 'Images/Icons/al.svg',
    'me': 'Images/Icons/me.svg'
};

languageSelector.addEventListener('click', (e) => {
    e.stopPropagation();
    languageDropdown.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!languageSelector.contains(e.target) && !languageDropdown.contains(e.target)) {
        languageDropdown.classList.remove('active');
    }
});

languageOptions.forEach(option => {
    option.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedLang = option.getAttribute('data-lang');
        const selectedFlag = flagIcons[selectedLang];

        if (selectedFlag) {
            languageSelectorImg.src = selectedFlag;
            languageSelectorImg.alt = `${selectedLang.charAt(0).toUpperCase() + selectedLang.slice(1)} Flag`;
        }

        languageDropdown.classList.remove('active');

        window.location.href = `?lang=${selectedLang}`;
    });
});

const navLinks = document.querySelectorAll('.nav-icon');
navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (window.location.pathname.includes(href)) {
        link.classList.add('active');
    }
});