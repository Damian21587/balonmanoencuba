const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        pagination: theme => ({
            /*link: 'bg-white px-3 py-1 border-r border-t border-b text-black no-underline',
            linkActive: 'bg-blue-900 border-blue-900 font-bold',
            linkSecond: 'rounded-l border-l',
            linkBeforeLast: 'rounded-r',
            linkFirst: {
                '@apply mr-3 pl-5 border': {},
                'border-top-left-radius': '999px',
            },
            linkLast: {
                '@apply ml-3 pr-5 border': {},
                'border-top-right-radius': '999px',
            },*/
            color: theme('colors.blue.900'),
            //linkFirst: 'mr-6 border rounded',
            linkSecond: 'rounded-l border-l px-3 py-1',
            linkBeforeLast: 'rounded-r border-r px-3 py-1',
            //linkLast: 'ml-6 border rounded',
            linkFirst: {
                '@apply mr-3 pl-5 px-3 py-1 border': {},
                'border-top-left-radius': '999px',
            },
            linkLast: {
                '@apply ml-3 pr-5 px-3 py-1 border': {},
                'border-top-right-radius': '999px',
            },
        }),
    /*    screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },*/
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        backgroundColor: ["responsive", "hover", "focus", "invalid"],
        borderColor: ["responsive", "hover", "focus", "invalid"],
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwindcss-plugins/pagination'),
        require("tailwindcss-invalid-variant-plugin")
    ],
};
