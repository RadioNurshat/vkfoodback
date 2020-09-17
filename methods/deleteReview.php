<?php


class revokeReview extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $input = $this->data;
        $user_id = $input['vk_user_id'];
        $object = $input['object'];
        $type = $input['type'];
        global $db;
        $review = get_review($user_id,$object,$type);
        if ($review){
            delete_review($user_id,$object,$type);
            return new TheSuccess('deleted');
        }else{
            return new TheError(301);
        }
    }
    public const CallableName = 'revokeReview';
    public static $ParamsList = array(
        "object"=>"integer",
        "type"=>"string"
    );
}