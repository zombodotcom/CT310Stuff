<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CT310 Examples</title>
		<script
		  src="https://code.jquery.com/jquery-3.3.1.js"
		  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		  crossorigin="anonymous">
	    </script>
<!-- 	    <link rel="stylesheet" type="text/css" href="main.css" /> -->
	</head>
	<body>
		<div id="head">
			<h1>All Status</h1>
		</div>
		<div id="mainContent">
			<table>
				<thead>
					<tr>
						<th>EID</th>
					</tr>
				</thead>
				<tbody id="table-body">
				</tbody>
			</table>
		</div>
	</br>
	</br>
		<div id="footer">
			Part of a <a href="https://www.cs.colostate.edu/~ct310/">CT310</a> Course Project
		</div>
	</body>

	<script>
			$.ajax("/~ct310/yr2018sp/master.json", {
                success: function(data) {
                    //this loops through all eids in the url mentioned above::::::KEEP THIS
                    $.each(data, function(index, field){
                        var eid = field.eid;
                        var team = field.team;
                        if(eid === ""){
                            $('#table-body').append($('<tr style="background-color: yellow;">').text("undefined" + " " + eid + " " + team));
                        }
                        $.ajax("/~" + eid + "/ct310/index.php/federation/status", {
                            success: function(status) {
                            //trying to differentiate the objects from non-objects
                            //if element is a non-object do the jQuery.parse business
                                if(jQuery.type(status) === "object"){
                                    if(status.status === "closed"){
                                        $('#table-body').append($('<tr style="background-color: red;">').text(status.status + " " + eid + " " + team));
                                    }
                                    if(status.status === "open"){
                                        $('#table-body').append($('<tr style="background-color: green;">').text(status.status + " " + eid + " " + team));
                                    }
//                                     if(status.status === ""){
//                                         $('#table-body').append($('<tr style="background-color: yellow;">').text(status.status + " " + eid + " " + team));
//                                     }
                                }
                                //this is if the status is represented as a string... this will turn that string into an object
                                else{
                                    var temp = jQuery.parseJSON(status);
                                    if(temp.status === "closed"){
                                        $('#table-body').append($('<tr style="background-color: red;">').text(temp.status + " " + eid + " " + team));
                                    }
                                    if(temp.status === "open"){
                                        $('#table-body').append($('<tr style="background-color: green;">').text(temp.status + " " + eid + " " + team));
                                    }
                                }
                            },
                        });
                    });
                }
            });
	</script>







</html>
