import defaultTheme from 'tailwindcss/defaultTheme';

export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        // Custom color palette
        'ivory': '#FDFBF7',
        'charcoal': '#1A1A1A',
        'gold': '#C5A880',
        'champagne': '#D4AF37',
        'beige': '#F4F0EA',
      },
      backgroundColor: {
        'primary': '#FDFBF7',
        'secondary': '#F4F0EA',
      },
      textColor: {
        'primary': '#1A1A1A',
      },
    },
  },
  plugins: [],
};
