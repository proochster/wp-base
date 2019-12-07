# WordPress Development Base 

Theme: *TWG*

Plugins: *Contact Form 7, Classic Editor*

Tools: *Node, Npm, Gulp*

## Localhost installation

- Clone this repo
- Create a local DB for the project
- Update the wp-config file
    - Change DB settings
    - Crete new salts
- Navigate to the localhost address and install WordPress by following the steps
- Setup the local host like `http://wp-base.localhost/` 
    - etc/hosts
    - extras/httpd-vhosts.conf

## Deployment

- Check and adjust .htaccess file with IP addresses and file caching options

## Development

- Install Node packages `npm i`
- Configure gulpfile.js
- Configure package.json

- Update files in the `wp-base/src/resources/scss/variables/` folder

- Use `gulp` command to run and watch .scss and .js assets
