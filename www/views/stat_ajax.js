$.ajax({
	type: "GET",
	url: "www/controllers/stat_sumCommentInCountry.php",
	dataType: "JSON",
	//data: "",
	success: function(data){
		var output="";
		var output2="";
		for (var i in data.count) {
			var i_name_region = data.count[i].nameRegion;
			var i_count_comment = data.count[i].countComment;
			
			if (i_count_comment > 5) {
				output += CreateLineHTML(i_name_region, i_count_comment, 'lev1');
				output += Cities_by_Region(i_name_region, data.countCity);
			} else {
				output2 += CreateLineHTML(i_name_region, i_count_comment, 'lev1');
				output2 += Cities_by_Region(i_name_region, data.countCity);
			}				
		}
		document.getElementById("placeholder1").innerHTML=output;
		document.getElementById("placeholder2").innerHTML=output2;
	},
	error: function(){
		alert('Errors');
	}
});	

function Cities_by_Region(name_region, arr_cities) {
	var line='';
	for (var j in arr_cities) {
		if (arr_cities[j].nameRegion === name_region) {
			line += CreateLineHTML(arr_cities[j].nameCity, arr_cities[j].countComment, 'lev2');
		}
	}
	return line;
}

function CreateLineHTML(name, count, lev) {
	var line='<tr class=' + lev + '><td>';
	if (lev == 'lev1') {
		line += "<label><input type='checkbox'><a onclick='sh(this)'>" + name + "</label></td><td>";
	} else {
		line += "</td><td><label>" + name + "</label>";
	}
	line += "</td><td><p>" + count + "</p></td></tr>";
	return line;
}