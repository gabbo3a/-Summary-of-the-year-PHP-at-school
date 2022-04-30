// File esterno perche mi dava fastido 

const setDarkMode = (isDark) => {
    document.cookie = `darkMode=${isDark.checked}`;
    location.reload()
}