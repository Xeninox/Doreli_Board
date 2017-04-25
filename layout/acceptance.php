
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>User Requests</h3>
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
            $array = getAllInactiveUsers();
            $i = 0;
            $num_inactive = getNumInactiveUsers();
            $actual_num_inactive = $num_inactive["COUNT(*)"];
            if ($actual_num_inactive == 0){
                echo "<h4 style='color: black;'>Sorry, No New Users</h4>";
                echo "<img src=\"../image/sad.png\" style='height: 250px;'>";
            } else {
                foreach ($array as $item) {
                    $username = $item['username'];
                    $user_id = $item['user_id'];

                    if ($i % 2 == 0){
                        echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body green\">
                        <i class=\"fa fa-thumbs-up fa-3x\"></i>
                        <input type='hidden' name='userid' value='$user_id' id='userId'>
                        <h3>$username</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-info btn-circle\" onclick=\"makeUserActive($user_id)\"><i class=\"fa fa-check\"></i>
                        </button>
                        <button type=\"button\" class=\"btn btn-danger btn-circle\" onclick=\"rejectUser($user_id)\"><i class=\"fa fa-times\"></i>
                        </button>
                    </div>
                </div>
            </div>";
                    } else {
                        echo "<div class=\"col-lg-4\">
                            <div class=\"panel panel-primary text-center no-boder\">
                                <div class=\"panel-body red\">
                                    <i class=\"fa fa-thumbs-up fa-3x\" style=\"color: white;\"></i>
                                    <input type='hidden' name='userid' value='$user_id' id='userId'>
                                    <h3 style=\"color: white;\">$username</h3>
                                </div>
                                <div class=\"panel-footer\">
                                    <button type=\"button\" class=\"btn btn-info btn-circle\" onclick=\"makeUserActive($user_id)\"><i class=\"fa fa-check\"></i>
                                    </button>
                                    <button type=\"button\" class=\"btn btn-danger btn-circle\" onclick=\"rejectUser($user_id)\"><i class=\"fa fa-times\"></i>
                                    </button>
                                </div>
                            </div>
                        </div>";
                    }
                    $i++;
                }
            }

            ?>

        </div>
    </div>
</div>
