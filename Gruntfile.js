module.exports = function (grunt) {

    // Print time to build each grunt task
    require('time-grunt')(grunt);

    // Library to autoinclude necessary grunt tasks (makes building much faster)
    require('jit-grunt')(grunt);

    grunt.file.defaultEncoding = 'utf-8';

    // Project configuration.
    grunt.initConfig({
        dirs: {
            src: 'resources/private',
            dest: 'resources/public',
            bower: 'bower_components',
            sass: {
                src: '<%= dirs.src %>/sass'
            },
            css: {
                dest: '<%= dirs.dest %>/css'
            },
            js: {
                src: '<%= dirs.src %>/scripts',
                dest: '<%= dirs.dest %>/js'
            },
            fonts: {
                dest: '<%= dirs.dest %>/fonts'
            },
            vendor: {
                bootstrap: '<%= dirs.bower %>/bootstrap-sass/assets',
                jquery: '<%= dirs.bower %>/jquery/dist'
            }
        },
        compass: {
            dist: {
                options: {
                    httpPath: '/',
                    sassDir: '<%= dirs.sass.src %>',
                    cssDir: '<%= dirs.css.dest %>',
                    outputStyle: 'compact',
                    relativeAssets: true,
                    noLineComments: true,
                    importPath: [
                        '<%= dirs.vendor.bootstrap %>/stylesheets'
                    ]
                }
            }
        },
        concat: {
            jsLib: {
                src: [
                    '<%= dirs.vendor.jquery %>/jquery.js'
                ],
                dest: '<%= dirs.js.dest %>/keyla-lib.js'
            },
            jsFE: {
                src: [
                    '<%= dirs.vendor.bootstrap %>/javascripts/bootstrap.js',
                    '<%= dirs.js.src %>/frontend.js'
                ],
                dest: '<%= dirs.js.dest %>/keyla-fe.js'
            },
            jsBE: {
                src: [
                  '<%= dirs.vendor.bootstrap %>/javascripts/bootstrap.js',
                  '<%= dirs.js.src %>/backend.js'
                ],
                dest: '<%= dirs.js.dest %>/keyla-be.js'
            }
        },
        uglify: {
            dist: {
                files: {
                    '<%= dirs.js.dest %>/keyla.today-lib.min.js': ['<%= concat.jsLib.dest %>'],
                    '<%= dirs.js.dest %>/keyla.today-fe.min.js': ['<%= concat.jsFE.dest %>'],
                    '<%= dirs.js.dest %>/keyla.today-be.min.js': ['<%= concat.jsBE.dest %>']
                }
            }
        },
        cssmin: {
            dist: {
                files: {
                  '<%= dirs.css.dest %>/keyla.today-fe.min.css': ['<%= dirs.css.dest %>/frontend.css'],
                  '<%= dirs.css.dest %>/keyla.today-be.min.css': ['<%= dirs.css.dest %>/backend.css']
                }
            }
        },
        copy: {
            fonts: {
                files: [{
                        expand: true,
                        flatten: true,
                        src: '<%= dirs.vendor.bootstrap %>/fonts/bootstrap/*.{eot,svg,ttf,woff,woff2}',
                        dest: '<%= dirs.fonts.dest %>'
                    }]
            }
        },
        clean: {
            js: ['<%= dirs.js.dest %>/*.js', '!<%= dirs.js.dest %>/*.min.js'],
            css: ['<%= dirs.css.dest %>/*.css', '!<%= dirs.css.dest %>/*.min.css']
        },
        watch: {
            grunt: {
                files: ['Gruntfile.js'],
                tasks: ['build']
            },
            sass: {
                files: ['<%= dirs.sass.src %>/**/*.scss'],
                tasks: ['compass', 'cssmin:dist', 'clean:css']
            },
            js: {
                files: ['<%= dirs.js.src %>/**/*.js'],
                tasks: ['concat:jsLib', 'concat:jsFE', 'concat:jsBE', 'uglify:dist', 'clean:js']
            }
        }
    });

    // Default task.
    grunt.registerTask('default', ['build', 'watch']);

    // Build task.
    grunt.registerTask('build', ['compass', 'concat', 'uglify', 'cssmin', 'copy', 'clean']);
};
