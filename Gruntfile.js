module.exports=function(grunt){
	require('load-grunt-tasks')(grunt);
	grunt.initConfig({
		jshint: {
			all: ['app/webroot/js/jquery.vegas.js',"app/webroot/js/jquery.countdown.js","app/webroot/js/global.js"]
		},

		uglify: {
			options:{
				mangle:false
			},
			dist: {
				files: {
					'app/webroot/js/min.js': ["app/webroot/js/jquery-1.11.3.min.js","app/webroot/js/bootstrap.min.js","app/webroot/js/jquery.vegas.js","app/webroot/js/jquery.countdown.js","app/webroot/js/global.js"]
				}
			}
		},
		watch:{
			dist:{
				files:['app/webroot/js/jquery.vegas.js',"app/webroot/js/jquery.countdown.js","app/webroot/js/global.js","!**/min.*"],
				tasks:["default"],
				options:{ spawn:false}
			}
		},
		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'app/webroot/files/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'app/webroot/filesmin/'
				}]
			}
		}
	});


	grunt.registerTask('default',['jshint','uglify','imagemin'] )


}
