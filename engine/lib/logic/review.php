<?php
function create_review($user_id,$amount,$object,$type){
    global $db;
    $date = new DateTime('now');
    $date->setTimezone(new DateTimeZone('UTC'));
    $time = $date->format('Y-m-d H:i:s.u T');



}
function get_review($user_id,$object,$type){
    global $db;
    $query = $db->query("SELECT * FROM `review` WHERE `user` = ?i AND `object`=?i AND`type`=`?s`",$user_id,$object,$type);
    $result = $query->fetch_assoc_array();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function update_review($id,$amount){
    global $db;
    $query = $db->query("SELECT * FROM `review` WHERE `id`=?i ",$id);
    $result = $query->fetch_assoc();
    if ($result){
        $update = $db->query("UPDATE `review` SET `amount`=?i WHERE `id` = ?i",$amount,$id);
        if ($update->fetch_assoc()) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function delete_review($user_id,$object,$type){
    global $db;
    $review = get_review($user_id,$object,$type);
    if ($review){
        $request = $db->query("DELETE FROM `review` WHERE `object`=?i AND `type`='?s' AND `user`=?i",$object,$type,$user_id);
        return true;
    }else{
        return false;
    }
}
function get_average_score($object,$type){
    global $db;
    $request = $db->query("SELECT * FROM `review` WHERE `object`=?i, `type`='?s'",$object,$type);
    $reviews = $request->fetch_assoc_array();
    $c = 0;
    $i = 0;
    if ($reviews){
        foreach ($reviews as $review) {
            $c+=$review['amount'];
            $i++;
        }
        return $c/$i;
    }else{
        return false;
    }
}