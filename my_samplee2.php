
<?php
//index.php

if(isset($_POST['submit'])) 
{


$reliability1=$_POST['reliability1'];
$reliability2=$_POST["reliability2"];
$reliability3=$_POST["reliability3"];
$reliability4=$_POST["reliability4"];
$reliability5=$_POST["reliability5"];
$reliability6=$_POST["reliability6"];

$maintainability1=$_POST['maintainability1'];
$maintainability2=$_POST["maintainability2"];
$maintainability3=$_POST["maintainability3"];
$maintainability4=$_POST["maintainability4"];
$maintainability5=$_POST["maintainability5"];
$maintainability6=$_POST["maintainability6"];


$efficiency1=$_POST["efficiency1"];
$efficiency2=$_POST["efficiency2"];
$efficiency3=$_POST["efficiency3"];
$efficiency4=$_POST["efficiency4"];
$efficiency5=$_POST["efficiency5"];
$efficiency6=$_POST["efficiency6"];


$testibility1=$_POST["testibility1"];
$testibility2=$_POST["testibility2"];
$testibility3=$_POST["testibility3"];
$testibility4=$_POST["testibility4"];
$testibility5=$_POST["testibility5"];
$testibility6=$_POST["testibility6"];

$portability1=$_POST["portability1"];
$portability2=$_POST["portability2"];
$portability3=$_POST["portability3"];
$portability4=$_POST["portability4"];
$portability5=$_POST["portability5"];
$portability6=$_POST["portability6"];

$integrity1=$_POST["integrity1"];
$integrity2=$_POST["integrity2"];
$integrity3=$_POST["integrity3"];
$integrity4=$_POST["integrity4"];
$integrity5=$_POST["integrity5"];
$integrity6=$_POST["integrity6"];


  $file_open = fopen("2dMatrix2.csv", "w");
  $no_rows = count(file("2dMatrix2.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $arrData = array(
    array("","RELIABILITY","MAINTAINABILITY","EFFICIENCY","TESTIBILITY","PORTABILITY","INTEGRITY"),
    array("RELIABILITY",$reliability1,$reliability2,$reliability3,$reliability4,$reliability5,$reliability6),
    array("MAINTAINABILITY",$maintainability1,$maintainability2,$maintainability3,$maintainability4,$maintainability5,$maintainability6),
    array("EFFICIENCY",$efficiency1,$efficiency2,$efficiency3,$efficiency4,$efficiency5,$efficiency6),
    array("TESTIBILITY",$testibility1,$testibility2,$testibility3,$testibility4,$testibility5,$testibility6),
    array("PORTABILITY",$portability1,$portability2,$portability3,$portability4,$portability5,$portability6),
    array("INTEGRITY",$integrity1,$integrity2,$integrity3,$integrity4,$integrity5,$integrity6)
  );





  
  // Open output file
  //$fpOut = fopen("bufferedWrite.csv", "w");
  
  // Write to memory stream
  //$msBuffer = fopen("php://memory","w+");
  foreach($arrData as $arrRecord)
  {
    fputcsv($file_open, $arrRecord);
  }
  

}

  //array_map(function($element){ fputcsv($file, [$element]) }, $sku_array);

  //fputcsv($file_open, $form_data);
  //$error = '<label class="text-success">Thank you for contacting us</label>';
  
?>
<!DOCTYPE html>
<html>
 <head>
  <title>software selector</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">

  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 110%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  size:100px;
  overflow:hidden;
  
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("software1.jpeg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: black;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
table, th, td {
  border: 1px ;
  color: white;
}

th, td {
  padding: 10px;
}
/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
option{
  color:black;
}
input
{
  color:black;
}
select
{
  color:black;
}
.text-block {
  position: absolute;
  top: 75px;
  left: 200px;
 
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}

</style>
</head>
<body  style="background-color:white;" >

<div class="bg-image"></div>
<div class="text-block">
<h1 style="color:white">PLEASE PROVIDE THE RELATIVE RANKINGS ACCORDING TO YOUR REQUIREMENTS</h1>
  </div>




<form method="POST" name="software">
<div class="bg-text">
   
      <table ALIGN="center">

  <tr>
     <th></th>
    <th><center>RELIABILITY </center></th>
    <th><center>MAINTAINABILITY</center></th>
    <th><center>EFFICIENCY</center></th>
    <th><center>TESTIBILITY</center></th>
    <th><center>PORTABILITY</center></th>
    <th><center>INTEGRITY</center></th>
  </tr>
  <tr>
    <td><b><center>RELIABILITY</center></b></td>
   
  
  
    <TD ALIGN="center">
       
            <input type="text"  name="reliability1" id="rel1"  value="1"readonly> 
    
    </TD>  
    
    
      <TD ALIGN="center">
      <select name="reliability2"  id="rel2" onclick="myFunctionman1()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD>  
     <TD ALIGN="center"  >
     <select name="reliability3" id="rel3" onclick="myFunctioneff1()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
       
    </TD>  
      <TD ALIGN="center" >
      <select name="reliability4" id="rel4" onclick="myFunctiontest1()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
             </select>
    </TD> 
    <TD ALIGN="center" >
      <select name="reliability5" id="rel5" onclick="myFunctionport1()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
             </select>
    </TD>  
    <TD ALIGN="center" >
      <select name="reliability6" id="rel6" onclick="myFunctionint1()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
             </select>
    </TD>   
  </tr>
  <tr>
    <td><b><center>MAINTAINABILITY</center></b></td>
    
    <TD ALIGN="center">
         
       <input type="text"  name="maintainability1" id="man1"  value="1"readonly>


      
    </TD>  
    
    
      <TD ALIGN="center">
      <input type="text"  name="maintainability2" id="com2"  value="1"readonly> 
       
    </TD>  

    <script>
function myFunctionman1() {
 
  document.getElementById("man1").value =1/document.getElementById("rel2").value;
}
function myFunctioneff1() {
 
 document.getElementById("eff1").value =1/document.getElementById("rel3").value;
}
function myFunctiontest1() {
 
 document.getElementById("test1").value =1/document.getElementById("rel4").value;
}
function myFunctionport1() {
 
 document.getElementById("port1").value =1/document.getElementById("rel5").value;
}
function myFunctionint1() {
 
 document.getElementById("int1").value =1/document.getElementById("rel6").value;
}
function myFunctioneff2() {
 
 document.getElementById("eff2").value =1/document.getElementById("man3").value;
}

function myFunctiontest2() {
 
 document.getElementById("test2").value =1/document.getElementById("man4").value;
}

function myFunctionport2() {
 
 document.getElementById("port2").value =1/document.getElementById("man5").value;
}

function myFunctionint2() {
 
 document.getElementById("int2").value =1/document.getElementById("man6").value;
}
function myFunctiontest3() {
 
 document.getElementById("test3").value =1/document.getElementById("eff4").value;
}

function myFunctionport3() {
 
 document.getElementById("port3").value =1/document.getElementById("eff5").value;
}

function myFunctionint3() {
 
 document.getElementById("int3").value =1/document.getElementById("eff6").value;
}

function myFunctionport4() {
 
 document.getElementById("port4").value =1/document.getElementById("test5").value;
}


function myFunctionint4() {
 
 document.getElementById("int4").value =1/document.getElementById("test6").value;
}


function myFunctionint5() {
 
 document.getElementById("int5").value =1/document.getElementById("port6").value;
}




</script>

     <TD ALIGN="center">
         <select name="maintainability3" id="man3" onclick="myFunctioneff2()" style="width:100%">        
         <option value="1">1</option>
         <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option> 
            <option value="5">5</option>
       </select>
    </TD>  
      <TD ALIGN="center">
       <select name="maintainability4" id="man4" onclick="myFunctiontest2()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
    <TD ALIGN="center">
       <select name="maintainability5" id="man5" onclick="myFunctionport2()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
    <TD ALIGN="center">
       <select name="maintainability6" id="man6" onclick="myFunctionint2()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
  </tr>
    <tr>
    <td><b><center>EFFICIENCY</center></b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="efficiency1"  id="eff1"  value="1" readonly> 
       
    </TD>  
    
    
      <TD align="center">
      <input type="text"  name="efficiency2"  id="eff2"  value="1" readonly> 
</td>
    </TD>  
     <TD ALIGN="center">
     <input type="text"  name="efficiency3" id="eff3"  value="1"readonly> 
     </td>
      
    </TD>  
      <TD align="center">
       <select id="eff4" name="efficiency4" onclick="myFunctiontest3()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
    <TD align="center">
       <select id="eff5" name="efficiency5" onclick="myFunctionport3()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
    <TD align="center">
       <select id="eff6" name="efficiency6" onclick="myFunctionint3()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
  </tr>
    <tr>
    <td><b><center>TESTIBILITY</center></b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="testibility1"  id="test1"  value="1" readonly> 
    </TD>  
    
    
      <TD ALIGN="center">
      <input type="text"  name="testibility2"  id="test2"  value="1" readonly> 
    </TD>  
     <TD ALIGN="center">
     <input type="text"  name="testibility3"  id="test3"  value="1" readonly> 
    </TD>  
      <TD ALIGN="center">
    <input type="text"  name="testibility4" id="test4"  value="1"readonly> 
</td>
   
    <TD ALIGN="center">
       <select id="test5" name="testibility5" onclick="myFunctionper4()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
    <TD ALIGN="center">
       <select id="test6" name="testibility6" onclick="myFunctionint4()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
  </tr>
  <tr>
  <td><b><center>PORTABILITY</center></b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="portability1"  id="port1"  value="1" readonly> 
    </TD>  
    <TD ALIGN="center">
    <input type="text"  name="portability2"  id="port2"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="portability3"  id="port3"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="portability4"  id="port4"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="portability5"  id="port5"  value="1" readonly> 
    </TD> 
    <TD align="center">
       <select id="port6" name="portability6" onclick="myFunctionint5()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 


  </tr>

  <tr>
  <td><b><center>INTEGRITY</center></b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="integrity1"  id="int1"  value="1" readonly> 
    </TD>  
    <TD ALIGN="center">
    <input type="text"  name="integrity2"  id="int2"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="integrity3"  id="int3"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="integrity4"  id="int4"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="integrity5"  id="int5"  value="1" readonly> 
    </TD> 
    <TD ALIGN="center">
    <input type="text"  name="integrity6"  id="int6"  value="1" readonly> 
    </TD> 
</tr>

</table>
<br>
<div class="form-group" align="center">
<input type="submit" class="btn" NAME="submit" value="submit">
</div>
     </div>
</form>
</body>
</html>












