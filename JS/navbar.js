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

// Hamburger Menu Slide-In Logic
const hamburgerBtn = document.querySelector('.hamburger-btn');
const currentLang = new URLSearchParams(window.location.search).get('lang') || 'en';

const slideMenu = document.createElement('div');
slideMenu.classList.add('mobile-slide-menu');
slideMenu.innerHTML = `
    <a href="Products?lang=${currentLang}" class="mobile-nav-link">
        <img src="Images/Icons/products_icon.svg" alt="Products Icon">
    </a>
    <a href="About?lang=${currentLang}" class="mobile-nav-link">
        <img src="Images/Icons/About us - icon.svg" alt="About Us Icon">
    </a>
    <a href="Survey?lang=${currentLang}" class="mobile-nav-link">
        <img src="Images/Icons/contact-icon.svg" alt="Contact Icon">
    </a>
`;
document.body.appendChild(slideMenu);

let menuOpen = false;

const toggleMenu = () => {
    menuOpen = !menuOpen;
    slideMenu.classList.toggle('active', menuOpen);
};

hamburgerBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleMenu();
});

document.addEventListener('click', (e) => {
    if (menuOpen && !slideMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
        toggleMenu();
    }
});
