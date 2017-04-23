/**
 * Created by Constant Likudie on 07/04/2017.
 */
function makeUserActive() {
    var id = document.getElementById('userId').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status === 'success'){
                $("#alert_template button").after('<span>User Accepted</span>');
                $('#alert_template').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            } else if (jsonResponse[0].status === 'failed'){
                $("#alert_template button").after('<span>User Acceptance Failed</span>');
                $('#alert_template').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            }
        }
    };
    xhttp.open("GET", "../controller/AjaxCallsController.php?userid="+id+"&msg=0", true);
    xhttp.send();

}

function rejectUser() {
    var id = document.getElementById('userId').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status === 'success'){
                $("#alert_danger button").after('<span>User Rejected</span>');
                $('#alert_danger').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            } else if (jsonResponse[0].status === 'failed'){
                $("#alert_danger button").after('<span>User Rejection Failed</span>');
                $('#alert_danger').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            }
        }
    };
    xhttp.open("GET", "../controller/AjaxCallsController.php?userid="+id+"&msg=1", true);
    xhttp.send();

}
