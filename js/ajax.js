/**
 * Created by Constant Likudie on 07/04/2017.
 */

/**
 * function to make a user active and display success message
 */
function makeUserActive(id) {
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

function makeUserInActive(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status === 'success'){
                $("#alert_template button").after('<span>User Made Inactive</span>');
                $('#alert_template').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            } else if (jsonResponse[0].status === 'failed'){
                $("#alert_template button").after('<span>User Acceptance Failed</span>');
                $('#alert_template').fadeIn('slow')
                window.setTimeout(function(){location.reload()},1500)
            }
        }
    };
    xhttp.open("GET", "../controller/AjaxCallsController.php?userid="+id+"&msg=4", true);
    xhttp.send();

}

/**
 * function to reject a user
 */
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

/**
 * function to get all the ads that belong to a particular category for an institution
 * @param catid the category id
 */
function getAllCatAds(catid, inst_id){
    var divElements = "";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            var jsonResponse = JSON.parse(this.responseText);
            obj = Object.keys(jsonResponse).length;
            document.getElementById('con').innerHTML = "";
            if (obj > 0){

                for (var i = 0; i < obj; i++){
                    divElements += '<div class="col-md-6">'+ '<a href="#" class="thumbnail">'+'<p><img class="img-responsive" src="data:image;base64,'+jsonResponse[i].ad_file+'" id="image" style="height: 200px;"></p>'+'<h3 class="ctitle" id="sub">'+jsonResponse[i].subject+'</h3>'
                        +'<form action = "viewaddetails.php" method = "post" style ="background: none"> '+'<button type="submit" name="viewad" value ="'+jsonResponse[i].id+'" class="btn btn-warning btn-block">View Ad</button></form><br><br>'
                        +'</a></div>';
                }
                $('#con').append(divElements);
            } else {
                divElements += '<h4 style="color: black;">Sorry, We have No Ads In This Category</h4>'
                    +'<img src="../image/sad.png" style="height: 250px;">';
                $('#con').append(divElements);
            }
        }
    };
    xhttp.open("GET", "../controller/AjaxCallsController.php?cat_id="+catid+"&inst_id="+inst_id+"&msg=2", true);
    xhttp.send();
}


/**
 * function to get all the ads that belong to a particular category for the public
 * @param catid the category id
 */
function getAllCatAdsForPublic(catid){
    var divElements = "";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            var jsonResponse = JSON.parse(this.responseText);
            obj = Object.keys(jsonResponse).length;
            document.getElementById('con').innerHTML = "";
            if (obj > 0){

                for (var i = 0; i < obj; i++){
                    divElements += '<div class="col-md-6">'+ '<a href="#" class="thumbnail">'+'<p><img class="img-responsive" src="data:image;base64,'+jsonResponse[i].ad_file+'" id="image" style="height: 200px;"></p>'+'<h3 class="ctitle" id="sub">'+jsonResponse[i].subject+'</h3>'
                        +'<form action = "viewaddetails.php" method = "post" style ="background: none"> '+'<button type="submit" name="viewad" value ="'+jsonResponse[i].id+'" class="btn btn-warning btn-block">View Ad</button></form><br><br>'
                        +'</a></div>';
                }
                $('#con').append(divElements);
            } else {
                divElements += '<h4 style="color: black;">Sorry, We have No Ads In This Category</h4>'
                    +'<img src="../image/sad.png" style="height: 250px;">';
                $('#con').append(divElements);
            }
        }
    };
    xhttp.open("GET", "../controller/AjaxCallsController.php?cat_id="+catid+"&msg=3", true);
    xhttp.send();
}
