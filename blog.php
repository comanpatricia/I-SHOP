<!DOCTYPE html>
<head>
    <meta chaarset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Blog</title>
    <link rel="shortcut icon" href="images/icon.jpg"/>
</head>

<body>
    <section>
        <img src="images/dd.png" id="dd">
        <img src="images/tt.png" id="tt">
        <img src="images/rr.png" id="rr">
        <img src="images/ee.png" id="ee">
        <img src="images/qq.png" id="qq">
        <img src="images/s.png" id="s">
        <img src="images/ff.png" id="ff">
        <h2 class="myDIV" id="text">I-SHOP</h2>
    </section>

    <script type="text/javascript">
        let dd = document.getElementById("dd");
        let tt = document.getElementById("tt");
        let rr = document.getElementById("rr");
        let ee = document.getElementById("ee");
        let qq = document.getElementById("qq");
        let s = document.getElementById("s");
        let ff = document.getElementById("ff");
        let text = document.getElementById("text");
    
        window.addEventListener('scroll', function(){
            var value = window.scrollY;
    
            dd.style.top = value * 0.5 + 'px';
            tt.style.left = -value * 0.15 + 'px';
            rr.style.left = -value * 0.5 + 'px';
            ee.style.top = -value * 0.15 + 'px';
            qq.style.top = value * 0.9 + 'px';
            s.style.left = -value * 0.5 + 'px';
            ff.style.top = value * 0.5 + 'px';
            text.style.top = -value * 1 + 'px';
        })
        
    </script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60af1d1b0c989f0011cc7d08&product=sticky-share-buttons" async="async"></script>
    
<br>
<div class="sharethis-sticky-share-buttons"></div>
<h2> WHAT ARE YOU NATURALLY DRAWN TO  </h2>
<p>To begin to understand the foundation of your closet, you need to first take a look at what you’re actually wearing daily. Which items seem to pop up time and time over? I’ve found that a useful method of keeping tabs is to journal or note down your outfits over a two-week period. Is there a certain item(s) or style(s) that reigns supreme? These will be your building blocks. The basics of your wardrobe. And quite often, they’re truly quite basic. White tee. Cotton poplin shirt. Straight leg jeans. Cropped trousers. </p>

<h2> SEGMENTING YOUR STYLE  </h2>
<p>I consider my wardrobe to be split into three categories; Basics, Key pieces, and Accents. Basics are your building blocks. Items most people will have tucked in their closet, which either form the starting point, or complement your outfit. Key pieces are unique to you, and are items which are imbued with and reflective of your personal style. I like to think of this as particular pieces (like a b/w polka dot blouse) or in vaguer terms referencing the style (such as an oversized blazer). Accents is where all the fun happens. These are statement pieces; items that perhaps are going to get quite as much wear, and are typically worn pared back with basics.</p>

<h2>WHERE TO SPEND AND WHERE TO SAVE </h2>
<p>This isn’t the first time I’ve mentioned being prudent about where you’re “spending” on your closet. My views haven’t really changed since I first broached the topic in THIS POST. Cotton basics like shirts, t-shirts and denim are generally things I find the high street does well, and at reasonable prices. Just be sure to check the stitching for loose threads, and seams for tidy hemlines. </p>

<p>If you’re planning to spend, I find this money best spent on outerwear like a great coat, a well made blazer and/or tailoring, and a good knit made from natural fibres like wool, cashmere or cotton. I also think it’s worth spending on a good quality pair of shoes. Not necessarily designer, but a brand which is well made using natural materials.</p>

<p>Trousers are the one item where I think you can go both ways. I’ve bought some incredible quality pants from H&M (these ones I have in a few colours), COS is also a favourite but a slightly higher price point, and I personally can’t resist a brand like Acne Studios if I’m planning to splurge. </p>

<h2>SAVE STYLE REFERENCES </h2>
<p>The final tip I wanted to share today is to save your style references somewhere easy to access. These style references will be outfit combinations you’ve either found online (and are reflective of your personal style), or ones that you’ve worn or put together during a styling session playing dress ups at home. I have a folder on my phone called “Outfit Ideas”. This has been such a useful tool in staying true to my personal style and not giving in to my fantasy self. Plus, it’s a great way to feel inspired and reenergised about getting dressed on mornings where you don’t have a clue what to wear.</p>

<a class="a" href="index.php" style="  text-align: center; text-decoration:none; display:block; margin:30px 30px auto;">Go back to shopping </a>

<br><br>


    <style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Stint Ultra Condensed';
    font-size: 30px
}
body {
    background: white;
    min-height: 1500px;
}

section {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

section:before {
    content: '';
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 110px;
    background: linear-gradient(to top, white, transparent);
    z-index: 1000;
}

section:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
    mix-blend-mode: color;
}

section img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#text {
    text-shadow: 8px -5px black;
    position: relative;
    color: #fff;
    font-size: 10em;
    z-index: 1;
}

#ff {
    z-index: 2;
}

.myDIV {
  animation: mymove 5s infinite;
}

@keyframes mymove {
  50% {text-shadow: 10px 20px 30px #eb9e98;}
}

h2{
    padding:30px;
    text-align:center
}

p{
    margin-left: 120px;
    margin-right: 120px;
    text-align:center;
    text-align: justify;
    text-justify: inter-word;
    color: black;
}

button{
    align:center;
    position:relative;
}

.a:hover{
  background-color: orange;
  color: black;
  text-decoration: none;
  font-weight:bold;
}
}
    </style>
 
 </body>
 
 </html>
 