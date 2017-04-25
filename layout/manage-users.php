
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Manage Users</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->


<div class="container mt">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 centered">

            <div class="alert alert-success container" id="alert_template" style="display: none;">
                <button type="button" class="close">×</button>
            </div>
            <div class="alert alert-danger container" id="alert_danger" style="display: none;">
                <button type="button" class="close">×</button>
            </div>

            <?php require_once('../controller/AdminFunctionController.php');
            $array = getAllUsers();
            foreach ($array as $item) {
                $username = $item['username'];
                $user_id = $item['user_id'];
                    echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body green\">
                        <i class=\"fa  fa-3x\"></i>
                        <input type='hidden' name='userid' value='$user_id' id='userId'>
                        <h3>$username</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-danger btn-circle\" onclick=\"makeUserInActive($user_id)\"><i class=\"fa fa-exclamation-triangle\"></i>
                        </button>
                    </div>
                </div>
            </div>";
            }

            ?>

        </div>
    </div>
</div>
