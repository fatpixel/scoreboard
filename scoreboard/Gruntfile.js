'use strict';

module.exports = function (grunt) {
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        app: {
            path: 'app',
            assets: 'app/assets'
        },
        dist: {
            path: 'public',
            assets: 'public/assets'
        },

        sass: {
            options: {
                style: 'expanded', // expanded or nested or compact or compressed
                loadPath: ['<%= app.assets %>/vendor/foundation/scss']
            },
            dist: {
                options: {
                    precision: 5,
                    style: 'expanded',
                    quiet: true,
                    cacheLocation: '.tmp/.sass-cache'
                },
                files: {
                    '<%= app.assets %>/css/scoreboard.css': '<%= app.assets %>/scss/scoreboard.scss'
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 3 Chrome versions', 'last 3 Firefox versions', 'ie >= 10'],
                cascade: true
            },
            dist: {
                src: '<%= app.assets %>/css/*.css'
            }
        },

        stylestats: {
            src: '<%= app.assets %>/css/*.css'
        },

        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                '<%= app.assets %>/js/**/*.js'
            ]
        },

        clean: {
            dist: {
                src: ['<%= dist.assets %>/*']
            },
            sasscache: {
                src: ['.tmp/*']
            }
        },
        copy: {
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= app.path %>/',
                        src: ['**/*.html', '!assets/**'],
                        dest: '<%= dist.path %>/'
                    },
                    {
                        expand: true,
                        cwd: '<%= app.assets %>/',
                        src: ['fonts/**', '!**/*.scss', '!vendor/**'],
                        dest: '<%= dist.assets %>/'
                    }
                ]
            }
        },

        imagemin: {
            target: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= app.assets %>/images/',
                        src: ['**/*.{jpg,gif,svg,jpeg,png}'],
                        dest: '<%= dist.assets %>/images/'
                    }
                ]
            }
        },

        uglify: {
            options: {
                preserveComments: 'some',
                mangle: false
            }
        },

        useminPrepare: {
            html: ['<%= app.path %>/master.html'],
            options: {
                root: '.',
                dest: '<%= dist.path %>'
            }
        },

        usemin: {
            html: ['<%= dist.path %>/*.html', '!<%= app.assets %>/vendor/**', '!<%= dist.assets %>/vendor/**'],
            css: ['<%= dist.assets %>/css/**/*.css'],
            options: {
                dirs: ['<%= dist.path %>']
            }
        },

        watch: {
            grunt: {
                files: ['Gruntfile.js'],
                tasks: ['compile-sass']
            },
            sass: {
                files: '<%= app.assets %>/scss/**/*.scss',
                tasks: ['compile-sass']
            },
            livereload: {
                files: ['<%= app.path %>/**/*.html', '!<%= app.assets %>/vendor/**', '<%= app.assets %>/js/**/*.js', '<%= app.assets %>/css/**/*.css', '<%= app.assets %>/images/**/*.{jpg,gif,svg,jpeg,png}'],
                options: {
                    livereload: true
                }
            }
        },

        connect: {
            app: {
                options: {
                    port: 9000,
                    base: '<%= app.path %>/',
                    open: true,
                    livereload: true,
                    hostname: '127.0.0.1'
                }
            },
            dist: {
                options: {
                    port: 9001,
                    base: '<%= dist.path %>/',
                    open: true,
                    keepalive: true,
                    livereload: false,
                    hostname: '127.0.0.1'
                }
            }
        },

        wiredep: {
            target: {
                src: [
                    '<%= app.path %>/*.html' // , '!<%= app.assets %>/**'
                ],
                exclude: [
                    'modernizr',
                    'jquery-placeholder',
                    'jquery.cookie',
                    'foundation'
                ]
            }
        }

    });

    grunt.registerTask('minPrepare', 'Pre-defined usemin configuration', function () {

        grunt.config.merge({
            concat: {
                generated: {
                    files: [
                        {
                            dest: '.tmp/concat/assets/css/vendor.min.css',
                            src: ['app/assets/vendor/Hover/css/hover.css']
                        },
                        {
                            dest: '.tmp/concat/assets/css/scoreboard.min.css',
                            src: ['app/assets/css/scoreboard.css', 'app/assets/css/overrides.css']
                        },
                        {
                            dest: '.tmp/concat/assets/js/modernizr.min.js',
                            src: ['app/assets/vendor/modernizr/modernizr.js']
                        },
                        {
                            dest: '.tmp/concat/assets/js/vendor.min.js',
                            src: [
                                'app/assets/vendor/hogan/lib/hogan.js',
                                'app/assets/vendor/jquery/dist/jquery.js',
                                'app/assets/vendor/fastclick/lib/fastclick.js'
                            ]
                        },
                        {
                            dest: '.tmp/concat/assets/js/foundation.min.js',
                            src: ['app/assets/vendor/foundation/js/foundation.js']
                        },
                        {
                            dest: '.tmp/concat/assets/js/scoreboard.min.js',
                            src: ['app/assets/js/scoreboard.js']
                        }
                    ]
                }
            },

            uglify: {
                options: {
                    preserveComments: 'some',
                    mangle: false
                },
                generated: {
                    files: [
                        {
                            dest: 'public/assets/js/modernizr.min.js',
                            src: ['.tmp/concat/assets/js/modernizr.min.js']
                        },
                        {
                            dest: 'public/assets/js/vendor.min.js',
                            src: ['.tmp/concat/assets/js/vendor.min.js']
                        },
                        {
                            dest: 'public/assets/js/foundation.min.js',
                            src: ['.tmp/concat/assets/js/foundation.min.js']
                        },
                        {
                            dest: 'public/assets/js/scoreboard.min.js',
                            src: ['.tmp/concat/assets/js/scoreboard.min.js']
                        }
                    ]
                }
            },

            cssmin: {
                generated: {
                    files: [
                        {
                            dest: 'public/assets/css/vendor.min.css',
                            src: ['.tmp/concat/assets/css/vendor.min.css']
                        },
                        {
                            dest: 'public/assets/css/scoreboard.min.css',
                            src: ['.tmp/concat/assets/css/scoreboard.min.css']
                        }
                    ]
                }
            }
        });
    });


    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-usemin');
    grunt.loadNpmTasks('grunt-wiredep');
    grunt.loadNpmTasks('grunt-stylestats');

    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-newer');

    grunt.registerTask('compile-sass', ['sass', 'autoprefixer']);
    grunt.registerTask('bower-install', ['wiredep']);

    grunt.registerTask('default', ['clean:sasscache', 'compile-sass', 'bower-install', 'connect:app', 'watch']);
    grunt.registerTask('validate-js', ['jshint']);
    grunt.registerTask('server-dist', ['connect:dist']);

    grunt.registerTask('build', ['compile-sass', 'clean:dist', 'validate-js', 'useminPrepare', 'copy:dist', 'newer:imagemin', 'concat', 'cssmin', 'uglify', 'usemin']);
    grunt.registerTask('publish', ['compile-sass', 'clean:dist', 'validate-js', 'useminPrepare', 'copy:dist', 'newer:imagemin', 'concat', 'cssmin', 'uglify', 'usemin']);

};
