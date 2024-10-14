/** @type {import('tailwindcss').Config} */
export default {
    // purge: [
    //     './resources/**/*.blade.php',
    //     './resources/**/*.js',
    //     './resources/**/*.vue',
    // ],
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
        'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],
    plugins: [
       require('flowbite/plugin')
    ],
    theme: {
        extend: {},
    },
}

// module.exports = {
//     purge: [],
//     purge: [
//         './resources/**/*.blade.php',
//         './resources/**/*.js',
//         './resources/**/*.vue',
//     ],
//     darkMode: false, // or 'media' or 'class'
//     theme: {
//         extend: {},
//     },
//     variants: {
//         extend: {},
//     },
//     plugins: [
//         require('flowbite/plugin')
//     ],
//     content: [
//         "./node_modules/flowbite/**/*.js"
//     ]
// }

