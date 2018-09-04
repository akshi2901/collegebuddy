<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Comment.php');
	$userid = Login::isLoggedIn();
	$username="";
	$username=DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];
	if (isset($_POST['comment'])) {
        Comment::createComment($_POST['commentbody'], $_GET['postid'], $userid);
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeBuddy</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <header class="hidden-sm hidden-md hidden-lg">
        <div class="searchbox">
            <form action="index1.php" method="post">
                <h1 class="text-left">CollegeBuddy</h1>
                <div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                    <input class="form-control sbox" type="text">
                    <ul class="list-group autocomplete" style="position:absolute;width:100%; z-index: 100">
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">MENU <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li role="presentation"><a href="profile.php?username=<?php echo $username;?>">My Profile</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="index1.php">Timeline </a></li>
                        <li role="presentation"><a href="index.html">Home </a></li>
                        <li role="presentation"><a href="notify.php">Notifications </a></li>
                        <li role="presentation"><a href="my-account.php">My Account</a></li>
						<li role="presentation"><a href="messages.php">Messages</a></li>
                        <li role="presentation"><a href="logout.php">Logout </a></li>
                    </ul>
                </div>
            </form>
        </div>
        <hr>
    </header>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="index1.php"><i class="icon ion-ios-people"></i></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form action="index1.php" class="navbar-form navbar-left" method="post">
                       <div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control sbox" type="text">
                            <ul class="list-group autocomplete" style="position:absolute;width:100%; z-index:100">
                            </ul>
                        </div>
                    </form>
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li role="presentation"><a href="index1.php">My Timeline</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="index1.php">Timeline </a></li>
                                <li role="presentation"><a href="index.html">Home</a></li>
								<li role="presentation"><a href="cms">Articles</a></li>
								<li role="presentation"><a href="market">Market </a></li>
								<li role="presentation"><a href="quiz">Quiz</a></li>
                                <li role="presentation"><a href="notify.php">Notifications </a></li>
                                <li role="presentation"><a href="my-account.php">My Account</a></li>
								<li role="presentation"><a href="messages.php">Messages</a></li>
                                <li role="presentation"><a href="logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li role="presentation"><a href="quiz">Quiz</a></li>
                        <li role="presentation"><a href="cms">Articles</a></li>
                        <li role="presentation"><a href="market">Market</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="index1.php">Timeline </a></li>
                                <li role="presentation"><a href="index.html">Home </a></li>
                                <li role="presentation"><a href="notify.php">Notifications </a></li>
                                <li role="presentation"><a href="my-account.php">My Account</a></li>
								<li role="presentation"><a href="messages.php">Messages</a></li>
                                <li role="presentation"><a href="logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Timeline </h1>
        <div class="timelineposts">

        </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" style="padding-top:100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Comments</h4></div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                    The content of your modal.
                </div>
                <div class="modal-footer">					
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark navbar-fixed-bottom">
        <footer>
            <div class="container">
                <p class="copyright">CollegeBuddy© 2018</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $('.sbox').keyup(function() {
                        $('.autocomplete').html("")
                        $.ajax({

                                type: "GET",
                                url: "api/search?query=" + $(this).val(),
                                processData: false,
                                contentType: "application/json",
                                data: '',
                                success: function(r) {
                                        r = JSON.parse(r)
                                        for (var i = 0; i < r.length; i++) {
                                                console.log(r[i].body)
                                                $('.autocomplete').html(
                                                        $('.autocomplete').html() +
                                                        '<a href="profile.php?username='+r[i].username+'#'+r[i].id+'"><li class="list-group-item"><span>'+r[i].body+'</span></li></a>'
                                                )
                                        }
                                },
                                error: function(r) {
                                        console.log(r)
                                }
                        })
                })
				
				$.ajax({
                        type: "GET",
                        url: "api/posts",
                        processData: false,
                        contentType: "application/json",
                        data: '',
                        success: function(r) {
                                var posts = JSON.parse(r)
                                $.each(posts, function(index) {
                                        $('.timelineposts').html(
                                                $('.timelineposts').html() +

                                                '<li class="list-group-item"><blockquote><p>'+posts[index].PostBody+'</p><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;" data-id=\"'+posts[index].PostId+'\"> <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+posts[index].Likes+' Likes</span></button><button class="btn btn-default comment" data-postid=\"'+posts[index].PostId+'\" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;"><i class="glyphicon glyphicon-flash" style="color:#f9d616;"></i><span style="color:#f9d616;"> Comments</span></button></p><form action="index1.php?postid='+posts[index].PostId+'" method="post"><textarea class="btn btn-default" name="commentbody" rows="2" cols="30" style="color:#eb3b60;opacity:0.7;" ></textarea>&nbsp&nbsp<input class="btn btn-default" type="submit" name="comment" value="Comment" style="background-image:url(&quot;none&quot;);background-color:#da052b;color:#fff; opacity:0.9;"></form></footer></blockquote></li>'
                                        )
                                        $('[data-postid]').click(function() {
                                                var buttonid = $(this).attr('data-postid');
                                                $.ajax({
                                                        type: "GET",
                                                        url: "api/comments?postid=" + $(this).attr('data-postid'),
                                                        processData: false,
                                                        contentType: "application/json",
                                                        data: '',
                                                        success: function(r) {
                                                                var res = JSON.parse(r)
                                                                showCommentsModal(res);
                                                        },
                                                        error: function(r) {															
                                                                console.log(r)
                                                        }
                                                });
                                        });
                                        $('[data-id]').click(function() {
                                                var buttonid = $(this).attr('data-id');
                                                $.ajax({
                                                        type: "POST",
                                                        url: "api/likes?id=" + $(this).attr('data-id'),
                                                        processData: false,
                                                        contentType: "application/json",
                                                        data: '',
                                                        success: function(r) {
                                                                var res = JSON.parse(r)
                                                                $("[data-id='"+buttonid+"']").html(' <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+res.Likes+' Likes</span>')
                                                        },
                                                        error: function(r) {
                                                                console.log(r)
                                                        }
                                                });
                                        })
                                })
                        },
                        error: function(r) {
                                console.log(r)
                        }
                });
        });
		
        function showCommentsModal(res) {
                $('.modal').modal('show')
                var output = "";
                for (var i = 0; i < res.length; i++) {
                        output += res[i].Comment;
                        output += " ~ ";
                        output += res[i].CommentedBy;
                        output += "<hr />";
                }
                $('.modal-body').html(output)
        }
    </script>
	
<!-- Chats-------------------------------------------------------------------------------------->	
 <link href="chat/style.css" rel="stylesheet">
    <script src="chat/script.js"></script>

<div class="container"> 
<div class="msg_box" style="right:290px">
	<div class="msg_head">My Messages
	</div>
	<div class="msg_wrap">
		<div class="msg_body" style="overflow-y:auto;max-height:250px;" >
		<?php
				$a=1;
				$messages = DB::query('SELECT messages.*, users.username FROM messages, users WHERE receiver=:receiver AND users.id = messages.sender order by 1 DESC LIMIT 0,15', array(':receiver'=>$userid));
				foreach ($messages as $message) {
					
					if($a==1){
							echo "<div class='msg_a'>";
							$a=2;
						}
					else{
							echo "<div class='msg_b'>";
							$a=1;
					}
					if (strlen($message['body']) > 10) {
							$m = substr($message['body'], 0, 10)." ...";
					} else {
							$m = $message['body'];
					}

					if ($message['read'] == 0) {
						echo "<a href='messages.php#".$message['sender']."'><strong>".$m."</strong></a> sent by ".$message['username'].'<br />';
					} else {
						echo "<a href='messages.php#".$message['sender']."'>".$m."</a> sent by ".$message['username'].'<br />';
					}
					echo "</div>";
				}
?>	
			
		</div>
</div>
</div>  
</div> 

 <div class="container"> 
  <div class="chat_box">
	<div class="chat_head"> <?php echo $username?> follows</div>
	<div class="chat_body"  style="overflow-y:auto;max-height:250px;"> 
		 <?php 
		$usrs = DB::query('SELECT  users.* FROM users,followers WHERE follower_id=:followerid AND users.id=followers.user_id',array(':followerid'=>$userid));
		foreach ($usrs as $usr) {
                $m = $usr['username'];
				if($m!=$username){
				echo "<div class='user'>";
                echo"<a href='messages.php#".$usr['id']."'>".$m."</a>".'<br />';
				echo "</div>";
				}
		}?>	
	</div>
 </div>
 </div> 
<!-- Chats------------------------------ended-------------------------------------------------------->	
	
	
</body>

