<?php if(!isset($title_page)){$title_page=$_title;} ?>
<!--    <div id="navbar">
        <?=$_navbar ?>
    </div>-->
    <div class="container" id="container">
        <div class="row-fluid">
            <div class="span12 banner">
                <img src="assets/img/banner.jpg" />
            </div>
        </div>
        <div id="body" class="row-fluid">
            <div id="sidebar" class="span3">
                <?= $_sidebar ?>
            </div>
            <div id="content" class="span9">
                <?= $this->session->flashdata('alert') ?>
                <div class="well">
                <div id="header" class="row-fluid">
                    <h1><?=$title_page ?></h1>
                </div>
                <?= $_content ?>
                </div>
            </div>
        </div>
        <div id="footer" class="row-fluid">
        </div>
    </div>