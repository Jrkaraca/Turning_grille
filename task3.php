<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Turning Grille</title>
</head>
<body>
<?php
	$Virtual_Stencil_Lines = array 
		 (
			array  (1,0,0,0,
					0,0,1,0,
					1,0,0,0,
					0,1,0,0),
		 	array  (0,1,0,1,
					1,0,0,0,
					0,0,1,0,
					0,0,0,0),
			array  (0,0,1,0,
					0,0,0,1,
					0,1,0,0,
					0,0,0,1),
			array  (0,0,0,0,
					0,1,0,0,
					0,0,0,1,
					1,0,1,0)
		 );	
	$Private_Key_Square = array 
					(0,6,8,13,
					1,3,4,10,
					2,7,9,15,
					5,11,12,14);
	/*$Private_Key = array 
		 (
			array  (1,0,0,0,
					2,4,0,0,
					3,0,0,0,
					0,0,0,0),
		 	array  (0,7,0,0,
					0,0,5,0,
					0,8,0,0,
					6,0,0,0),
			array  (0,0,9,0,
					0,0,0,11,
					0,0,10,0,
					0,12,0,0),
			array  (0,0,0,14,
					0,0,0,0,
					0,0,0,16,
					0,0,13,15)
		 );	*/
		 $Stencil_Hole_Number;
		 $CipherText;
		 $New_Text_Count = 0;
		 $Virtual_Stencil_Rotate;
	
	 if (isset($_POST['decrypt'])) 
	 {
		 $Text = $_POST["normaltext"];
		 $Triemmed_Text = preg_replace('/\s+/', '', $Text);
		 $Text_Length = strlen($Triemmed_Text);
		 
		 echo "Lenght Of Text: ".$Text_Length."</br>";
		 echo "Count Of Spaces: ".substr_count($Text, ' ')."</br>";
		 $Text_Array= str_split($Triemmed_Text);
		 
		 if($Text_Length>16)
			 {
				 while($Text_Length>16)
				 {
					 unset($Text_Array[$Text_Length-1]);
					 $Text_Length --;
				 }
			 }
		 
		 echo implode(" ",$Text_Array)."</br>";
		 
				$Index_Letter=0;
				$Count_Rotate=0;
				$Count_Stencil_Line=0;
				 while($Index_Letter<=15)
				 	{
						//which line will be looking for
						while($Count_Rotate<=3)
						{
								//which letter will be placed
								while($Count_Stencil_Line<=15)
								{
									if($Virtual_Stencil_Lines[$Count_Rotate][$Count_Stencil_Line]==1)
									{
										$Pointing_Letter=strtoupper($Text_Array[$Count_Stencil_Line]);
										$CipherText[$Count_Stencil_Line] = $Pointing_Letter;
										$Count_Stencil_Line++;
										$Index_Letter++;
										echo "1";
									}
									else
									{
									$Count_Stencil_Line++;
									echo "0";
									}
									if($Count_Stencil_Line>=16){$Count_Rotate++;}
								}
							$Count_Stencil_Line = 0;
							echo "</br>".$Count_Rotate."</br>";
						 }
					 echo "Done</br>";
					}
		 $implodedtext=implode(" ",$CipherText);
	 }
	
		
		 	if (isset($_POST['encrypt'])) 
			 {	
		 $Text = $_POST["normaltext"];
		 $Triemmed_Text = preg_replace('/\s+/', '', $Text);
		 $Text_Length = strlen($Triemmed_Text);
		 
		 echo "Lenght Of Text: ".$Text_Length."</br>";
		 echo "Count Of Spaces: ".substr_count($Text, ' ')."</br>";
		 $Text_Array= str_split($Triemmed_Text);
		 
		 if($Text_Length>16)
			 {
				 while($Text_Length>16)
				 {
					 unset($Text_Array[$Text_Length-1]);
					 $Text_Length --;
				 }
			 }
		 echo implode(" ",$Text_Array);
		 echo "</br>";
				/*$Is_It_Here=0;
				$Where_Suppose_ToBe=0;*/
				$Line=0;
				$Letter=0;
				$count=0;
				$count_Actual=0;
				$Position=0;
				$New_Position=0;
				$New_Line=0;
				$New_Column=0;
				$Array_On_Two_D=array(array());
				while($Line<=3)
				{
					//counting letters one by one
					while($Letter<=3)
					{ 
						$Position=$Line+$Letter;
						for($New_Line;$New_Line<=3;$New_Line)
						{
							for($New_Column=$count;$New_Column<=15;$New_Column++)
							{
								
								if($Virtual_Stencil_Lines[$New_line][$New_Column]==1)
								{
									$CipherText[$New_Column]=$Text_Array[$Position];
									$count=$New_Column;
									$Letter++;
									echo "1";
									if($letter>3)
									{
										echo "5";
										echo "</br>";
										$Line++;
										$count=0;
									}
									
								}
								else
								{
									echo "2";
									$New_Column++;
									if($New_Column>15)
									{
										echo "3";
										$New_Line++;
										$count = 0;
									}
								}
							}
							
						}
					}
				}
				
				/*
				$Index_Letter=0;
				$Count_Rotate=0;
				$Count_Stencil_Line=0;
				 while($Index_Letter<=15)
				 	{
						//which line will be looking for
						while($Count_Rotate<=3)
						{
								//which letter will be placed
								while($Count_Stencil_Line<=15)
								{
									if($Virtual_Stencil_Lines[$Count_Rotate][$Count_Stencil_Line]==1)
									{
										$Pointing_Letter=strtoupper($Text_Array[$Count_Stencil_Line]);
										$CipherText[$Count_Stencil_Line] = $Pointing_Letter;
										$Count_Stencil_Line++;
										$Index_Letter++;
										echo "1";
									}
									else
									{
									$Count_Stencil_Line++;
									echo "0";
									}
									if(($Count_Stencil_Line%4) == 0)
									{echo "</br>";}
									if($Count_Stencil_Line>=16){$Count_Rotate++;}
								}
							$Count_Stencil_Line = 0;
							echo "</br>2</br>";
						 }
					 echo "3</br>";
					}*/
			 }
		 $implodedtext=implode(" ",$CipherText);
	
?>
	<form action="" method="post">
		<table border="1" width="400" align="left">
			
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
				<td align="center" height="50px">	
					<?php if(isset($_POST)){echo $implodedtext;}?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>