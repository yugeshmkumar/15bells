 
<h1>PROPERTY DETAILS</h1>

 <?php


         $pid = $_GET['id'];
   
        $sql = "select *from addproperty where id=$pid ";
         $connection = Yii::$app->getDb();
        $command_get = $connection->createCommand($sql);
        $query = $command_get->queryAll();
        $countrow = count($query);
        if ($countrow > 0) {
            echo "<table style=color:black;width:100%; border='1' >
<tr>
<td align=center> <b>Project Name</b></td>
<td align=center><b>Locality</b></td>;
<td align=center><b>City</b></td>;
<td align=center><b>Address</b></td>
<td align=center><b>Longitude</b></td>;
<td align=center><b>Latitude</b></td>

<td align=center><b>Total Plot Area</b></td>;
<td align=center><b>Availablity</b></td>
<td align=center><b>Age</b></td>;
<td align=center><b>Ownership</b></td>
";
            for ($i = 0; $i < $countrow; $i++) {
            $loc=$query[$i]['project_name'];
$address=$query[$i]['address'];
$city=$query[$i]['city'];
$locality=$query[$i]['locality'];
$long=$query[$i]['longitude'];
$lat=$query[$i]['latitude'];
$plotsize=$query[$i]['total_plot_area'];
$unit=$query[$i]['plot_unit'];
$avail=$query[$i]['availability'];
$age=$query[$i]['age_of_property'];
$ownership=$query[$i]['ownership'];
}

                echo "<tr>";
                echo "<td align=center>$loc</td>";
echo "<td align=center>$locality</td>";
echo "<td align=center>$city</td>";
echo "<td align=center>$address</td>";
echo "<td align=center>$long</td>";
echo "<td align=center>$lat</td>";
echo "<td align=center>$plotsize.$unit</td>";
echo "<td align=center>$avail</td>";
echo "<td align=center>$age</td>";
echo "<td align=center>$ownership</td>";   

                echo "</tr>";
            }
            echo "</table>";
       
    