/**
 * Created by Sirotkin on 02.03.2017.
 *
 */
$.ajax({
    type: "POST",
    url: "/www/controllers/comment_allRegion.php",
    dataType: "json",
    //data: "",
    success: function(data){
        var output="<option value='0' >- выберите страну -</option>";
        for (var i in data.arrName) {
            output+="<option value=" + data.arrName[i].id + ">" + data.arrName[i].name + "</option>";
        }
        document.getElementById("country").innerHTML=output;
    },
    error: function(){
        alert('Проверьте подключение к www серверу.');
    }
});
