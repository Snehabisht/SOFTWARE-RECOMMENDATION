
<?php
//index.php

if(isset($_POST['submit'])) 
{


$security1=$_POST['security1'];
$security2=$_POST["security2"];
$security3=$_POST["security3"];
$security4=$_POST["security4"];

$compatibilty1=$_POST["compatibilty1"];
$compatibilty2=$_POST["compatibilty2"];
$compatibilty3=$_POST["compatibilty3"];
$compatibilty4=$_POST["compatibilty4"];

$performance1=$_POST["performance1"];
$performance2=$_POST["performance2"];
$performance3=$_POST["performance3"];
$performance4=$_POST["performance4"];


$licensing1=$_POST["licensing1"];
$licensing2=$_POST["licensing2"];
$licensing3=$_POST["licensing3"];
$licensing4=$_POST["licensing4"];

  $file_open = fopen("2dMatrix.csv", "w");
  $no_rows = count(file("2dMatrix.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $arrData = array(
    array("","security","compatibility","performance","licensing cost"),
    array("security",$security1,$security2,$security3,$security4),
    array("compatibility",$compatibilty1,$compatibilty2,$compatibilty3,$compatibilty4),
    array("performance",$performance1,$performance2,$performance3,$performance4),
    array("licensing cost",$licensing1,$licensing2,$licensing3,$licensing4)
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
  <title>How to Store Form data in CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  function getdata(name){
      var val1 = document.getElementByName('name').value;
      var val= 1/val1;
      document.querySelector('compatibility2').textContent 
                    = val; 
      // Do Something 
}
  
  </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <br />
  <div class="container">
   
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Contact Form</h3>
     <br />



<style>
table{

}
table, th, td {
  border: 10px solid white

}

body{color: #FF0000;}
</style>
</head>
<body>

<h1><center>Requirements</h1>

<table style="width:100%">
  <tr>
     <th></th>
    <th>SECURITY</th>
    <th>COMPATIBILITY</th>
    <th>PERFORMANCE</th>
    <th>LICENSING COST</th>
  </tr>
  <tr>
    <td><b>SECURITY</b></td>
   
  
  
    <TD ALIGN="center">
       
            <input type="text"  name="security1" id="sec1"  value="1"readonly> 
    
    </TD>  
    
    
      <TD ALIGN="center">
      <select name="security2"  id="sec2" onclick="myFunctionsec2()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD>  
     <TD ALIGN="center"  >
     <select name="security3" id="sec3" onclick="myFunctionsec3()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
       
    </TD>  
      <TD ALIGN="center" >
      <select name="security4" id="sec4" onclick="myFunctionsec4()" style="width:100%">        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
             </select>
    </TD>  
  </tr>
  <tr>
    <td><b>COMPATIBILTY</b></td>
    
    <TD ALIGN="center">
         
       <input type="text"  name="compatibilty1" id="com1"  value="1"readonly>


      
    </TD>  
    
    
      <TD ALIGN="center">
      <input type="text"  name="compatibilty2" id="com2"  value="1"readonly> 
       </select>
    </TD>  

    <script>
function myFunctionsec2() {
 
  document.getElementById("com1").value =1/document.getElementById("sec2").value;
}
function myFunctionsec3() {
 
 document.getElementById("per1").value =1/document.getElementById("sec3").value;
}
function myFunctionsec4() {
 
 document.getElementById("lic1").value =1/document.getElementById("sec4").value;
}
function myFunctioncom3() {
 
 document.getElementById("per2").value =1/document.getElementById("com3").value;
}
function myFunctioncom4() {
 
 document.getElementById("lic2").value =1/document.getElementById("com4").value;
}

function myFunctionper4() {
 
 document.getElementById("lic3").value =1/document.getElementById("per4").value;
}
</script>

     <TD ALIGN="center">
         <select name="compatibilty3" id="com3" onclick="myFunctioncom3()" style="width:100%">        
         <option value="1">1</option>
         <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option> 
            <option value="5">5</option>
       </select>
    </TD>  
      <TD ALIGN="center">
       <select name="compatibilty4" id="com4" onclick="myFunctioncom4()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
  </tr>
    <tr>
    <td><b>PERFORMANCE</b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="performance1"  id="per1"  value="1" readonly> 
       
    </TD>  
    
    
      <TD align="center">
      <input type="text"  name="performance2"  id="per2"  value="1" readonly> 
    
    </TD>  
     <TD ALIGN="center">
     <input type="text"  name="performance3" id="per3"  value="1"readonly> 
         
       </select>
    </TD>  
      <TD align="center">
       <select name="performance4" id="per4" onclick="myFunctionper4()" style="width:100%">        
       <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
       </select>
    </TD> 
  </tr>
    <tr>
    <td><b>LICENSING COST</b></td>
    
    <TD ALIGN="center">
    <input type="text"  name="licensing1"  id="lic1"  value="1" readonly> 
    </TD>  
    
    
      <TD align="center">
      <input type="text"  name="licensing2"  id="lic2"  value="1" readonly> 
    </TD>  
     <TD ALIGN="center">
     <input type="text"  name="licensing3"  id="lic3"  value="1" readonly> 
    </TD>  
      <TD align="center">
    <input type="text"  name="licensing4" id="lic4"  value="1"readonly> 
      </select>
    </TD> 
  </tr>
</table>
<br>
<div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
</body>
</html>




