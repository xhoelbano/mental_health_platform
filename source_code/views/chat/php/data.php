<?php
    while($row = mysqli_fetch_assoc($query)){
        if($_SESSION['type'] == 1)
        $sql2 = "SELECT * FROM messages join general_users on outgoing_msg_id=general_user_id  WHERE (incoming_msg_id = {$row['id']}
                OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        
        elseif($_SESSION['type'] == 2)
        $sql2 = "SELECT * FROM messages join psychologist on outgoing_msg_id=psychologist_id  WHERE (incoming_msg_id = {$row['id']}
                OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        elseif($_SESSION['type'] == 3)
            $sql2 = "SELECT * FROM messages join psychologist on outgoing_msg_id=psychologist_id  WHERE (incoming_msg_id = {$row['id']}
                OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";
        
        if($row['type'] == 1)
            $row['img'] = "psychologist.jpg"; 
        elseif($row['type'] == 2){
            $row['img'] = "business.jpg"; 
            $row['firstname'] = $row['business_name'];
            $row['lastname']= "";
        }
        elseif($row['type'] == 3){
            $row['img'] = "user.jpg";
            $row['firstname'] = $row['nickname'];
            $row['lastname']= "";
        } 
        elseif($row['type'] == 4)
            $row['img'] = "student.jpg";
            
        elseif($row['type'] == 0){
            $row['img'] = "student.jpg";
            $row['firstname'] = "Administrator";
            $row['lastname']= "";
        }

        $output .= '<a href="chat.php?id='. $row['id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['firstname']. " " . $row['lastname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>