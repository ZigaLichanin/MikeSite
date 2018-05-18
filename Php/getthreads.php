<?php
//Defining our database paramateres
DEFINE('DB_USER','2675892_ziga');
DEFINE('DB_PSWD','gamer123');
DEFINE('DB_HOST','fdb18.awardspace.net');
DEFINE('DB_NAME','2675892_ziga');
//Using variable to connect to database
$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
//Check if user has phone!
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(!$dbcon){
	//Check if we have established connection to database
	die('error connecting to database!');
}
echo'<script>console.log("Connected to Database succesfully")</script>';
//Get threads from database..
//Last ID returned so we can make dynamicall loading
$lastid;
//Query for sql
$sqlgetthreads="Select * from forumposts";
$sqlgetnewestthreads="SELECT * FROM forumposts ORDER by forumposts.DateAdded DESC,forumposts.TimeAdded desc";
//Size for dynamicall increase of height
$size=880;
$sizenewest=880;
//Get Data
$result = mysqli_query($dbcon,$sqlgetthreads);
//Check for error
if(mysqli_error($dbcon)!=null){echo mysqli_error($dbcon);}
else{
	//Put all our returned rows into array
	while($data = mysqli_fetch_assoc($result)){
        $rows[] = $data;
    }
	//Check if forum is empty
    if(!isset($rows)){
		
		echo"<script>function showerror(){
	 var nothreads=document.getElementById('posted-questions-list'); 
	 nothreads.innerHTML+='<li><p style=\'font-size:150%\; text-align:center\;\'>No threads to show! Post one now!</p></li>';
	 }
	 window.onload=showerror;</script>";
	}
	//If not continue...
	else{
		//Show each row and put it into explore area
		foreach($rows as $row){
			//Put <br> where there is newline and so on...
		//$row['Content']=nl2br($row['Content']);
		//echo $row['Content'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			$size+=450;
		}
		else{
		$size+=120;
		}
		//Show thread by thread
		//Have to add backslashes every time a newline appears in javascript string and every time "'" appears aswell!
		echo "<script>
		$(document).ready(function(){
			$('#content').css('height','".$size."px');
		$('#posted-questions-list').append('<a href=\'openedpost.php?PostID=".$row['IDThread']."\'><li class=\'forum-post\'>\
		<div class=\'section group rowlist\'>\
		<div class=\'col span_2_of_12\'><img class=\'image-post\' src=\'".$row['ImageData']."\'></img>\
		</div><div class=\'col span_2_of_12\'><p><b class=\'post\'>".$row['Username']."</b></p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Title:<br>".$row['Title']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Subitle:<br>".$row['Subtitle']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Date added:<br>".$row['DateAdded']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Time added:<br>".$row['TimeAdded']."</p></div>\
		</div></li>');
		});
		</script>";
		}
	}	
}
$result = mysqli_query($dbcon,$sqlgetnewestthreads);
//Check for error
if(mysqli_error($dbcon)!=null){echo mysqli_error($dbcon);}
else{
	//Put all our returned rows into array
	while($data = mysqli_fetch_assoc($result)){
        $rowsnewest[] = $data;
    }
	//Check if forum is empty
    if($rowsnewest[0]==null||$rowsnewest[0]["Title"]==""){
		
		echo"<script>function showerror(){
	 var nothreads=document.getElementById('posted-questions-list'); 
	 nothreads.innerHTML+='<li><p style=\'font-size:150%\; text-align:center\;\'>No threads to show! Post one now!</p></li>';
	 }
	 window.onload=showerror;</script>";
	}
	//If not continue...
	else{
		//Show each row and put it into explore area
		foreach($rowsnewest as $row){
			//Put <br> where there is newline and so on...
		//$row['Content']=nl2br($row['Content']);
		//echo $row['Content'];
		//Check if phone
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			$sizenewest+=450;
		}
		else{
		$sizenewest+=120;
		}
		//Show thread by thread
		//Have to add backslashes every time a newline appears in javascript string and every time "'" appears aswell!
		echo "<script>
		$(document).ready(function(){
		$('#posted-newestquestions-list').append('<a href=\'openedpost.php?PostID=".$row['IDThread']."\'><li class=\'forum-post\'>\
		<div class=\'section group rowlist\'>\
		<div class=\'col span_2_of_12\'><p class=\'image-align\'><img class=\'image-post\' src=\'".$row['ImageData']."\'></img></p>\
		</div><div class=\'col span_2_of_12\'><p><b class=\'post\'>".$row['Username']."</b></p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Title:<br>".$row['Title']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Subitle:<br>".$row['Subtitle']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Date added:<br>".$row['DateAdded']."</p></div>\
		<div class=\'col span_2_of_12\'><p class=\'post\'>Time added:<br>".$row['TimeAdded']."</p></div>\
		</div></li>');
		});
		</script>";
		}
		echo "<script>
		$(document).ready(function(){
			var collapsibleelem1=document.querySelector('.collapsible1');
	  var collapsible1 = M.Collapsible.getInstance(collapsibleelem1);
	  var collapsibleelem2=document.querySelector('.collapsible2');
	  var collapsible2 = M.Collapsible.getInstance(collapsibleelem2);
			var firstclick=false;
			var sndclick=true;
		$('#collapsible').click(function(){
			if(firstclick==true){
		$('#content').css('height','".$size."px');
		firstclick=false;
		collapsible2.close();
		sndclick=true;
			}
			else{
			$('#content').css('height','880px');
			firstclick=true;
			}
        });
		$('#collapsible2').click(function(){
			if(sndclick==true)
			{
		$('#content').css('height','".$sizenewest."px');
		sndclick=false;
			collapsible1.close();
			firstclick=true;
			}
			else{
			$('#content').css('height','880px');
			sndclick=true;
			}
        });}
		);</script> ";
	}
}

?>