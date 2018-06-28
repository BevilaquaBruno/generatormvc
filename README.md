# MVC pattern generator with PHP :ok_hand:
##### this project it's useful to learn about how to manage files with php and do something like composer, but composer use the .phar php files, here i don't.

#### In your project you will have created before:
> - :open_file_folder: app
>   - :open_file_folder: controllers
>   - :open_file_folder: models
>   - :open_file_folder: views

## Files:

1. The *base* folder have the files and the pattern code inside those files.

2. The generatormvc.bat file execute the generatormvc.php, then this file use your commands to create the MVC files.

3. The generatormvcscript.iss file it's a [inno setup](http://jrsoftware.org/isinfo.php) code used to create an executable file

## Commands:

Base command:

    generatormvc <func> <type> <name>

> `generatormvc`: base command.

> `<func>`: what you want to do,so far it has only 2 commands:
`create` to create files and `delete` to delete files

>`<type>`: the type you want: `mvc` to create all, `controller` to create only a controller, `model` to create only a model or `view` to create a folder and a .html, .css and .js files

>`<name>`: the name you want for the files:
> ##### If you choose product for the name:
> - :open_file_folder: app
>   - :open_file_folder: controllers
>       - :page_facing_up: controllerProduct.php
>   - :open_file_folder: models
>       - :page_facing_up: modelProduct.php
>   - :open_file_folder: views
<<<<<<< HEAD
>       - open_file_folder: product
>           - :page_facing_up: product.html
>           - :page_facing_up: product.css
>           - :page_facing_up: product.js
=======
>       - :open_file_folder: product
>           - :page_facing_up:: product.html
>           - :page_facing_up:: product.css
>           - :page_facing_up:: product.js
>>>>>>> fd2fd2699e4548b12f8630d7fde7cca0a3d87a0f
