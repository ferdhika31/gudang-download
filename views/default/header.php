<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->location();?>"><?php echo $_SESSION['site_title'];?></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="http://blog.dika.web.id" class="active">Blog</a></li>
                <li><a href="<?php echo $this->location('daftar/file');?>">Top File</a></li>
                <li><a href="<?php echo $this->location('daftar/akun');?>" >Top Downloaded</a></li>
                <li>
                <?php
                if($this->session->getValue('isLogin')){
                    echo "<a target=\"_top\" class=\"main\" href='".$this->location('donlod/keluar')."'>Keluar</a>";
                }else{
                    echo "<a target=\"_top\" class=\"main\" href='".$this->location('donlod/masuk')."'>Masuk</a>";
                }
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
