        <!--scripts-->
        <?php
            if(!isset($_js))$_js=array();
            if(isset($js)){foreach($js as $j){$_js[]=$j;}}
            if(!isset($_script)){$_script ='';}
        ?>
        <?php foreach ($_js as $js): ?>
            <script type="text/javascript" src="assets/js/<?=$js ?>.js"></script>
        <?php endforeach; ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $(function(){
//                $('.fade-out').delay(2000).fadeOut();
                $('.tip').tooltip();
                $('.tip-right').tooltip({placement:'right'});
                <?=$_script ?>
            })
        </script>
    </body>
</html>
