<!doctype html>
<html>
<head>
<link rel="icon" href="img/keys.png">
<meta charset="utf-8">
<title>Turning Grille</title>
</head>
<body bgcolor="FBFCDD">
	<div name="Form" align="center" style="width: 80%; margin-left: 5%;">
		<h1>The Turning Grille</h1>
	<h4>NOTE:if text is longer than 16 letter takes first 16 character.(Max Entry is 40)<br>
		if text is shorter than 16 put X letter to the end.<br> 
		You can try this message "GTYJOIROEUBDIATD".</h4>
	<form action="" method="post">
		<table border="0" width="400" align="center">
			
			<tr>
				<td align="center">
					<input type="text" maxlength="40" name="normaltext" id="normaltext" width="200">
				</td>
			</tr>
			<tr>
				<td  align="center">
					<input type="submit" name="decrypt" value="Decrypt">
					<input type="submit" name="encrypt" value="Encrypt">
				</td>
			</tr>
			<tr>
				<td align="center" height="50px"><?php require("Turning-Grille-Processor.php") ?></td>
			</tr>
		</table>
	</form>
	</div>
	<div name="Feautres" style="width: 80%; margin-left: 5%;text-align: left;">
		You can encrypt and decrypt deeper layers with following order of process. 
		<table border="0">
		<tr>
			<td width="200">a</td>
			<td width="200">b</td>
		</tr>
		</table>
	</div>
	<div name="Content" style="width: 80%; margin-left: 5%;text-align: left;">
	<p>
	Mathias Sandorf is the main character of Jules Verne's roman (whose books are extremely
	popular in the Czech Republic). Mathis was a Hungarian patriot who was preparing an
	uprising of his people against Austrians. He was a member of an underground movement
	and he exchanged messages with other members using homing pigeons. These messages
	were encrypted using a rotating grille.<br><br>

	This is how the grille works. Let's encrypt a text "MEET YOU TOMORROW". We are going
	to use a square grille with 16 fields. The grille has 4 holes as you can see at the picture
	below.<br><br>

	To encrypt a message, we write the first four characters of the message to the holes in the
	grille. Then we rotate the grille clock-wisely and we write the other four characters in the
	holes. Then we rotate the grille to times more to write all characters in the message. The
	output text is in a square matric and we can rewrite it to the row.<br>

	</p>
	<img src="img/output-onlinepngtools.png" style="margin-left: 7%">
	</div>


</body>
</html>