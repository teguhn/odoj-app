        <?php $uri=$this->uri->segment(1).'/'.$this->uri->segment(2); ?>
        <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
            <li class="nav-header">Menu</li>
        <?php if($this->access->is_login() && $this->session->userdata('att_id')){ ?>
        <?php $att_id=$this->session->userdata('att_id'); ?>
            <li class="<?php if($uri=='registration/edit')echo 'active' ?>">
                <a href="registration/edit/<?=$att_id?>">
                    Edit Registration Data
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
            <li class="<?php if($uri=='registration/detail')echo 'active' ?>">
                <a href="registration/detail/<?=$att_id?>">
                    Registration Data
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(1)=='submission')echo 'active' ?>">
                <a href="submission/">
                    Paper Submission
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
            <li class="divider"></li>
            <li class="<?php if($uri=='index/logout')echo 'active' ?>">
                <a href="index/logout">
                    <i class="icon-off"></i> Log out
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
        <?php }else{ ?>
            <li class="<?php if($uri=='registration/add')echo 'active' ?>">
                <a href="registration/add">
                    Register
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
            <li class="<?php if($uri=='index/')echo 'active' ?>">
                <a href="index/">
                    Modify Data
                    <div class="pull-right"><i class="icon-chevron-right"></i></div>
                </a>
            </li>
        <?php } ?>
        </ul>
        </div>