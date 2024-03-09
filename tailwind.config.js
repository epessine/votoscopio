/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Raleway", "ui-sans-serif", "system-ui"],
                mono: ["Victor Mono", "ui-monospace"],
            },
        },
    },
    plugins: [],
};
