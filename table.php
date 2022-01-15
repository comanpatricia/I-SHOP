<?php include 'inc/header.php' ?>

<html>
<head>
    <title>Measures table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<center><br><h3>Meaures</h3></center>
<div class="measures">
    <div class="column">
        <ul class="list">
            <li><p>1. Shoulders</p>The tip of the shoulders measured at the collarbone.</li>
            <li><p>2. Chest</p>Bust circumference measured at the fullest part.</li>
            <li><p>3. Waist</p>Waist measured around the natural circumference.</li>
            <li><p>4. Outer leg</p>The outer length of the foot measured on the outside of the foot from the waist to the ankle.</li>
            <li><p>5. Hips</p>Thighs measured around the later parts.</li>
            <li><p>6. Inner leg</p>The inner length of the leg measured on the inside of the foot from the groin to the ankle.</li>
        </ul>
    </div>
    <center>
        <div class="column">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">
                        <p class="p">Size</p>
                        </th>
                        <th class="col">
                        <p>Chest circumference</p>
                        </th>
                        <th class="col">
                        <p>Waist circumference</p>
                        </th>
                        <th class="col">
                        <p>Hips circumference</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>32/XXS</td>
                        <td>74-77</td>
                        <td>61-63</td>
                        <td>83-85</td>
                    </tr>
                    <tr>
                        <td>34/XS</td>
                        <td>78-81</td>
                        <td>62-64</td>
                        <td>86-89</td>
                    </tr>
                    <tr>
                        <td>36/S</td>
                        <td>82-85</td>
                        <td>65-67</td>
                        <td>93-96</td>
                    </tr>
                    <tr>
                        <td>38/M</td>
                        <td>86-89</td>
                        <td>68-71</td>
                        <td>97-100</td>
                    </tr>
                    <tr>
                        <td>40/XL</td>
                        <td>90-93</td>
                        <td>72-75</td>
                        <td>101-104</td>
                    </tr>
                    <tr>
                        <td>42/XXL</td>
                        <td>94-97</td>
                        <td>76-79</td>
                        <td>105-107</td>
                    </tr>
                    <tr>
                        <td>44/XXL</td>
                        <td>98-101</td>
                        <td>80-84</td>
                        <td>108-112</td>
                    </tr>
                    <tr>
                        <td>46/XXXL</td>
                        <td>102-106</td>
                        <td>85-89</td>
                        <td>113-117</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
    <div class="column">
        <img src="images/measures.png" alt="Image is not available" style="width:230px; height:500px; margin-left:170px">
    </div>
</div>
<button onclick="goBack()" class="button">Go back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
<style>

.measures{
    height:550px;
    padding:30px
}

.column {
  float: left;
  width:33%;
}

.list{
    width: 400px;
    list-style-type:none;
}

p{
    font-size: 20px;
}

th{
    background-color: #e7d1b1;
}

td,th {
    font-size: 20;
    text-align: center;
}

.table{
    height: 274px;
    width: 414px;
    padding: 50px;
}

.col{
    padding:15px;
}

.p{
    margin-left: 20px;
    margin-right: 20px;
    border: 50px;
}

tr:nth-child(even) {
    background-color: #f2e6d5;
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
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 8px;
  width: 170px;
  margin-left:180px
}

.button:hover {
  background-color: orange;
  color: black;
  text-decoration: none;
  font-weight:bold;
}
</style>
</html>
<?php include 'inc/footer.php' ?>
