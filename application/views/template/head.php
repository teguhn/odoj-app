<!DOCTYPE html>
<html>
    <head>
        <base href="<?=base_url(); ?>" />
        <?php
        if(isset($title_page)){$_title.=' | '.$title_page;}
        $meta = array(
            array('name' => 'description', 'content' => 'My Great Site'),
            array('name' => 'keywords', 'content' => 'love, passion, intrigue, deception'),
            array('name' => 'robots', 'content' => 'no-cache'),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')
        );
        echo meta($meta);
        ?>
        <title><?=$_title ?></title>
        <?php
        if(isset($css)){foreach($css as $c){$_css[]=$c;}}
        if(!isset($_style)){$_style ='';}
        foreach ($_css as $css) :
            echo link_tag('assets/css/' . $css . '.css')."\n";
        endforeach;
        ?>
        <style type="text/css">
        <?=$_style ?>
        </style>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
	    selector: ".tinymce",
    theme: "modern",
    width: 680,
    height: 300,
    subfolder:"",
    link_list: [
        {title: 'My page 1', value: 'http://www.tinymce.com'},
        {title: 'My page 2', value: 'http://www.moxiecode.com'}
    ],
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager"
   ],
   image_advtab: true,
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "forecolor backcolor | link unlink anchor | image media | print preview code"
 });

$(function(){
    $('.iframe-btn').fancybox({
	'width'		: 900,
	'height'	: 600,
	'type'		: 'iframe',
        'autoScale'    	: false
    });
});
	</script>
    </head>
    <body>
        