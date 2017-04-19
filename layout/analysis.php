
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>Institution Analysis Panel</h3>
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

            <?php
            require_once('../controller/AdminFunctionController.php');
            require_once('../controller/InstitutionAdsController.php');

            $num_upload = getNumUploadForInstitution();
            $actual_num_upload = $num_upload["COUNT(*)"];

            $num_accepted = getNumAcceptedUsers();
            $actual_num_accepted = $num_accepted["COUNT(*)"];

            $num_rejected = getNumRejectedUsers();
            $actual_num_rejected = $num_rejected["COUNT(*)"];

            $num_inactive = getNumInactiveUsers();
            $actual_num_inactive = $num_inactive["COUNT(*)"];


            echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body green\">
                        <i style='...' class=\"fa fa-users fa-3x\"></i>
                        <h3 style='...'>Accepted</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-success btn-circle\">$actual_num_accepted</i>
                        </button>
                    </div>
                </div>
            </div>";

            echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body newred\">
                        <i style='color: white;' class=\"fa fa-ban fa-3x\"></i>
                        <h3 style='color: white;'>Rejected</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-danger btn-circle\">$actual_num_rejected</i>
                        </button>
                    </div>
                </div>
            </div>";

            echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body newinactive\">
                        <i style='color: yellow;' class=\"fa fa-exclamation-triangle fa-3x\"></i>
                        <h3 style='color: yellow;'>Inactive</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-warning btn-circle\">$actual_num_inactive</i>
                        </button>
                    </div>
                </div>
            </div>";

            echo "<div class=\"col-lg-4\">
                <div class=\"panel panel-primary text-center no-boder\">
                    <div class=\"panel-body newinactive\">
                        <i style='color: white;' class=\"fa fa-upload fa-3x\"></i>
                        <h3 style='color: white;'>Uploads</h3>
                    </div>
                    <div class=\"panel-footer\">
                        <button type=\"button\" class=\"btn btn-warning btn-circle\">$actual_num_upload</i>
                        </button>
                    </div>
                </div>
            </div>";

            ?>

        </div>
    </div>
</div>
