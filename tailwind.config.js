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
        fontSize: {
            sm: ['16px', '120%'],
            base: ['20px', '150%'],
            large: ['24px', '150%'],
            h3: ['32px', '120%'],
            h2: ['48px', '120%'],
            h1: ['64px', '120%'],
            huge: ['150px', '120%']
        },
        fontWeight: {
            thin: '100',
            extralight: '200',
            light: '300',
            normal: '400',
            medium: '500',
            semibold: '600',
            bold: '700',
            extrabold: '800',
            black: '900',
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '12px',
                lg: '32px',
                xl: '42px',
                xxl: '48px',
                xxxl: '64px',
                xxxxl: '84px'
            },
        },
        extend: {
            colors: ludik.colorMapper(ludik.theme('settings.color.palette', theme)),
            fontSize: ludik.fontSizeMapper(ludik.theme('settings.typography.fontSizes', theme)),
            spacing: {
                xs: '6px',
                sm: '12px',
                md: '24px',
                lg: '32px',
                xl: '42px',
                xxl: '48px',
                xxxl: '64px',
                xxxxl: '84px',
                form: '200px',
                hero: '480px'
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
