<?php
include_once './engine/lib/logic/organization.php';
include_once './engine/lib/logic/food.php';

class updateFood extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $input = $this->data;
        $food = get_food($input['id']);
        $organization = get_organization($food['organization']);

        if ($input['vk_user_id'] == $organization['owner']){
            $update = update_food($input['id'],$input['name'],$input['description'],$input['logo'],$input['photos'],$input['containment'],$input['category'],$input['price']);
            if($update){
                return new TheSuccess('updated');
            }else{
                return new TheError(501);
            }
        }else{
            return new TheError(102);
        }
    }
    public const CallableName = 'updateFood';
    public const RequireVerification = true;
    public static $ParamsList = array(
        "id"=>"integer",
        "vk_user_id"=>"integer",
        "organization"=>"integer",
        "name"=>"string",
        "description"=>"string",
        "logo"=>"string",
        "photos"=>"Json",
        "containment"=>"Json",
        "category"=>"integer",
        "price"=>"int"
    );
}