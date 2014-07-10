# Statamic Filemanager add-on
This fieldtype add-on allows for the browsing and uploading of files using Simon Georget's [Filemanager](https://github.com/simogeo/Filemanager).

It has been tested with Statamic v1.7.1.

## Screenshots
![Filemanager Field in Grid](http://katrinkerber.com/assets/screenshot-filemanager-fields.png)

![Filemanager Window](http://katrinkerber.com/assets/screenshot-filemanage-window.png)


## Installation
Upload the `filemanager` folder to your Statamic's `_add-ons` folder.

## Configuration
By default Filemanager will use the `/assets/` folder to browse and upload images and files to.

If you need to change this, go to `_add-ons/filemanager/lib/scripts/filemanager.config.js` and edit the `fileRoot` value on **line 18** and the `relPath` value on **line 19**.

#### Editing the .htaccess file
If you are using Statamic’s provided code in your `.htaccess` file, it will include this line of code:

    `Rewriterule ^(.*)?\.html$ - [F,L]`

With this the Filemanager won't work, as it blocks access to all html files.

**You need to remove this line to get Filemanager to work.**

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
If you are running Statamic in a subdirectory, you need to change the `fileRoot` and `relPath` values.

Go to `_add-ons/filemanager/lib/scripts/filemanager.config.js` and edit the values on **line 18** and **line 19**:
`"fileRoot": "yoursubdirectory/assets/"`
`"relPath": "/yoursubdirectory/assets/"`

### Declaring a Filemanager fieldtype
Declare **type: filemanager** in your fieldset settings.
