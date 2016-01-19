module.exports=function(grunt){
	require('load-grunt-tasks')(grunt);
	grunt.initConfig({
		jshint: {
			all: ['app/webroot/js/vegas.js','app/webroot/js/app.js','app/webroot/js/jsocial.js','app/webroot/js/admin/jquery.slimscroll.js','app/webroot/js/fileinput_locale_fr.js']
		},
		uglify: {
			options:{
				mangle:false
			},
			dist: {
				files: {
					'app/webroot/js/home.min.js': ["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/vegas.min.js","app/webroot/js/jsocial.js"],
					'app/webroot/js/default.min.js': ["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/bootstrap.min.js","app/webroot/js/app.js","app/webroot/js/jsocial.js"],
					'app/webroot/js/admin.min.js':["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/bootstrap.min.js","app/webroot/js/admin/app.min.js","app/webroot/js/jquery.easing.min.js",'app/webroot/js/bootstrap-toggle.min.js','app/webroot/js/fileinput.min.js','app/webroot/js/fileinput_locale_fr.js']
				}
			}
		},
		cssmin: {
			target: {
				files: {
					'app/webroot/css/jbcore/classic/theme.min.css': ['app/webroot/css/jbcore/classic/theme.css']
				}
			}
		},
		watch:{
			dist:{
				files:['app/webroot/js/vegas.js'],
				tasks:["default.min"],
				options:{ spawn:false}
			}
		},
		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'app/webroot/img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'app/webroot/imgmin/'
				}]
			}
		}
	});
	grunt.registerTask('default',['uglify'] )


}

