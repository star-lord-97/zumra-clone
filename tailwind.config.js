module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                primary: "#494756",
            },
        },
    },
    variants: {
        extend: {
            cursor: ["hover", "focus"],
            borderWidth: ["hover", "focus"],
        },
    },
    plugins: [],
};
