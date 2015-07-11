module.exports = function(grunt) {

  grunt.initConfig({
    sass: {
      dist: {
        options: {
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {
          'src/style.css': 'src/assets/scss/styles.scss'
        }
      }
    },

    pot: {
      options: {
        text_domain: 'wp-theme-starter-kit',
        dest: 'src/languages/',
        keywords: ['__', '_e'],
        omit_header: true
      },
      files: {
        src:  ['src/**/*.php'],
        expand: true
      }
    },

    watch: {
      css: {
        files: 'src/assets/scss/styles.scss',
        tasks: ['sass']
      },
    }
  });

  grunt.loadNpmTasks('grunt-pot');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['pot', 'sass', 'watch']);
};
