module.exports = {
    purge: [
        './app/**/*.php',
        './resources/**/*.php',

      ],
  theme: {
    extend: {
        spacing: {
            '44': '11rem',
            '72': '18rem',
            '84': '21rem',
            '96': '24rem',
        }
      },
    spinner: (theme) => ({
        default: {
          color: '#fff', // color you want to make the spinner
          size: '1em', // size of the spinner (used for both width and height)
          border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
          speed: '500ms', // the speed at which the spinner should rotate
        },

        // md: {
        //   color: theme('colors.red.500', 'red'),
        //   size: '2em',
        //   border: '2px',
        //   speed: '500ms',
        // },
      }),
  },
  variants: {},
  plugins: [
    require('tailwindcss-spinner')({ className: 'spinner', themeKey: 'spinner' }),
  ],
}
