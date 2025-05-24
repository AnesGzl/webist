// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}

// Whenever the user explicitly chooses light mode
function setLightMode() {
    localStorage.theme = 'light'
    document.documentElement.classList.remove('dark')
}

// Whenever the user explicitly chooses dark mode
function setDarkMode() {
    localStorage.theme = 'dark'
    document.documentElement.classList.add('dark')
}

// Whenever the user explicitly chooses to respect the OS preference
function useSystemTheme() {
    localStorage.removeItem('theme')
}

document.addEventListener('DOMContentLoaded', function() {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        lightIcon.classList.remove('hidden');
    } else {
        darkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        // Toggle icons
        darkIcon.classList.toggle('hidden');
        lightIcon.classList.toggle('hidden');

        // If is dark mode now
        if (document.documentElement.classList.contains('dark')) {
            setLightMode();
        } else {
            setDarkMode();
        }
    });
});
