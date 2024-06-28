<?php

class Reminder {
    


    public function __construct() {

    }

    public function get_all_reminders ($userid) {
        $db = db_connect();
        $statement = $db->prepare("select * from reminders WHERE user_id = :userid");
        $statement->bindValue( ':userid', $userid);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        // foreach ($rows as $row){
        //     $_SESSION['reminder_id[]'] = $row['id'];
        // }  
        // foreach ($data['reminders'] as $reminder) {
        //     header('Location: /reminders/index');
        //     echo "<p>" . $reminder['subject'] . $reminder['created_at'].'</p>';
        // }
        return $rows;
    }

    public function update_reminder ($reminder_id, $subject) {
        $db = db_connect();
        $sql = "UPDATE reminders SET subject = :subject WHERE id = :id";
        $statement = $db -> prepare($sql);
        $statement->bindValue(":subject", $subject);
        $statement->bindValue(":id", $reminder_id);
        $statement->execute();
        header('Location: /reminders');
        // do update statement
    }
    
    public function create_reminder ($subject) {
        $db = db_connect();
        $sql = "INSERT INTO reminders (user_id,subject) VALUES (?,?)";
        $statement = $db->prepare($sql);
        $statement->execute([$_SESSION['userid'],$subject]);
        header('Location: /reminders ');
    }
    
    public function delete_reminder ($reminder_id) {
        $db = db_connect();
        $sql = "DELETE FROM reminders WHERE id = :id;";
        $statement = $db->prepare($sql);
        $statement->bindValue( ':id', $reminder_id);
        $statement->execute();

        header('Location: /reminders ');
        
        // do delete
    }
}
?>