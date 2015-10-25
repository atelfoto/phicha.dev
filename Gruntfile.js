module.exports=function(grunt){
	require('load-grunt-tasks')(grunt);
	grunt.initConfig({
		jshint: {
			all: ['app/webroot/js/vegas.js','app/webroot/js/app.js']
		},
		uglify: {
			options:{
				mangle:false
			},
			dist: {
				files: {
					'app/webroot/js/home.min.js': ["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/vegas.min.js"],
					'app/webroot/js/default.min.js': ["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/bootstrap.min.js","app/webroot/js/app.min.js"]
					// "app/webroot/js/app.min.js": ["app/webroot/js/app.js"],
					// "app/webroot/js/app2.min.js": ["app/webroot/js/default.min.js", "app/webroot/js/app.js"]
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
	//grunt.registerTask('default',['cssmin'] )
	grunt.registerTask('default',['uglify'] )


}

