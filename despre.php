<?php include 'inc/header.php' ?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About us</title>
</head>
<body><br>
    <div class="row">
        <div class="column">
            <div class="parallax"></div>
        </div>
        <div class="column">
            <div class="text">
                <h3>Hi! My name is Coman Patricia-Georgiana.</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column1">
            <div class="text">
                This is the application for my license. 
            </div>
        </div>
        <div class="column">
            <div class="parallax1"></div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="parallax2"></div>
        </div>
        <div class="column">
            <div class="text">
                I-SHOP is a virtual shop exclusive for shopping lovers. 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column1">
            <div class="text">
                Enjoy it!
            </div>
        </div>
        <div class="column">
            <div class="parallax3"></div>
        </div>
    </div>
</body>

<style>
body, html {
    height: 100%;
    }

.row{
    margin-left:60px;
    margin-right:60px;
}

.column {
    float: left;
    width: 50%;
    height:500px;
    background-color: black;
    color: white;
    padding:20px
}
.column1 {
    float: left;
    width: 50%;
    height:500px;
    background-color: white;
    color: black;
    padding:60px

}

.text{
    text-align: center;
    padding:100px;
    font-size: 30px
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.parallax {
    /* The image used */
    background-image: url('images/EO0A0082cc.jpg');

    /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
.parallax1 {
  /* The image used */
    background-image: url('images/coman.jpg');

    /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.parallax2 {
  /* The image used */
    background-image: url('images/EO0A0097c.jpg');

    /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.parallax3 {
  /* The image used */
    background-image: url('images/pattri.jpg');

    /* Full height */
    height: 100%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
/* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
@media only screen and (max-device-width: 1366px) {
    .parallax {
        background-attachment: scroll;
  }
}
@media only screen and (max-device-width: 1366px) {
    .parallax1 {
        background-attachment: scroll;
  }
}
@media only screen and (max-device-width: 1366px) {
    .parallax2 {
        background-attachment: scroll;
  }
}
@media only screen and (max-device-width: 1366px) {
    .parallax3 {
        background-attachment: scroll;
  }
}

</style>
</html

<?php include 'inc/footer.php' ?>
