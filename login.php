<?php
error_reporting(0);
session_start();
if($_SESSION['id']=="admin"){
$link= mysqli_connect("localhost","root","","note");

$r= mysqli_query($link,"select * from note");

$Email= mysqli_real_escape_string($link ,$_POST['email']);
$Pass= mysqli_real_escape_string($link ,$_POST['password']);
$id= mysqli_real_escape_string($link ,$_POST['id']);


//buttons
$sqls ="";
if($_POST['btnadd']){
    $sqls = "INSERT INTO note 
         (email,password,id) VALUES ('$Email', '$Pass','$id') ";

    mysqli_query($link,$sqls);
    header("location: login.php");
}

if($_POST['btnedt']){
    $sqls = "update note set email='$Email',password='$Pass' where id=$id";
    mysqli_query($link,$sqls);
    header("location: login.php");
}

if($_POST['btndel']){
    $sqls = "delete from note where id=$id";
    mysqli_query($link,$sqls);
    header("location: login.php");
}
}
?>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
         <!-- style -->   
        <style>


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#info {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#info th, #info td {
  text-align: left;
  padding: 12px;
}

#info tr {
  border-bottom: 1px solid #ddd;
}

#info tr.header, #info tr:hover {
  background-color: #f1f1f1;
            } 
.MyForm{
    margin: auto;
  width: 50%;
  border: 3px solid #ddd;
  padding: 10px;
            }
            body {
    text-align: center;
}
form {
    display: inline-block;
}
.log{
    float: right;
            }
.navbar{
    margin-bottom: 20px;
            }
        </style>
    </head>
     <body>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Admin Control Panel</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item log">
                    <a href="index.php?logout=1" class="nav-link">LogOut</a>
                </li>
                
            </ul>
        </div>

    </nav>
         
         
<form method="post">
    <div class="MyForm">
    <label>Email</label><br>
        <input type="text" id="email" name="email"><br>
    <label>Password</label><br>
        <input type="text" id="password" name="password"><br>
    <label>Id</label>    <br>
        <input type="text" id="id" name="id"><br>
   <br>
        
        <input type="submit" name="btnadd" value="Add"/>
        <input type="submit" name="btnedt" value="Edit"/>
        <input type="submit" name="btndel" value="Delete"/>
        
    
    </div>
    <br><br>
    
    <div>
        <label>Search</label>    <br><br>
    <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Search for emails.." title="Type in a name">
    </div>
    
    <br><br>
    <table border="1" id="info">
    <tr class="header">
        <th>Email</th>
        <th>Password</th>
        <th>id</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($r))
        {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</form>

<script>
var tbl = document.getElementById('info');
    for(var i=1; i<tbl.rows.length;i++){
        tbl.rows[i].onclick=function(){
            
         document.getElementById("email").value = this.cells[0].innerHTML;
          
         
         document.getElementById("password").value = this.cells[1].innerHTML; 
            
        document.getElementById("id").value = this.cells[2].innerHTML;     
         
        }
    }

    
    function myFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("info");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
         
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
         
    </body>