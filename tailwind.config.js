const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/**/*.blade.php"],
    darkMode: "media",
    theme: {
        extend: {
            backgroundImage: {
                calculatorjpg: "url('/images/calculator-pencil.jpg')",
                darktintjpg: "url('/images/dark_tint.png')",
                forwarder: "url('/images/forwarder.jpg')",
            },
            colors: {
                primary: {
                    normal: "#734222",           
                    dark: "#bbb",
                },
            },
            screens: {
                xs: "375px",
            },
            fontFamily: {
                helvetica: [
                    "Helvetica Neue",
                    "Helvetica",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
    ],
};
