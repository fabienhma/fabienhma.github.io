<div class = "sitetext">
		<script type ="text/javascript">
    
    var CCOUNT;
    var t, count;
    function cddisplay() {
        // displays time in span
        var seconds, minutes;
        minutes = parseInt(count / 60, 10);
		seconds = parseInt(count % 60, 10);

		minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        document.getElementById('timer').innerHTML = minutes + ":" + seconds;
    };
    
    function countdown() {
        // starts countdown
       	if(!CCOUNT){
       		CCOUNT=+60*document.getElementById('input1').value;
       		count = CCOUNT;
       	}
       	cddisplay();
       	document.getElementById("freewrite").focus();
        if (count == 0) {
            alert("Time's up! Finish your sentence and hit 'DONE!'")
            cdreset();
        } else {
            count--;
            t = setTimeout("countdown()",1000)
        }
    };
    
    function cdpause() {
        // pauses countdown
        clearTimeout(t);
    };
    
    function cdreset() {
        // resets countdown
        cdpause();
        count = CCOUNT;
        cddisplay();
    };

    function timerupdate(){
    	CCOUNT = +60*document.getElementById('input1').value;
    	cdreset();
    }
    
</script>
	
		<input type="text" class = "button" id="input1" value = "15" placeholder="Time in minutes"/>
		<input type="button" class = "button" value="Update" onclick="timerupdate()"></input>
		<div id="timer"></div>
		<input type="button" class = "button" value="Start" onclick="countdown()">
		<input type="button" class = "button" value="Stop" onclick="cdpause()">
		<input type="button" class = "button" value="Reset" onclick="cdreset()">
	<form action="freewrite.php" method="post">	
		<fieldset style = "text-align:center">
			<div>
            	<input id="center" autofocus name="subject" 
                placeholder= <?php 
                    $word = query("SELECT word FROM wordbank ORDER BY RAND() LIMIT 1");
                    echo $word[0]["word"]; ?> 
                    type="text" required>   
                </input>
            </br>
                (To get another word, refresh the page)
                            </div>
                            
                            <textarea id="freewrite" rows="30" cols="129" name="txtarea" placeholder="Begin Writing..." ></textarea>
                            <div>
                                <button class="button" type="submit" class="btn btn-default">Done!</button>
                            </div>
		</fieldset>
		
	</form>