<?php include 'inc/header.php';?>
<?php include 'inc/admin_menu.php';?>
<?php include 'classes/Brand.php';?>
<html>
<head>
    <title>Customers</title>
</head>
<body>
    <br><br>
    <div class="roww">
        <div class="column">
            <div class="subtitle">Inbox Messages
                <a href="admin_inbox.php">
                    <img src="inc/img/inbox.png">
                </a>
            </div>
        </div>
        <div class="column">
            <div class="subtitle">Customer's List
                <a href="admin_customerinfo.php">
                    <img src="inc/img/cust.png" alt="" >
                </a>
            </div>
        </div>
    </div><br><br><br><br>
</body>
<style>

/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  background-color: white; 
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.roww {
    padding: 10px;
    margin-left: 36%
}

.subtitle {
    font-size: 17px;
    font-weight: bold;
    text-align: center;
}

.column {
    float: left;
    width: 200px;
    height: 100px;

}

/* Clear floats after the columns */
.roww:after {
    content: "";
    display: table;
    clear: both;
}
img {
    width: 120px;
}
</style>
</html>
<?php include 'inc/footer.php' ?>
