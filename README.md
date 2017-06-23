# Overview

keyla.today is a daily news website related to football around the world in Khmer language. It is integrated with PHP CodeIgniter framework.

# Maintainer

* [Man Math](manmath4@gmail.com)

# Development prerequisites

* PHP version >= 5.6.0
* [Composer](https://getcomposer.org/)
* [Docker](https://docker.com/)
* [Grunt](https://gruntjs.com/)
* [Node JS](https://nodejs.org/en/)
* [Bower](https://www.npmjs.com/package/bower)
* [Compass](http://compass-style.org/install/)

# Development setup with Docker

1. Clone project to your development workspace

	```bash
	cd ~/path/to/development/workspace
	git clone https://github.com/manmath/keyla.today.git local.keyla.today
	```
2. Navigate to your project path

	```bash
	cd ~/path/to/development/workspace/local.keyla.today
	```

3. Run composer to install dependencies

	```bash
	composer install --prefer-dist -vvv
	```

4. Start docker containers

	```bash
	vendor/bin/dockerci up -d
	```

5. Add host

	```bash
	0.0.0.0 local.keyla.today test.local.keyla.today
	```

> Enjoy: http://local.keyla.today

# Working with `Grunt`

1. Install node dependencies

	```bash
	npm install
	```

2. Install web package managers

	```bash
	bower install
	```
3. Compile resources

	```bash
	grunt build
	```

	> When working on `*.scss` or `*.js` files. Run `grunt` or `grunt watch` to watch the changes and do auto compile.

# Copyright

(c) Man Math - 2017
