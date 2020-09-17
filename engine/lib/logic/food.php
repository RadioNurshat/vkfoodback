<?php
function create_food($organization,$name,$description,$logo,$photos,$containment,$category,$price){
    global $db;
    $request = $db->query("INSERT INTO `food` (`organization`,`name`,`description`,`logo`,`photos`,`containment`,`category`,`price`) VALUES (?i,'?s','?s',?s,'?s','?s',?i,'?i')",$organization,$name,$description,$logo,$photos,$containment,$category,$price);
    if ($request){
        return true;
    }else{
        return false;
    }
}
function update_food($id,$name,$description,$logo,$photos,$containment,$category,$price){
    global $db;
    $request = $db->query("UPDATE `food` SET `name`='?s',`description`='?s',`logo`='?s',`photos`='?s',`containment`='?s',`category`=?i,`category`=?i WHERE `id`=?i",$name,$description,$logo,$photos,$containment,$category,$price,$id);
    if ($request){
        return true;
    }else{
        return false;
    }
}
function get_food($id){
    global $db;
    $request = $db->query("SELECT * FROM `food` WHERE `id` = ?i",$id);
    $result = $request->fetch_assoc();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function get_food_by_organization($organization){
    global $db;
    $request = $db->query("SELECT * FROM `food` WHERE `organization` = ?i",$organization);
    $result = $request->fetch_assoc();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function get_foods(){
    global $db;
    $request = $db->query("SELECT * FROM `food`");
    $result = $request->fetch_assoc_array();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function delete_organization($id){
    global $db;
    $request = $db->query("DELETE FROM `food` WHERE `id` = ?i",$id);
    return true;
}
