<?php
	@$userName=@$_GET['username'];
?>

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

<Script>
	
	var msg_width=79.9;
	
	var language={
			"Settings":{"Platform":"Baglan","Commands":"komutlar","List of Channels":"Kanal Listesi","Find Nickname":"Rumuz bul","Nick Publicity":"Rumuz tanit","Register":"Register","Writing Copy":"Yazi Kopyala","about":"Hakkinda","Channel Operations":"kanal islemleri","Nick Operations":"Nick islemleri","Private Messages":"Ozel Mesajlar","Clear Screen":"Ekran Temizle","Date":"Tarih","Enter Channel":"Kanala Gir","Leave the Channel":"Kanaldan Cik","Busy Mode":"Mesgul Modu","Invitation":"Davet","Change Nickname":"Rumuz Degis","Be busy":"Mesgul Ol","Come back":"Geri Don","Block":"Engelle","Acer Barriers":"Engel Ac","Barriers List":"Engel Listesi","Ok":"Tamam","Cancel":"Iptal","Close":"Kapat","Leave Channel":"Kanaldan Ayril","Command":"Komut","Smiley Emoticons":"Surat Ifadeleri","Color Palette":"Renk Paleti","Invite":"davet et", "Join Channel":"Kanal katıl","Number of Channels":"Kanal Sayısı","Change Nick":"Değişim Nick","Leave Channel":"Bırak Kanal","Channel Info":"kanal bilgisi","Clear":"Açık","Kickout":"Atmak","Mute":"dilsiz","Close Message":"Yakın Mesajı","Settings":"Ayarlar","Language":"Lisan","Change Text Color":"Değişim Metin Rengi","Smileys":"Suratlar","Full Screen":"Tam ekran","Ping":"Ping","Version":"Versiyon","Finger":"Finger","Whois":"Whois","Friends List":"Arkadaş listesi","Private Message":"Özel mesaj"}
		
	};
	
</script>

<script>
	var Channels=["#EZZ","#yarisma","#carsaf.nl","#sohbet","#35+","#ask","#gurbet","#radyo","#hollanda"];
	var restricted_Inputs=["/j","/join","/kick","/ban","/part"];
	var inputMaxLength=200;

		var j=0;
		var performActions=0;
		
		function JoinChannels()
		{
			if(j<Channels.length)
			{
				
					var prevVal=$(".inp").val();
					
					$(".inp").val("/join #"+Channels[j]);
					
					var e = $.Event('keydown', { keyCode: 13 });
					$('.inp').trigger(e);
					
					$(".inp").val(prevVal);

					console.log(Channels[j]);
					
					var delay=00; //1 seconds

					setTimeout(function(){
					  JoinChannels();
					}, delay);

				
			}
			
			else
			{
				performActions=1;
				
				$("#textInput").attr("maxlength",inputMaxLength);

			}
			
			j++;
			//alert('df');
		}
		
		function JoinChannelsAgain()
		{
			j=0;
			JoinChannels();
		}
		
</script>

<script>

	
		function changeColor()
		{
			$("#smiley-container").hide(150);
			$("#color-container").toggle(150);
		}
		
		function showEmoIcons()
		{
			$("#color-container").hide(150);
			$("#smiley-container").toggle(150);
		}
		
		function chngeForeColor(val)
		{
			$("#foreground-color").removeClass();
			$("#foreground-color").addClass("BG"+val);
			$("#foreground-color").attr("data-val",val);
			
			/*var prevVal=$(".inp").val();
			
			$(".inp").val("/clear");
			
			var e = $.Event('keydown', { keyCode: 13 });
			$('.inp').trigger(e);
			
			$(".inp").val(prevVal);*/
			//$(".inp").val("10 3546446");
		}
		
		function chngeBgColor(val)
		{
			$("#background-color").removeClass();
			$("#background-color").attr("data-val",val);
			
			if(val=="none")
			{
				$("#background-color").addClass("none");
			}
			
			else
			{
				$("#background-color").addClass("BG"+val);
			}
		}
		
		function checkChars()
		{
		
			var prevVal=$(".inp").val();
			
			$.map(restricted_Inputs,function(element,index)
			{
				
				prevVal=prevVal.replace(element,"");
				
			});
			
			$(".inp").val(prevVal);
			
		}
		
		function chngColorOnEnter(e)//AhsanKhan1 
		{
			var val=$(".inp").val();
			//console.log(val.match(/whois/g));
			
			//var re = new RegExp("\:)", 'g');
	/*if(val!="/clear"&&val.match(/\/whois/g)==null&&val.match(/\/topic/g)==null&&val.match(/\/kick/g)==null&&val.match(/\/ban/g)==null&&val.match(/\/join/g)==null&&val.match(/\/j/g)==null&&val.match(/\/part/g)==null&&val.match(/\/voice/g)==null&&val.match(/\/devoice/g)==null&&val.match(/\/msg/g)==null&&val.match(/\/action/g)==null&&val.match(/\/nick/g)==null&&val.match(/\/block/g)==null&&val.match(/\/ignore/g)==null&&val.match(/\/ping/g)==null&&val.match(/\/date/g)==null&&val.match(/\/version/g)==null&&val.match(/\/leave/g)==null&&val.match(/\/quit/g)==null&&val.match(/\/query/g)==null&&val.match(/\/invite/g)==null&&val.match(/\/closechat/g)==null&&val.match(/\/closemsg/g)==null&&val.match(/\/umode/g)==null&&val.match(/\/silence/g)==null&&val.match(/\/topic/g)==null) 
			{*/
				val=val.replace(/(?:\r\n|\r|\n)/g, '');
			
				var keyCode = e.keyCode || e.which;
			
				if (keyCode == '13' && val.length>1 && val!="" && val!=" ")
				{
					/*alert('f');
					var bg=$("#background-color").attr("data-val");
					var fg=$("#foreground-color").attr("data-val");
					
					if(bg=="none")
					{
						var str=""+fg+" "+val;
					}
					
					else
					{
						var str=""+fg+","+bg+" "+val;
					}
					
					$(".inp").val(str);*/
										
					var toSnd=$("#joinedChannels .active span").first().text();
					//alert(toSnd);
					sendMessage(toSnd,val);
					
					$('#textInput').val('');
					
					//var e = $.Event('keydown', { keyCode: 13 });
					//$('.inp').trigger(e);
					
					//alert(str);
				
				}
			//}
		}
		
		function addSmiley(i)
		{
			var vl=$(".inp").val();
			$(".inp").val(vl+" "+i+" ");
		}
		
		maxLen=200;
		
</script>


</head>
<body>

	<object width="0" height="0">
		<param name="movie" value="static/jSocket.swf?jSocket_1">
		<embed src="static/jSocket.swf?jSocket_1" width="0" height="0" name="socket">
		</embed>
	</object>
  	
		
		<div id="loading-Bar">
			<i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom" style="color: #0088cc;"></i>
		</div>
		
        <div id="kiwi" class="theme_relaxed">
		
			<!--<h3 id="headingTurk">TurkChat Sohbet V1</h3>-->

            <div class="memberlists_resize_handle"></div>
			
			
            <div class="panels">
				
                <div class="panel_container container1" style="position:relative;top: 25px;">
					<div class='panel-header1'> &nbsp;&nbsp; TurkChat Sohbet V1 <div onclick="toggleRightBar()" class="close_icon1" title="Friends List"></div> <div onclick="make_FullScreen()" class="full_screen_icon" title="Full Screen"></div> </div>
					<div class='panel-header-settings'> 
						<div class="kickOut" title="Kickout" onclick="kickHimeOut()" style="display:none;"></div>
						<div class="mute" title="Mute" onclick="muteOrUnmute()" style="display:none;"></div>
						<!--<div  class="closemsgs" onclick="closePrivateMsg()" title="Close Message"></div>-->
						
						<div class="channel_tools">
						<table>
						<tr>
                            <td class="commands" title="Commands">
								<ul id="dropDownOptions">
								
								<li class="hasSubMenu0"><span class="menuOptions">Channel Operations</span> <span class="arrow">&#9658;</span>
					 
									<ul id="SubdropDownOptions0">
										<li onclick="joinChanPopUp()"><span class="menuOptions">Enter Channel</span></li>
										<li onclick="closeThisTabFromMenu()"><span class="menuOptions">Leave the Channel</span></li>
										<!--<li onclick="banSelectedNick()"><span class="menuOptions">Ban</span></li>
										<li onclick="kickSelectedNick()"><span class="menuOptions">Kick</span></li>-->
									</ul>
								</li>
								
								<li class="hasSubMenu1">
									<span class="menuOptions">Nick Operations</span> <span class="arrow">&#9658;</span>
					 
									<ul id="SubdropDownOptions1">
										<li onclick="showSndMsgPrvt()"><span class="menuOptions">Private Message</span></li>
										<li onclick="whoisSelectedNick()"><span class="menuOptions">Whois</span></li>
										
										<!--<li onclick="inviteSelectedNick()"><span class="menuOptions">Invitation</span></li>-->
										<li onclick="changeNipckPopUp()"><span class="menuOptions">Change Nickname</span></li>
									</ul>
								</li>
								
								<li class="hasSubMenu2"><span class="menuOptions">Private Messages</span> <span class="arrow">&#9658;</span>
					 
									<ul id="SubdropDownOptions2">
										<li onclick="ignoreHim()"><span class="menuOptions">Block</span></li>
										
									</ul>
								</li>
								
								<!--<li class="hasSubMenu3"><span class="menuOptions">CTCP</span> <span class="arrow">&#9658;</span>
					 
									<ul id="SubdropDownOptions3">
										<li onclick="pingSelectedNick()"><span class="menuOptions">Ping</span></li>
										<li onclick="dateSelectedNick()"><span class="menuOptions">Date</span></li>
										<li onclick="versionSelectedNick()"><span class="menuOptions">Version</span></li>
										<li><span class="menuOptions">Finger</span></li>
									</ul>
								</li>-->
								
								<li onclick="clearArea()"><span class="menuOptions">Clear Screen</span></li>
							</ul>
							
							</td>
							
							<td onclick="joinChanPopUp()" class="jChannel" id="jChannel" title="Join Channel"></td>
							<td onclick="showSndMsgPrvt()" class="sndMsgPrvt fa fa-paper-plane-o" title="Private Message"></td>
							
							<td onclick="changeNipckPopUp()" class="editName" title="Change Nick"></td>
							<td class="clearText" title="Clear" onclick="clearArea();"></td>
							<!--<td class="infoChannel" title="about"></td>-->
							<td onclick="closeThisTabFromMenu()" class="exitChannel" title="Leave Channel"></td>
							<!--<td class="settingsChannel" title="Settings"></td>
							<!--<i class="fa fa-angle-double-right right-bar-toggle-inner" title="Hide"></i> -->
							
						</tr>
						</table>
						</div>
					</div>
					
					<div id="rightBar" class="right_bar" style="top: 0px; bottom: 72px; opacity: 1;">
						<div class="right-bar-toggle" style="display: none;"><i class="fa-angle-double-right fa"></i></div>
						<div class="right-bar-content">
							<div class="memberlists"></div>
						</div>
						
					</div>
					
					
					
				</div>
            </div>          

            <div class="controlbox" style="display:block">
                <div class="input">
					<img class='txtColor' id='txtColor' title="Change Text Color" height='18' width='20' onclick="changeColor();">
                    <img class='smileys' id='smileys' title="Smileys" height='20' width='20' onclick="showEmoIcons();"> 
					<span id="myNick" class="nick" onclick="changeNipckPopUp()"> </span>
                    <div class="input_wrap"><textarea class="inp" id="textInput" maxlength="500" onkeyup="chngColorOnEnter(event)"></textarea> </div>
                    <div class="input_tools"></div>
                </div>
				
				<div id="joinChan">
					<input type="text" placeholder="Enter Channel" class="inp">
					<input type="button" class="btn" value="Join" onclick="joinChannel()">
					<input type="button" class="btn" value="Cancel" onclick="cancelChannel()">
				</div>
				
				<div id="changeNick">
					<input type="text" placeholder="Enter Nick" class="inp">
					<input type="button" class="btn" value="Change" onclick="changeNick()">
					<input type="button" class="btn" value="Cancel" onclick="cancelChngeNick()">
				</div>
				
				<div id="color-container">
					<div class="color-picker" id="color-picker">
						<h4>Font Colors</h4>
						<span id="foreground-color" data-val="1" class="BG1"></span>
						<ul id="foreground-color-buttons">
							<li><a  onclick="chngeForeColor(0)"><span class="BG0"></span></a></li>
							<li><a  onclick="chngeForeColor(1)"><span class="BG1"></span></a></li>
							<li><a  onclick="chngeForeColor(2)"><span class="BG2"></span></a></li>
							<li><a  onclick="chngeForeColor(3)"><span class="BG3"></span></a></li>
							<li><a  onclick="chngeForeColor(4)"><span class="BG4"></span></a></li>
							<li><a  onclick="chngeForeColor(5)"><span class="BG5"></span></a></li>
							<li><a  onclick="chngeForeColor(6)"><span class="BG6"></span></a></li>
							<li><a  onclick="chngeForeColor(7)"><span class="BG7"></span></a></li>
							<li><a  onclick="chngeForeColor(8)"><span class="BG8"></span></a></li>
							<li><a  onclick="chngeForeColor(9)"><span class="BG9"></span></a></li>
							<li><a  onclick="chngeForeColor(10)"><span class="BG10"></span></a></li>
							<li><a  onclick="chngeForeColor(11)"><span class="BG11"></span></a></li>
							<li><a  onclick="chngeForeColor(12)"><span class="BG12"></span></a></li>
							<li><a  onclick="chngeForeColor(13)"><span class="BG13"></span></a></li>
							<li><a  onclick="chngeForeColor(14)"><span class="BG14"></span></a></li>
							<li><a  onclick="chngeForeColor(15)"><span class="BG15"></span></a></li>
						</ul>
						<h4>Background Colors</h4>
						<span id="background-color" data-val="none" class="none"></span>
						<ul id="background-color-buttons">
							<li><a  onclick="chngeBgColor('none')"><span class="none"></span></a></li>
							<li><a  onclick="chngeBgColor(1)"><span class="BG1"></span></a></li>
							<li><a  onclick="chngeBgColor(2)"><span class="BG2"></span></a></li>
							<li><a  onclick="chngeBgColor(3)"><span class="BG3"></span></a></li>
							<li><a  onclick="chngeBgColor(4)"><span class="BG4"></span></a></li>
							<li><a  onclick="chngeBgColor(5)"><span class="BG5"></span></a></li>
							<li><a  onclick="chngeBgColor(6)"><span class="BG6"></span></a></li>
							<li><a  onclick="chngeBgColor(7)"><span class="BG7"></span></a></li>
							<li><a  onclick="chngeBgColor(8)"><span class="BG8"></span></a></li>
							<li><a  onclick="chngeBgColor(9)"><span class="BG9"></span></a></li>
							<li><a  onclick="chngeBgColor(10)"><span class="BG10"></span></a></li>
							<li><a  onclick="chngeBgColor(11)"><span class="BG11"></span></a></li>
							<li><a  onclick="chngeBgColor(12)"><span class="BG12"></span></a></li>
							<li><a  onclick="chngeBgColor(13)"><span class="BG13"></span></a></li>
							<li><a  onclick="chngeBgColor(14)"><span class="BG14"></span></a></li>
							<li><a  onclick="chngeBgColor(15)"><span class="BG15"></span></a></li>
						</ul>
					</div>
				</div>
				
				<div id="smiley-container">
					<div class="smiley-pages">
						<div class="smiley-page">
							<span class="add-emoticon smiley1" title=":)" onclick="addSmiley(':)')" data-text=":)"></span>
							<span class="add-emoticon smiley2" title=":3" onclick="addSmiley(':3')" data-text=":3"></span>
							<span class="add-emoticon smiley3" title=";3" onclick="addSmiley(';3')" data-text=";3"></span>
							<span class="add-emoticon smiley4" title=";)" onclick="addSmiley(';)')" data-text=";)"></span>
							<span class="add-emoticon smiley5" title="H:" onclick="addSmiley('H:')" data-text="H:"></span>
							<span class="add-emoticon smiley6" title=":(" onclick="addSmiley(':(')" data-text=":("></span>
							<span class="add-emoticon smiley7" title=";_;" onclick="addSmiley(';_;')" data-text=";("></span>
							<span class="add-emoticon smiley8" title="<3" onclick="addSmiley('<3')" data-text="<3"></span>
							<span class="add-emoticon smiley9" title=";D" onclick="addSmiley(';D')" data-text=";D"></span>
							<span class="add-emoticon smiley10" title=":P" onclick="addSmiley(':P')" data-text=":P"></span>
							<span class="add-emoticon smiley11" title=":D" onclick="addSmiley(':D')" data-text=":D"></span>
							<span class="add-emoticon smiley12" title=":S" onclick="addSmiley(':S')" data-text=":S"></span>
							<span class="add-emoticon smiley13" title=":F" onclick="addSmiley(':F')" data-text=":F"></span>
							<span class="add-emoticon smiley14" title="xP" onclick="addSmiley('xP')" data-text=":)"></span>
							<span class="add-emoticon smiley15" title=":O" onclick="addSmiley(':O')" data-text=":O"></span>
							<span class="add-emoticon smiley1" title=":)" onclick="addSmiley(':)')" data-text=":)"></span>
							<span class="add-emoticon smiley17" title=">_<" onclick="addSmiley('>_<')" data-text=">_<"></span>
							<span class="add-emoticon smiley18" title="o.0" onclick="addSmiley('o.0')" data-text="o.0"></span>
							<span class="add-emoticon smiley19" title="0.o" onclick="addSmiley('0.o')" data-text="0.o"></span>
							<span class="add-emoticon smiley20" title="XD" onclick="addSmiley('XD')" data-text="XD"></span>

						</div><!-- smiley-page -->
					</div><!-- smiley-pages -->
				</div>
				
				<div class="toolbar">
					<div class="app_tools">
						<ul class="main">
							<li class="settings"><i class="fa fa-cogs" title="Settings"></i></li>
							<li class="startup"><i class="fa fa-home" title="Home"></i></li>
						</ul>
					</div>
								
					<div class="align_tab">
						<div class="tabs" style="top: 0px; bottom: 72px;overflow-y: auto;"><ul class="connections"><li class="connection"><ul class="panellist" id="joinedChannels"></ul></li></ul><ul class="panellist applets"></ul></div>
					</div> 
								
					<div class="topic">
						<div contenteditable="true"></div>
					</div>

					<div class="status_message"></div>
				</div>
							
            </div>
			
			<div id="rightClickOptions" class="ui_menu">
				<div class="ui_menu_title" id="rightClickOptions1">Adam47nl</div>
				<div class="items" id="rightClickOptions2" style="overflow-y: auto; max-height: 425px;">
					<div class="ui_menu_content hover" id="rightClickOptions2">
						<div class="userbox" id="rightClickOptions2">
						<a class="close_menu if_op op" style="display: none;" onclick="makeOper(1)"><i class="fa fa-star"></i>Op</a>
						<a class="close_menu if_op deop" style="display: none;" onclick="makeOper(2)"><i class="fa fa-star-o"></i>De-op</a>
						<a class="close_menu if_op voice" style="display: none;" onclick="voiceDevoiceOper(1)"><i class="fa fa-volume-up"></i>Voice</a>
						<a class="close_menu if_op devoice" style="display: none;" onclick="voiceDevoiceOper(2)"><i class="fa fa-volume-off"></i>De-voice</a>
						<a class="close_menu if_op kick" style="display: none;" onclick="kickNickIrc()"><i class="fa fa-times"></i>Kick</a>
						<a class="close_menu if_op ban" style="display: none;" onclick="banNickIrc()"><i class="fa fa-ban"></i>Ban</a>

						<a class="close_menu query" onclick="showSndMsgPrvt()"><i class="fa fa-comment"></i>Message</a>
						<a class="close_menu info" onclick="whoisSelectedNick()"><i class="fa fa-info-circle"></i>Info</a>
						<a class="close_menu ignore" onclick="ignoreHim()"><input type="checkbox"><label><i></i>Ignore</label></a>
						</div>
					</div>
				</div>
			</div>
		
        </div>
		
		<!--
		<li class="alert_activity"><span>#35+</span><div class="activity">2</div></li><li class="alert_activity"><span>#ask</span><div class="activity">2</div></li><li class="alert_activity"><span>#carsaf.nl</span><div class="activity">1</div></li><li class="active"><span>#EZZ</span><div class="activity zero">0</div><span class="part fa fa-nonexistant"></span></li><li class="alert_activity"><span>#gurbet</span><div class="activity">1</div></li><li class="alert_activity"><span>#hollanda</span><div class="activity">3</div></li><li class="alert_activity"><span>#radyo</span><div class="activity">70</div></li><li class="alert_activity"><span>#sohbet</span><div class="activity">1</div></li><li class="alert_activity"><span>#yarisma</span><div class="activity">139</div></li>
		-->
   

<script>
		//my modified code...
	
		function mkAlert()
		{
			alert('d');
		}
			
		//setTimeout(function(){translatePage();},500);
		setTimeout(function(){$("#server_select_nick").val("");},250);
		
	function translatePage()
	{	
		$(".jChannel").attr("title",language["Settings"][$(".jChannel").attr("title")]);
		$(".sndMsgPrvt").attr("title",language["Settings"][$(".sndMsgPrvt").attr("title")]);
		$(".editName").attr("title",language["Settings"][$(".editName").attr("title")]);
		$(".infoChannel").attr("title",language["Settings"][$(".infoChannel").attr("title")]);
		$(".exitChannel").attr("title",language["Settings"][$(".exitChannel").attr("title")]);
		$(".settingsChannel").attr("title",language["Settings"][$(".settingsChannel").attr("title")]);
		$(".clearText").attr("title",language["Settings"][$(".clearText").attr("title")]);		
		$(".infoChannel").attr("title",language["Settings"][$(".infoChannel").attr("title")]);
		$(".kickOut").attr("title",language["Settings"][$(".kickOut").attr("title")]);	
		$(".mute").attr("title",language["Settings"][$(".mute").attr("title")]);
		$(".closemsgs").attr("title",language["Settings"][$(".closemsgs").attr("title")]);
		
		$(".txtColor").attr("title",language["Settings"][$(".txtColor").attr("title")]);
		$(".smileys").attr("title",language["Settings"][$(".smileys").attr("title")]);	
		$(".full_screen_icon").attr("title",language["Settings"][$(".full_screen_icon").attr("title")]);
		$(".close_icon1").attr("title",language["Settings"][$(".close_icon1").attr("title")]);
		$(".commands").attr("title",language["Settings"][$(".commands").attr("title")]);
		
		$(".menuOptions").each(function(index,element)
		{			
			$(element).html(language["Settings"][$(element).html()]);
		});
		$("#server_select_nick").val("");
	}
	
	function kickHimeOut()
	{
		var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/kick "+nickName);
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function pingSelectedNick()
	{
		var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/ping "+nickName);
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function versionSelectedNick()
	{
		//var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/version");
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function dateSelectedNick()
	{
		//var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/date");
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	
	
	function privateMsgSelectedNick()
	{	
		var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/query "+nickName);
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function closeActiveWindow()
	{
		/*var windowName=$(".activeChannel").text();
		
		windowName=windowName.substr(0,windowName.indexOf("#",1));
		
		console.log(windowName);*/
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/part");
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
		
	}
	
	function closePrivateMsg()
	{
		var prevVal=$(".inp").val();
			
		$(".inp").val("/leave");
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function joinChanPopUp()
	{
		$("#changeNick").hide(10);
	
		$("#joinChan .inp").val("");
		$("#joinChan").show(10);
		$("#joinChan .inp").show(150);
		$("#joinChan .inp").attr("placeholder","Enter Channel");
		$("#joinChan .btn").show(150);
	}
	
	function blockSelectedNick()
	{
		var nickName=$("li.nickSelected .nick .nickName").text();
		
		var prevVal=$(".inp").val();
			
		$(".inp").val("/ignore "+nickName);
			
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
			
		$(".inp").val(prevVal);
	}
	
	function changeNipckPopUp()
	{	
		$("#joinChan").hide(10);
		
		$("#changeNick .inp").val("");
		$("#changeNick").show(10);
		$("#changeNick .inp").show(150);
		$("#changeNick .inp").attr("placeholder","Enter Nick");
		$("#changeNick .btn").show(150);
	}
	
	function cancelChngeNick()
	{
		$("#changeNick").hide(150);
		$("#changeNick .inp").hide(150);
		$("#changeNick .btn").hide(150);
	}

	function cancelChannel()
	{
		$("#joinChan").hide(150);
		$("#joinChan .inp").hide(150);
		$("#joinChan .btn").hide(150);
	}
	
	function joinChannel2()
	{
		var channel=$("#joinChan .inp").val();
		
		if(channel!=="")
		{		
			$("#joinChan").css("background","#000");
			
			var prevVal=$(".inp").val();
			
			$(".inp").val("/join #"+channel);
				
			var e = $.Event('keydown', { keyCode: 13 });
			$('.inp').trigger(e);
				
			$(".inp").val(prevVal);
			
			$("#joinChan").hide(150);
			$("#joinChan .inp").hide(150);
			$("#joinChan .btn").hide(150);
			
		}
		
		else
		{
			$("#joinChan").css("background","#EC0202");
		}
	}
	
	function kickSelectedNick()
	{
		var nickName=$("li.nickSelected .nick .nickName").text();
			
		var prevVal=$(".inp").val();
				
		$(".inp").val("/kick "+nickName);
				
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
				
		$(".inp").val(prevVal);
			
	}
	
	function banSelectedNick()
	{
	
		var nickName=$("li.nickSelected .nick .nickName").text();
			
		var prevVal=$(".inp").val();
				
		$(".inp").val("/ban "+nickName);
				
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
				
		$(".inp").val(prevVal);
	}
	
	
	var full=0;
	function make_FullScreen()
	{
		if(full==0)
		{
			$("#kiwi").css({"width":"100%","display":"inherit"});
			$("#kiwi").css({"width":"102.2%","left":"-0.7%"});
			$(".panel-header1").css({"width":"98%","top":"0px"});
			$(".panel-header-settings").css({"width":"98%","top":"0px"});
			
			$(".full_screen_icon").addClass("small_screen_icon");
			
			if($(".close_icon1").hasClass("privateMsgPerson"))
			{
				$(".messages").css({"width":"98%","top":"0px","height": "473px"});
			}
			else
			{
				$(".messages").css({"width":"79.9%","top":"0px","height": "473px"});
			}
			
			$(".controlbox").css({"width":"98%"});
			$(".tabs").css({"width":"100%"});
			$(".nick").css({"border":"none"});
			$("#kiwi .right_bar").css({"left":"80.65%","width": "18%","max-width":"none","margin-top":"57px","height":"473px"});
			$(".memberlists").css({"height": "457px"});
			
			if($("#kiwi .right_bar").hasClass("addDisplayNone"))
			{
				$("#kiwi .right_bar").css({"display":"none"});
				$(".messages").css({"width":"98%"});
			}
			else
			{
				$("#kiwi .right_bar").css({"display":"block"});
			}
				
			full=1;
			
			//for making height 100% fully cover
			
			$("#kiwi .panels").css({"top":"-25px"});
			$("#kiwi .controlbox").css({"top":"0px"});
			$("#kiwi .panel").css({"height":"513px"});
			$("#kiwi .right_bar").css({"height":"513px"});
			$("#kiwi .memberlists").css({"height":"497px"});
			$(".messages").css({"height":"513px"});
			
			/*$("#kiwi").css({"height":"100%"});
			$("#kiwi .panels").css({"height":"90%","top":"-4%"});
			$(".panel-header1").css({"height":"5%"});
			$(".panel-header-settings").css({"height":"4.5%"});
			$("#kiwi .channel_tools").css({"height":"100%"});
			$("#kiwi .right_bar").css({"height":"85%","top":"0px"});
			$("#kiwi .memberlists").css({"height":"97%"});
			$("#kiwi .panel").css({"height":"85%"});
			$(".messages").css({"height":"100%"});
			$("#kiwi .controlbox").css({"top":"-5%","height": "10%"});
			$("#kiwi .align_tab").css({"height":"100%"});
			$("#kiwi .toolbar .tabs").css({"height":"100%"});
			$("#kiwi .controlbox .input").css({"height":"40%"});
			$("#kiwi .toolbar").css({"height":"65%","box-shadow":"none"});
			$("#kiwi .controlbox .input").css({"height":"40%"});*/

		}
		
		else
		{
			$("#kiwi").attr({"style":""});
			$("#kiwi").css({"width":"1013px","left":"initial","display":"inherit"});
			$(".panel-header1").attr({"style":""});
			$(".panel-header-settings").attr({"style":""});
			
			$(".full_screen_icon").removeClass("small_screen_icon");
			
			if($(".close_icon1").hasClass("privateMsgPerson"))
			{
				$(".messages").css({"width":"98%","top":"14px","height": "461px"});
				$(".panel-header-settings").css({"width":"98%","top":"14px"});
			}
			else
			{
				$(".messages").attr({"style":""});
			}
			
			$(".controlbox").attr({"style":"display:block;"});
			$(".tabs").attr({"style":"width: 100%; top: 0px; bottom: 72px;"});
			$(".nick").attr({"style":""});
			$("#kiwi .right_bar").attr({"style":"top: 0px; bottom: 72px;"});
			$(".memberlists").attr({"style": ""});
			
			$(".panel-header-settings").css("display","inherit");
			$(".panel-header1").css("display","inherit"); 
			$(".right_bar").css("opacity","1");
			
			if($("#kiwi .right_bar").hasClass("addDisplayNone"))
			{
				$("#kiwi .right_bar").css({"display":"none"});
				$(".messages").css({"width":"98%"});
			}
			else
			{
				$("#kiwi .right_bar").css({"display":"block"});
			}
			
			$("#kiwi .panels").css({"top":"0px"});
			$("#kiwi .controlbox").css({"top":"23px"});
			$("#kiwi .panel").css({"height":"475px"});
			$("#kiwi .right_bar").css({"height":"461px"});
			$("#kiwi .memberlists").css({"height":"444px"});
			$(".messages").css({"height":"460px"});
									
			full=0;
		}
	}
	
	function inviteSelectedNick()
	{
		var nickName=$("li.nickSelected .nick .nickName").text();
			
		var prevVal=$(".inp").val();
				
		$(".inp").val("/invite "+nickName);
				
		var e = $.Event('keydown', { keyCode: 13 });
		$('.inp').trigger(e);
				
		$(".inp").val(prevVal);
	}
	
	function muteOrUnmute()
	{
		var voicedorDevoiced=$("li.nickSelected .nick .nickName").attr("data-voice");
		
		if(!(voicedorDevoiced)||voicedorDevoiced=="voice")
		{
			$("li.nickSelected .nick .nickName").attr("data-voice","devoice");
			var nickName=$("li.nickSelected .nick .nickName").text();
			
			voiceDevoiceOper(2);
			
			$("li.nickSelected").css("background","rgb(255, 80, 80)"); 
			$("li.nickSelected").addClass("devoice");
			$("li.nickSelected .nick").css("color","#fff"); 
		}
		
		else
		{
			$("li.nickSelected .nick .nickName").attr("data-voice","voice");
			var nickName=$("li.nickSelected .nick .nickName").text();
			
			voiceDevoiceOper(1);
			
			$("li.nickSelected").css("background","#fff"); 
			$("li.nickSelected").removeClass("devoice");
			$("li.nickSelected .nick").css("color","#000"); 
		}
	}
	
	function toggleRightBar()
	{    
		if($("#kiwi .right_bar").hasClass("addDisplayNone"))
		{
			$("#kiwi .right_bar").removeClass("addDisplayNone");
			$("#kiwi .messages").removeClass("noWChnge");
			$("#kiwi .right_bar").show(150);
			$(".close_icon1").removeClass("close_icon1_img");
			$("#kiwi .messages").css({"width": msg_width+"%","border-right-style": "none"});
		}
		
		else
		{
			$("#kiwi .right_bar").addClass("addDisplayNone");
			$("#kiwi .messages").addClass("noWChnge");
			$("#kiwi .right_bar").hide(150);
			$(".close_icon1").addClass("close_icon1_img");
			$("#kiwi .messages").css({"width": "98%", "border-right": "1px solid #C4C4C4","border-right-style": "solid"});
		}
	}
 
		$(window).resize(function() {
			if($(this).width()<=675)
			{
				msg_width=98;
				$("#kiwi .right_bar").addClass("addDisplayNone");
				$("#kiwi .right_bar").css("display","none");
				$("#kiwi .messages").css({"width": "98%"});

			}
			else
			{
				if(!$(".close_icon1").hasClass("privateMsgPerson"))
				{
					msg_width=79.9;
					$("#kiwi .right_bar").removeClass("addDisplayNone");
					$("#kiwi .messages").css({"width": msg_width+"%"});
					$("#kiwi .right_bar").show(150);
				}
			}
			//console.log($(this).height());
		});
		
		$(document).ready(function(){
			$(document).on("click","#kiwi .memberlists > div.active ul li",function(){$("#kiwi .memberlists > div ul li").removeClass("nickSelected");$(this).addClass("nickSelected");});
			
			$('body').click(function(evt){    
					
					if(evt.target.id == "smiley-container"||evt.target.id=="smileys"||evt.target.id == "color-container"||evt.target.id=="txtColor"||evt.target.id == "color-picker"||evt.target.id == "rightBar"||evt.target.id == "rightClickOptions"||evt.target.id == "rightClickOptions1"||evt.target.id == "rightClickOptions2")
					{
					  return 0;
					}  
					
					if($(evt.target).closest('#color-container').length||$(evt.target).closest('#smiley-container').length)
					{
					  return 0;    
					}
					else
					{
					  $("#smiley-container").hide(150);
					  $("#color-container").hide(150);
					  $("#kiwi .ui_menu").hide(50);
					}
				   //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
				  
				  //Do processing of click event here for every element except with id menu_content

			});
			
		
  
  
  $('.memberlists').bind('contextmenu', function(e) {
    return false;
}); 

	$(document).on("dblclick",".memberlists ul .mode",function(){
			showSndMsgPrvt();
	});
	
  $(document).on("mousedown",".memberlists ul .mode",function(e){ 
  
		$(".memberlists ul .mode").removeClass("nickSelected");
		
		$(this).addClass("nickSelected");
		
			if( e.button == 2 ) { 
				
				var nickShow=$(".nickSelected .nickName").html();
				
				var ignore=$(".nickSelected").hasClass("ignoreHim");
				
				if($("#myNick").html().match("@"))
				{
					$("#rightClickOptions a.close_menu.if_op.op").css("display","block");
					$("#rightClickOptions a.close_menu.if_op.deop").css("display","block");
					$("#rightClickOptions a.close_menu.if_op.voice").css("display","block");
					$("#rightClickOptions a.close_menu.if_op.devoice").css("display","block");
					$("#rightClickOptions a.close_menu.if_op.kick").css("display","block");
					$("#rightClickOptions a.close_menu.if_op.ban").css("display","block");
				}
				
				else
				{
					$("#rightClickOptions a.close_menu.if_op.op").css("display","none");
					$("#rightClickOptions a.close_menu.if_op.deop").css("display","none");
					$("#rightClickOptions a.close_menu.if_op.voice").css("display","none");
					$("#rightClickOptions a.close_menu.if_op.devoice").css("display","none");
					$("#rightClickOptions a.close_menu.if_op.kick").css("display","none");
					$("#rightClickOptions a.close_menu.if_op.ban").css("display","none");
				}
				//alert(ignore);
				if(ignore==true)
				{
					$("#rightClickOptions input[type='checkbox']").prop("checked",true);
				}
				else
				{
					$("#rightClickOptions input[type='checkbox']").prop("checked",false);
				}
				
				$("#rightClickOptions").css( {"display":"block","position":"absolute", "top":e.pageY, "left": $(".right_bar").position().left});
		  
				$("#rightClickOptions .ui_menu_title").html(nickShow);
				
				//return false; 
			} 
			//return true; 
		}); 

	});
	
	
</script>

<script src="js/jsocket.js" type="text/javascript"></script>
<script src="js/irc.protocol.js" type="text/javascript"></script>
<script src="script.js" type="text/javascript"></script>
<script src="scriptFunctions.js" type="text/javascript"></script>
	
<script>

//$("#text").val($("#text").val() + "\nConnected and joined #EZZ");

//setTimeout(function() {
	//$("#text").val($("#text").val() + "\nSending a message");
	
	//irc.joinChannel(Channels);
	//setTimeout(function(){irc.message("#EZZ", "Hello!");console.log("join");},2000);
//}, 15000);

<?php 

if(isset($userName)): 

?>

irc.connect("<?php echo $userName; ?>", "#EZZ");

<?php

else:

?>

window.location=".";

<?php

	endif;
?>

	

</script>

</body>
</html>
