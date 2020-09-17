<?php
function create_organization($name,$description,$address,$owner,$logo,$photos,$phone){
    global $db;
    $request = $db->query("INSERT INTO `organization` (`name`,`description`,`address`,`owner`,`logo`,`photos`,`phone`) VALUES ('?s','?s','?s',?i,'?s','?s',?i,'?s')",$name,$description,$address,$owner,$logo,$photos,$phone);
    if ($request){
        return true;
    }else{
        return false;
    }
}
function update_organization($id,$name,$description,$address,$logo,$photos,$phone){
    global $db;
    $request = $db->query("UPDATE `organization` SET `name`='?s',`description`='?s',`address`='?s',`logo`='?s',`photos`='?s',`phone`='?s' WHERE `id`=?i",$name,$description,$address,$owner,$logo,$photos,$phone,$id);
    if ($request){
        return true;
    }else{
        return false;
    }
}
function get_organization($id){
    global $db;
    $request = $db->query("SELECT * FROM `organization` WHERE `id` = ?i",$id);
    $result = $request->fetch_assoc();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function get_organizations_by_owner($user_id){
    global $db;
    $request = $db->query("SELECT * FROM `organization` WHERE `owner` = ?i",$user_id);
    $result = $request->fetch_assoc();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function get_organizations(){
    global $db;
    $request = $db->query("SELECT * FROM `organization`");
    $result = $request->fetch_assoc_array();
    if ($result){
        return $result;
    }else{
        return false;
    }
}
function delete_organization($id){
    global $db;
    $request = $db->query("DELETE FROM `organization` WHERE `id` = ?i",$id);
    return true;

}