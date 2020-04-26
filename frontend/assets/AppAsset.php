<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/index.min.css',
        'https://use.fontawesome.com/releases/v5.11.2/css/all.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap',
        'css/style1.css',
        'css/bootstrap.min.css',
        'css/mdb.min.css',
        'css/style.css',
        'css/custom.css',
        'css/site.css',
        'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css',
        'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css',
        'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css',
        'css/item.css',
        'css/desktopHd.css'
    ];

    public $js = [
        'js/new.js',
        'js/scripts.js',
        'js/scripts.min.js',
        'js/util.js',
        'js/jquery.min.js',
        'js_core/html2canvas.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/mdb.min.js',
        'js/mdb.js',
        'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',
        'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js',
        'https://rawgithub.com/ajaxorg/ace-builds/master/src/ext-language_tools.js',
        'https://rawgithub.com/ajaxorg/ace-builds/master/src/ace.js',
        'https://kendo.cdn.telerik.com/2017.3.913/js/pako_deflate.min.js',
        'js/script.js',
        'js_core/editor.js',
        'js_core/img.js',
        'js_core/admin.js',
        'js_core/img_events.js',
        '//cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js', 
        'node_modules/svg2pdf.js/dist/svg2pdf.js',
        'js_core/FileSaver.js',
        'https://daybrush.com/moveable/release/latest/dist/moveable.min.js',
       'https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js',
        'js/jszip.min.js',
        'js/kendo.all.min.js',
        'js/console.js',
        'js_core/save.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js',
        'https://unpkg.com/html2canvas@1.0.0-rc.5/dist/html2canvas.js'
    
    ];
    
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
