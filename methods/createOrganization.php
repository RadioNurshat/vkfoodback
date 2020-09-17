<?php
include_once './engine/lib/logic/organization.php';

class createOrganization extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $input = $this->data;
        $request = create_organization($input['name'],$input['description'],$input['address'],$input['vk_user_id'],$input['logo'],$input['photos'],$input['phone']);
        if ($request){
            return new TheSuccess('created');
        }else{
            return new TheError('400');
        }
    }
    public const CallableName = 'createOrganization';
    public const RequireVerification = true;
    public static $ParamsList = array(
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