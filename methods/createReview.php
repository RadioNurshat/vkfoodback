<?php
include_once 'engine/lib/logic/review.php';

class createReview extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        global $db;
        $input = $this->data;
        $user_id = $input['vk_user_id'];
        $object = $input['object'];
        $type = $input['type'];
        $amount = $input['amount'];
        $review = get_review($user_id,$object,$type);
        if ($review){
             update_review($review['id'],$amount);
             return new TheSuccess(null,'updated');
        }else{
            create_review($user_id,$amount,$object,$type);
            return new TheSuccess(null,'created');
        }
    }
    public const CallableName = 'createReview';
    public const RequireVerification = true;
    public static $ParamsList = array(
        'type'=>'string',
        'amount'=>'integer',
        'object'=>'integer'
    );
}