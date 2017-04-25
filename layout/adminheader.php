<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Doreli Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">

                <?php
                if($_SESSION['role'] == 1){
                    echo "
                <li><a href=\"manageusers.php\">MANAGE USERS</a></li>
                <li><a href=\"manageads.php\">MANAGE ADS</a></li>
                <li><a href=\"accept-users.php\">USER REQUEST</a></li>
                <li><a href=\"admin-analysis.php\">ANALYSIS</a></li>";
                }
                ?>
                <li><a href="institution-ads.php">MY INSTITUTION ADS</a></li>
                <li><a href="upload.php">UPLOAD</a></li>
                <li class="dropdown active">
                    <?php $encoded_image = base64_encode($_SESSION['profile_pic']);
                    echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"data:image;base64, {$encoded_image}\"\" id=\"pic\" style=\"height: 40px;\"><b class=\"caret\"></b></a>";
                    ?>

                    <ul class="dropdown-menu">
                        <li><a href="userPost.php">MY POSTS</a></li>
                        <li><a href="newpublicpage.php">PUBLIC POSTS</a></li>
                        <li><a href="userpage.php">MY DETAILS</a></li>
                        <li><a href="../login/logout.php">LOGOUT</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>