<?php
include_once './engine/lib/logic/organization.php';

class getOrganization extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $user_id = $this->data['id'];
        $organization = get_organization($id);
        if ($organization){
            return new TheError($organization);
        }else{
            return new TheError(402);
        }
    }
    public const CallableName = 'getOrganization';
    public const RequireVerification =  true;
    public static $ParamsList = array(
        "id"=>"integer"
    );
}