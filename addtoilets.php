<?php

include('config.php');

if(isset($_POST['submit'])){
    $location =  $_POST['location'];
    $lat =  $_POST['lat'];
    $lng =  $_POST['lng'];
    $description =  $_POST['description'];
    $picture =  $_POST['picture'];
    
echo   $location ; echo $lat ;echo $lng ; echo $description; echo $picture;

        $sql= "INSERT INTO location (location name, lat, lng, description, picture) values ('$location','$lat','$lng','$description','$picture')";
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
}
?>
<body>
    <b>Enter the detail of your toilet location </b><br>
<br>  
<form action="" method="POST">
    <table>
        <tr>
            <th>
           <b>

               location name: <input type="text" name='location'><br>
               latitude:      <input type="number" name='lat'><br>
               logitude:      <input type="number" name='lng'><br>
               description:   <input type="text" name='description'><br>
               picture:       <input type="file"  name='picture' >
               
            </b>
        </th>
    </tr>
</table>

<button> <a href="https://www.latlong.net/c/?lat=27.7&long=85.322
" target="_blank"> get latitude and Longitude</a></button><br>
<input type="submit" name="submit">
</body>