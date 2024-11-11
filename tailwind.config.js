/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'primary': '#1fb6ff', // Contoh warna primer
          'secondary': '#7e5bef', // Contoh warna sekunder
          'accent': '#ff49db', // Contoh warna aksen
          'neutral': '#8492a6', // Contoh warna netral
        },
        fontFamily: {
          'sans': ['Graphik', 'sans-serif'],
          'serif': ['Merriweather', 'serif'],
        },
        spacing: {
          '128': '32rem',
        },
        borderRadius: {
          '4xl': '2rem',
        }
      }
    },
    variants: {
      extend: {
        backgroundColor: ['active'],
        textColor: ['active'], // Jika ingin mengubah warna teks saat active
      }
    },
    plugins: [],
  }