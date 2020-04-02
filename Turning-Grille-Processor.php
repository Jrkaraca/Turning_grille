<?php
if ($_POST)
	 {	
		/* Here we are creating Virtual Stencil "manually". I Chose this way to be sure Grille is how I would like to be. 
		It's possible create with loop or function.*/
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
		/* Here we are checking if any value is coming from form. I created script
		and form nested to test how is it working on one page. The most known and cleaner way is to post it another page and return from script to the current page*/		
	
		/* Here we took Plain text and process It on questions like: <br>
		If text has spaces => clean them
		How many letter text has without spaces?
		Create array to take letters into
		if text is longer than 16 letter take first 16 character
		if text is shorter than 16 put X letter to the end 
		And show Plain Text in the beginning to be sure
		*/
		 $Text = $_POST["normaltext"];
		 $Triemmed_Text = preg_replace('/\s+/', '', $Text);
		 $Text_Length = strlen($Triemmed_Text);
		 $Text_Array= str_split($Triemmed_Text);
		 if($Text_Length>16)
			 {
				 while($Text_Length>16)
				 {
					 unset($Text_Array[$Text_Length-1]);
					 $Text_Length --;
				 }
			 }
		 else
			  {
				 while($Text_Length<16)
				 {
					 $Text_Array[$Text_Length]="X";
					 $Text_Length++;
				 }
			 }
		 echo implode(" ",$Text_Array)."</br>";
	/*Check if the process which requested is decyrpting.Then which letter will be placed:
	if in stencil 1 (turn on) is exist algorythm is taking this number as turn on and puts there and
	searching for next hole (turned on). When the turned on values is finished in one line rotating stencil 
	to another position. Which means next line. */
	if (isset($_POST['decrypt']))
	{
				echo "<table align='center' border='0'><tr>";
				$Index_Letter=0;
				$Count_Rotate=0;
				$Count_Stencil_Line=0;
				//which letter of plain text will be taken to new place in ciphertext.
				 while($Index_Letter<=15)
				 	{
						//which line will be looking for in virtual stencil (basicly key).
						while($Count_Rotate<=3)
						{	echo "<td>";
								while($Count_Stencil_Line<=15)
								{
									if($Virtual_Stencil_Lines[$Count_Rotate][$Count_Stencil_Line]==1)
									{
										$Pointing_Letter=strtoupper($Text_Array[$Count_Stencil_Line]);
										$CipherText[$Count_Stencil_Line] = $Pointing_Letter;
										$Count_Stencil_Line++;
										$Index_Letter++;
										echo $Pointing_Letter;
									}
									else
									{
										$Count_Stencil_Line++;
										echo "..";
									}
									if(($Count_Stencil_Line%4)==0)
										{echo "</br>";}
									if($Count_Stencil_Line>=16)
									{
										$Count_Rotate++; 

									}
								}
							$Count_Stencil_Line = 0;
						 	echo "</td>";
						 }
					}
				//This loop is for showing letters on crypted text
				echo "<td>";
				$Last_View=0;
				while($Last_View<=15)
				{
					echo $CipherText[$Last_View];
					if((($Last_View+1)%4)==0)
					{ echo"</br>"; }
					$Last_View++;
				}
				$Last_View=0;
				echo "</td>";
		 echo "</tr></table>";
		//Show it from array to the text
		 echo $implodedtext=implode(" ",$CipherText);
	 }
	/*Check the process which requested is encrypting.Then which letter will be placed:
	if in stencil 1 (turn on) is exist algorythm is taking this letter which is placed here and pushing that to 
	new place in array index of where stencil had hole.Then searching for next hole (turned on). When the turned
	on values is finished in one line rotating stencil to another position. Which means next line. */
	if (isset($_POST['encrypt'])) 
	{
				echo "<table align='center' border='0'><tr>";
				$This_Letter=0;
				$Line=0;
				$Letter=0;
				$Count=0;
				$Column=0;
				/*For encrypting proces I filled indexes manually. Otherwise indexes are becoming on and on 
				result is becoming plaintext which is entered*/
				$CipherText =array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
				while($Letter<15)
				{	
					while($Line<3)
					{ 	echo "<td>";
						while($Column<=15)
						{
							if($Line>=4)
								{
									break;
								}
							if($Virtual_Stencil_Lines[$Line][$Column]==1)
								{
									$This_Letter=$Text_Array[$Count];
									$CipherText[$Column]=$This_Letter;
									$Column++;
									$Count++;
									$Letter=$Count;
									echo $This_Letter;
								}
							else
								{
									$Column++;
									echo "..";
								}
							if(($Column%4)==0)
								{
									echo "</br>";					
								}
							if($Column>15)
								{
									$Line++;
									$Column = 0;
									echo "<td>";
								}
						}
					}
				}
				echo "<td>";
				$Last_View=0;
				while($Last_View<=15)
				{
					echo $CipherText[$Last_View];
					if((($Last_View+1)%4)==0)
					{ echo"</br>";}
					$Last_View++;
				}
				$Last_View=0;
				echo "</td>";
				echo "</tr></table>";
				$implodedtext=implode(" ",$CipherText);
				echo $implodedtext;
			}
}
				?>