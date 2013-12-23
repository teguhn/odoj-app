<?php if(!isset($title_page)){$title_page=$_title;} ?>
    <div id="navbar">
        <?=$_navbar ?>
    </div>
    <div class="container">
        <div id="header" class="row-fluid">
            <h1><?=$title_page ?></h1>
        </div>
        <div id="body" class="row-fluid">
            <div id="sidebar" class="span3">
                <?= $_sidebar ?>
            </div>
            <div id="content" class="span9">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?=base_url('admin')?>">Administrasi</a> <span class="divider">/</span>
                    </li>
                <?php
                    $menu=$this->db->get('menu')->result_array();
                    $uri=$this->uri->segment(1).'/'.$this->uri->segment(2);
                    $uri2=$uri.'/'.$this->uri->segment(3);
                    foreach ($menu as $m) :
                        if($m['link']==$uri):
                ?>
                    <li>
                        <a href="<?=$m['link']?>"><?=$m['menu']?></a> <span class="divider">/</span>
                    </li>
                <?php endif; endforeach;
                    foreach ($menu as $m) :
                        if($m['link']==$uri2):
                ?>
                    <li>
                        <a href="<?=$m['link']?>"><?=$m['menu']?></a> <span class="divider">/</span>
                    </li>
                <?php endif; endforeach;?>
                </ul>
                <?= $this->session->flashdata('alert') ?>
                <?= $_content ?>
            </div>
        </div>
        <div id="footer" class="row-fluid">
            <p class="footer">Contact admin: <a href="mailto:teguh.nugraha91@gmail.com">teguh.nugraha91(at)gmail.com</a></p>
            <!--<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>-->
        </div>
    </div>