const mix = require('laravel-mix');

// Copy CKEditor files
mix.copy('node_modules/ckeditor4/ckeditor.js', 'public/js/ckeditor.js')
   .copyDirectory('node_modules/ckeditor4/skins', 'public/js/skins')
   .copyDirectory('node_modules/ckeditor4/lang', 'public/js/lang')
   .copyDirectory('node_modules/ckeditor4/plugins', 'public/js/plugins')
   .copy('node_modules/ckeditor4/config.js', 'public/js/config.js')
   .copy('node_modules/ckeditor4/styles.js', 'public/js/styles.js')
   .copy('node_modules/ckeditor4/contents.css', 'public/js/contents.css');