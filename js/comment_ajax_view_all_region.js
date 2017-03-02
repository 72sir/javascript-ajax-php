/**
 * Created by Sirotkin on 02.03.2017.
 */
$.ajax({
    type: "POST",
    url: "/php/wrap/comment/request_all_region.php",
    dataType: "text",
    //data: "",
    success: function(data){
        data = JSON.parse(data);

        var output="<option value='0' >- выберите страну -</option>";
        for (var i in data.region) {
            output+="<option value=" + data.region[i].id + ">" + data.region[i].name + "</option>";
        }
        document.getElementById("country_id").innerHTML=output;
    },
    error: function(){
        alert('Проверьте подключение к php серверу.');
    }
});