<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<base target="_blank">

<title> TurkChat Sohbet V1 </title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="relaxed/style.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


</head>
<body>

	
		
        <div id="kiwi" class="theme_relaxed" style="display: block;">
		
			<!--<h3 id="headingTurk">TurkChat Sohbet V1</h3>-->

            <div class="memberlists_resize_handle"></div>
			
			
            <div class="panels">
			
			<div class="panel applet" style="display: block;"><div><div class="server_select initial">

            

            <div class="server_details" style="position:relative;width:320px;">
				<div id="headingTurkChat">TurkChat Sohbet V1</div>
                <div class="status">Think of a nickname...</div>

                <form onsubmit="return false">
                    <div class="basic">
                        <table>
                            <tbody><tr class="nick">
                                <td><label for="server_select_nick">Nickname</label></td>
                                <td><input type="text" class="nick" placeholder="Enter Nick Name" id="server_select_nick" value=""></td>
                            </tr>
							
							<!--AhsanKhan1-->
							<tr class="nick">
                                <td><label>Password</label></td>
                                <td><input type="password" class="nick" placeholder="Enter Password" id="server_select_password" value=""></td>
                            </tr>

                            <tr class="have_pass">
                                <td colspan="2">
                                    <label for="server_select_show_pass">I have a password</label> <input type="checkbox" id="server_select_show_pass" style="width:auto;">
                                </td>
                            </tr>

                            <tr class="pass">
                                <td><label for="server_select_password">Password</label></td>
                                <td><input type="password" class="password" id="server_select_password"></td>
                            </tr>

                            <tr class="channel">
                                <td><label for="server_select_channel">Channel</label></td>
                                <td>
                                    <div style="position:relative;">
                                        <input type="text" class="channel" id="server_select_channel">
                                        <i class="fa fa-key" title="Channel Key"></i>
                                    </div>
                                </td>
                            </tr>

                            <tr class="have_key">
                                <td colspan="2">
                                    <label for="server_select_show_channel_key">Channel requires a key</label> <input type="checkbox" id="server_select_show_channel_key" style="width:auto;">
                                </td>
                            </tr>

                            <tr class="key">
                                <td><label for="server_select_channel_key">Key</label></td>
                                <td><input type="password" class="channel_key" id="server_select_channel_key"></td>
                            </tr>

                            <tr class="start">
                                <td></td>
                                <td><button type="submit" onclick="checkUserDetails()">Start...</button></td>
                            </tr>
                        </tbody></table>

                        <a href="" onclick="return false;" class="show_more">Server and network <i class="fa fa-caret-down"></i></a>
                    </div>


                    <div class="more">
                        <table>
                            <tbody><tr class="server">
                                <td><label for="server_select_server">Server</label></td>
                                <td><input type="text" class="server" id="server_select_server"></td>
                            </tr><tr>

                            </tr><tr class="port">
                                <td><label for="server_select_port">Port</label></td>
                                <td><input type="text" class="port" id="server_select_port"></td>
                            </tr>

                            <tr class="ssl">
                                <td><label for="server_select_ssl">SSL</label></td>
                                <td><input type="checkbox" class="ssl" id="server_select_ssl"></td>
                            </tr>
                        </tbody></table>
                    </div>
                </form>

               
            </div>
        </div></div></div>
		
			</div>
				
		
        </div>
		
		<!--
		<li class="alert_activity"><span>#35+</span><div class="activity">2</div></li><li class="alert_activity"><span>#ask</span><div class="activity">2</div></li><li class="alert_activity"><span>#carsaf.nl</span><div class="activity">1</div></li><li class="active"><span>#EZZ</span><div class="activity zero">0</div><span class="part fa fa-nonexistant"></span></li><li class="alert_activity"><span>#gurbet</span><div class="activity">1</div></li><li class="alert_activity"><span>#hollanda</span><div class="activity">3</div></li><li class="alert_activity"><span>#radyo</span><div class="activity">70</div></li><li class="alert_activity"><span>#sohbet</span><div class="activity">1</div></li><li class="alert_activity"><span>#yarisma</span><div class="activity">139</div></li>
		-->
   
   <script>
		function checkUserDetails()
		{
			var userLen=$("#server_select_nick").val().length;
			var passLen=$("#server_select_password").val().length;
			
			if(userLen>0)
			{
				$("#server_select_nick").css("border","none");
				window.location="chat?username="+$("#server_select_nick").val();
			}
			
			else
			{
				$("#server_select_nick").css("border","1px solid #DA2D2D");
			}
		}
   </script>

</body>
</html>
