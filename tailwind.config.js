/** @type {import('tailwindcss').Config} config */
import plugin from 'tailwindcss/plugin.js';
import typography from '@tailwindcss/typography';

const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}', "./node_modules/tw-elements/dist/js/**/*.js"],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        '2xl': '6rem',
      },
    },
    extend: {
      colors: {
        primary: '#0974BA',
        secondary: '#27AAE1',
        lightblue: '#F3F8FC',
        gray: '#F7F7F7',
        text_color: '#262626',
      },
      fontFamily: {
        sans: ['Maven Pro', 'sans-serif'],
        serif: ['Merriweather', 'serif'],
      },
      fontSize: {
        'body-lg': '1em',
        'body': '.875rem',
      },
      typography: {
        DEFAULT: {
          css: {
            fontSize: '1.125rem',
            color: '#404040',
            lineHeight: '140%',
            maxWidth: '100ch',
            strong: {
              color: '#404040',
            },
            h4: {
              fontSize: '1.25rem',
              marginBottom: '0px',
            },
            ul: {
              paddingLeft: '1.3rem',
            },
            li: {
              marginTop: '0px',
              marginBottom: '0px',
            },
            'ul > li:first-child': {
              marginTop: '0px',
            },
            'ul > li::marker': {
              fontWeight: '400',
              color: 'text-black',
              fontSize: '.8rem',
            },
          },
        },
      },
    },
  },
  plugins: [
    typography,
  ],
};

export default config;
