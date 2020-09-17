<?php


class updateUser extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        global $db;
        $input = $this->data;
        $user_id = $input['vk_user_id'];
        $name = $input['name'];
        $surname = $input['surname'];
        $user = get_user($user_id);
        if ($user){
            $db->query("UPDATE `user` SET `name` = '?s',`surname` = '?s' WHERE `user_id` = ?i",$name,$surname,$user_id);
            $user = get_user($user_id);
            return new TheSuccess(array(
                "user"=>$user
            ));
        }else{
            return new TheError(200);
    }
        
    }
    public static $ParamsList = array(
        "vk_user_id" => 'integer',
        'name' => 'HumanName',
        'surname' => 'HumanName'
    );
    public const CallableName = 'updateUser';
    public const RequireVerification = true;
}