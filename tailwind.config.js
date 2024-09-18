const theme = require('./theme.json');
const ludik = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        fontFamily: {
            sans: ['Epilogue', 'sans-serif']
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: ludik.colorMapper(ludik.theme('settings.color.palette', theme)),
            fontSize: ludik.fontSizeMapper(ludik.theme('settings.typography.fontSizes', theme)),
            spacing: {
                hero: '480px',
                xl: '32px',
                xxl: '48px',
                xxxl: '64px',
                xxxxl: '84px'
            },
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': ludik.theme('settings.layout.contentSize', theme),
            'xl': ludik.theme('settings.layout.wideSize', theme),
            '2xl': '1600px'
        }
    },
    plugins: [
        ludik.tailwind,
        require('tailwindcss-animated')
    ]
};
