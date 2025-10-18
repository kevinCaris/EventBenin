document.addEventListener("DOMContentLoaded", () => {
    document.documentElement.classList.toggle(
        "dark",
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
    );

    window.setTheme = function (theme) {
        localStorage.theme = theme;
        document.documentElement.classList.toggle("dark", theme === "dark");
    };
});
