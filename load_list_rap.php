<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$sql = "SELECT * FROM rap a 
        JOIN developer b ON a.developer_code = b.developer_code 
        JOIN m_status c ON a.status = c.kode_status
        WHERE a.status = 0 
        ORDER BY a.created_on ASC" ;
$result = $mysqli->query($sql);

$i = 1;
$rap = "";
while($row = mysqli_fetch_array($result)){
    $rap .= '
        <tr class="rap-object" id="item-rap-'.$i.'">
            <th scope="row">'.$i.'</th>
            <td><a id="'.$row["rap_code"].'" class="list-analisa" data-toggle="modal" data-target="#ModalSlide-RAP">'.$row["description"].'</a></td>
            <td>'.$row["developer_name"].'</td>
            <td>'.date('Y-m-d',strtotime($row["created_on"])).'</td>
            <td>'.$row["status_desc"].'</td>
            <td>edit | delete</td>
        </tr>';
    $i++;
}

echo $rap;

//<option value="020601087063504">PT BIMA SAKTI</option>
//<option value="020601087063505">PT Galaksi</option>

?>


