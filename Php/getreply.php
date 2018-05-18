<?php
//Defining our database paramateres
DEFINE('DB_USER','Mike');
DEFINE('DB_PSWD','ziza');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','WebsiteDB');
//Using variable to connect to database
$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
//Size for dynamic increase of page height
$size=1570;
//Check if user has phone!
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(!$dbcon){
	//Check if we have established connection to database
	die('error connecting to database!');
}
//Get id of thread from url!
$threadid=$_GET['PostID'];

//Get thread that we are currently using
$sqlgetthread="Select * from forumposts where IDThread='$threadid'";
//Get replies for thread
$sqlgetreplies="select * from replies where IDOP='$threadid'";

$result = mysqli_query($dbcon,$sqlgetthread);
if(mysqli_error($dbcon)!=null){echo mysqli_error($dbcon);}
else{
	//Get thread
	$thread=mysqli_fetch_assoc($result);
	$result=mysqli_query($dbcon,$sqlgetreplies);
	//Put all our returned rows into array
	while($data = mysqli_fetch_assoc($result)){
        $replies[] = $data;
    }
	//Check if replies are empty
	if(!isset($replies)){
		echo"<script>function showerror(){
	 var noreplies=document.getElementById('posted-replies-list'); 
	 noreplies.innerHTML+='<li><p style=\'font-size:150%\; text-align:center\;\'>No replies to show! Post one now!</p></li>';
	 }
	 window.onload=showerror;</script>";
	}
	else{
		//Show each reply and increase height
		foreach($replies as $reply){
			if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			$size+=570;
		}
		else{
			$size+=290;
		}
			echo"<script>
			$(document).ready(function(){
				$('#content').css('height','".$size."px');
				$('#posted-replies-list').append('<li class=\'repliesfromusers-container\'><div class=\'section group rowlist\'> \
	<div class=\'col span_2_of_12\'><img class=\'reply-image\' src=\'".$reply['ImageData']."\'></img></div>\
	<div class=\'col span_3_of_12\'><p class=\'info\'>From:<br>".$reply['Username']."</p></div>\
	<div class=\'col span_2_of_12\'><p class=\'info\'>Replied:<br>".$reply['DateAdded']."\' \'".$reply['TimeAdded']."</p></div>\
	<div class=\'col span_5_of_12\'>\
	<div class=\'post-background right-margin z-depth-3\'>\
	<p class=\'no-margin center-align\' style=\'font-family:\'Verdana\'\; color:rgb(200,200,200)\;\'>Content</p>\
	<textarea id=\'replyusers\' name=\'reply-user\' rows=\'40\' cols=\'100\' disabled>\
	".json_encode($reply['Content'])."\
	</textarea></div>\
	</div></div></li>');
			});
			</script>";
		}
	}
}
?>