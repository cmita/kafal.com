'use strict';

module.exports = function(grunt) {

    grunt.initConfig({
    	pkg: grunt.file.readJSON('package.json'),

		project: {
		    app: ['kafal.com'],
		    assets: ['../<%= project.app %>/public'],
		    css: ['<%= project.assets %>/sass/base.scss']

		},
		sass: {
		    dev: {
		        options: {
		            style: 'expanded',
		            compass: false
		        },
		        files: {
		            '<%= project.assets %>/css/base.css':'<%= project.css %>'
		        }
		    }
		},
		watch: {
		    sass: {
		        files: '<%= project.assets %>/sass/{,*/}*.{scss,sass}',
		        tasks: ['sass:dev']
		    }
		}


    });
    grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', [
    	'watch'
	]);
};