<?php
include_once './engine/lib/logic/organization.php';

class updateOrganization extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
       $input = $this->data;
       $organization = get_organization($input['id']);
       if ($input['vk_user_id'] == $organization['owner']){
           $update = update_organization($input['id'],$input['name'],$input['description'],$input['address'],$input['logo'],$input['photos'],$input['phone']);
           if($update){
               return new TheSuccess('updated');
           }else{
               return new TheError(401);
           }
       }else{
           return new TheError(102);
       }

    }
    public const CallableName = 'updateOrganization';
    public const RequireVerification = true;
    public static $ParamsList = array(
        "id"=>"integer",
        "vk_user_id"=>"integer",
        "name"=>"string",
        "description"=>"string",
        "address"=>"string",
        "owner"=>"integer",
        "logo"=>"string",
        "photos"=>"string",
        "phone"=>"string"
    );
}