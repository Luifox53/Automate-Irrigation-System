<?php

$sondurum1 = "valve_ac1";
$sondurum2 = "valve_ac2";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['command'])) {
    $cmd = $_POST['command'];
    $cmd_safe = $conn->real_escape_string($cmd);
    $conn->query("INSERT INTO commands (command) VALUES ('$cmd_safe')");
    
    $son1 = $conn->query("SELECT command FROM commands WHERE command LIKE 'valve_%1' ORDER BY id DESC LIMIT 1");
    if ($son1) {
        $row = $son1->fetch_assoc();
        $son_command = $row['command'];
        
        if ($son_command == "valve_ac1") {
            $sondurum1 = "valve_kapat1";       
        } else if($son_command == "valve_kapat1") {
            $sondurum1 = "valve_ac1";} 
    }
    $son2 = $conn->query("SELECT command FROM commands WHERE command LIKE 'valve_%2' ORDER BY id DESC LIMIT 1");
    if ($son2) {
        $row = $son2->fetch_assoc();
        $son_command = $row['command'];

        if($son_command == "valve_ac2"){
            $sondurum2 = "valve_kapat2";
        } else if($son_command == "valve_kapat2"){
            $sondurum2 = "valve_ac2";} 
    
    }

}
?>


