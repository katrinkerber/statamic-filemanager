# Filemanager add-on for Statamic
This add-on allows for the adding of files using Simon Georget's [Filemanager](https://github.com/simogeo/Filemanager).

It has been tested with Statamic v1.6.2. 

## Screenshots
![Filemanager Field in Grid](http://katrinkerber.com/assets/screenshot-ckeditor.png)

![Filemanager Window](http://katrinkerber.com/assets/screenshot-filemanager-grid.png)


## Installation
Upload the `filemanager` folder to your Statamic's `_add-ons` folder.

## Configuration
By default Filemanager will use the `/assets/` folder to browse and upload images/files to.

If you need to change this, go to `_add-ons/filemanager/lib/scripts/filemanager.config.js` and edit the `fileRoot` value on **line 18**.

#### Editing the .htaccess file
If you are using Statamic’s provided code in your `.htaccess` file, which includes this line of code

    `Rewriterule ^(.*)?\.html$ - [F,L]`

then the Filemanager won't work, as this blocks access to html files. 

You need to remove this line to get Filemanager to work.

I use the following block of code to protect system and template files:

    RewriteRule ^(_app) - [F,L]
    RewriteRule ^(_config) - [F,L]
    RewriteRule ^(_content) - [F,L]
    RewriteRule ^(_logs) - [F,L]
    RewriteRule (layouts) - [F,L]
    RewriteRule (templates) - [F,L]
    RewriteRule (partials) - [F,L]
    RewriteRule ^(.*)?\.yml$ - [F,L]
    Rewriterule ^(.*)?\.yaml$ - [F,L]
    RewriteRule ^(.*/)?\.git+ - [F,L]


### Running in a subdirectory
If you are running Statamic in a subdirectory, you need to change the `fileRoot` value. 

Go to `_add-ons/filemanager/lib/scripts/filemanager.config.js` and edit the `fileRoot` value on **line 18**: `"fileRoot": "yoursubdirectory/assets/"`.

### Declaring a Filemanager fieldtype
Declare **type: filemanager** in your fieldset settings.
