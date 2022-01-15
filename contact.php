<?php include 'inc/header.php' ?>

<html>
<head>
    <title>Contact</title>
</head>
<body>
	<div class="main">
		<div class="roww">
			<img class="column1" src="images/contactt.png" alt="" style="width:230px; padding:30px;">
			<div class="column2">
				<h3>Live Support</h3>
				<p><span>24 hours | 7 days a week | 365 days a year</span></p>
				<p> Everything begins with a single message. After that, our company delivers a very authentic and innovative experience to keep our customers finding their way back. Threaded messages, history, and client context give our company the entire data it requires to understand clients better and assist them.</p>
				<p>Live Support helps make online messaging an easy task to be able to enable you to connect, convert, and maintain bonds with every customer that comes to us - regardless of the browser or device.</p>
			</div>
		</div>
	</div>
    <div class="row2">
		<div class="contactt">
			<h2>Contact Us</h2>
			<form method="post" action="contact.php">
				<div>
					<br><span><label>NAME</label></span>
					<span><input type="text" value="" required></span>
					</div>
					<div>
						<br><span><label>E-MAIL</label></span>
					<span><input type="text" value="" required></span>
					</div>
					<div>
						<br><span><label>MOBILE NUMBER</label></span>
					<span><input type="text" value="" required></span>
					</div>
					<div>
						<br><span><label>SUBJECT</label></span>
					<br><span><textarea> </textarea></span>
					</div>
					<div>
						<br><span><input type="submit" value="SEND" class="button" action="successcontact.php" onclick="sent()"></span>
				</div>
			</form><br><br>
		</div>
  	</div>
	<div class="contacttt">
    	<div class="company_address"><br>
		    <h2>Informations about us:</h2><br>
			<p>Str. Teodor Mihali, Cluj Napoca</p>
		   	<p>Romania</p>
			<p>Phone: +0040753479397</p>
	   		<p>Fax: +0040753479397</p>
			<p>Email: <a href="mailto:comanpatricia27@gmail.com" style="color:orange">comanpatricia27@gmail.com</a></p>
	   		<p>Follow on: <a href="https://www.facebook.com/coman.patricia" style="color:orange">Facebook</a> | <a href="https://www.instagram.com/coman.patricia/" style="color:orange">Instagram</a></p>
		</div>
	</div>
	</div>    	
</body>

<style>
main{
	width: 100%;
}
.roww, .row2{
	padding: 40px;
}

.column1 {
  float: left;
  width: 30%;
  margin-left:60px;
}

.column2 {
  float: left;
  width: 70%;
}

.contactt{
	float: left;
    margin-left: 290px;
    margin-right: 120px;
    text-align:center;
    text-align: justify;
    text-justify: inter-word;
    color: black;
	width: 350px
}

.contacttt{

    margin-left: 325px;
    margin-right: 120px;
    text-align:center;
    text-align: justify;
    text-justify: inter-word;
    color: black;
	width: 350px
}
/* Clear floats after the columns */
.roww:after {
  content: "";
  display: table;
  clear: both;
}

input[type=text]{
	border:none;
	border-bottom: 2px solid black;
	width:350px;
}
input[type=text]:focus {
  background-color: #fcc98b;
}

textarea {
  width: 350px;
  height: 150px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
}

.button {
  background-color: black;  
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.8s;
  cursor: pointer;
  border-radius: 8px;
}

.button:hover {
  background-color: orange;
  color: black;
  text-decoration: none;
}
</style>

<script>
function sent() {
  alert("Thank you for your interests! Your message was sent");
}
</script>
</html>
<?php include 'inc/footer.php' ?>
