<style>
 table tr th{
    border: 1px solid black;
    width: 100%;
 }
    </style>
<body>    
    
    <?php
include('config.php');
$sql = "SELECT * FROM location";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    
    echo "<table>
    <h2> TOILETS DETAILS </h2>
    <tr>
    <th>  location name  ". $row["location name"] ."   </tr>
    <th>  latitude = ". $row["lat"] ."   </tr>
    <th>  logitude = ". $row["lng"] ."   </tr>
    <th>  description = ". $row["description"] ."  </tr>
    </tr>
    </table>" ;
}

?>
 
</body>