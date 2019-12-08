# WordPress Development Base 

WordPress: *v5.3*

Theme: *TWG*

Plugins: *Contact Form 7, Classic Editor*

Tools: *Node, Npm, Gulp, SCSS, Bulma*

## Localhost installation

- Clone this repo
- Create a local DB for the project
- Rename wp-config-sample.php to wp-config.php and update it
    - Change DB settings
    - Crete new salts
- Navigate to the localhost address and install WordPress by following the steps
- Setup the local host like `http://wp-base.localhost/` 
    - etc/hosts
    - extras/httpd-vhosts.conf

## Theme setup

- Install Node packages `npm i`
- Configure gulpfile.js
- Configure package.json
- Update variables in `src/resources/scss/variables/_bulma.scss` file
- Update `/src/resources/scss/theme.css` file with the new theme details

## Development

- Use `gulp` command to run and watch .scss and .js assets
- Add more Bulma styles if required by uncommenting resources in this file `src/resources/scss/bundle.scss`

## Deployment

- Check and adjust .htaccess file with IP addresses and file caching options