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

    watch: {
      css: {
        files: 'src/assets/scss/styles.scss',
        tasks: ['sass']
      },
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass', 'watch']);
};
