<?php
include_once './engine/lib/logic/organization.php';

class getOwnersOrganizations extends Method implements IMethod
{
    public function Execute(): IReturnable
    {
        $user_id = $this->data['vk_user_id'];
        $organizations = get_organizations_by_owner($user_id);
        if ($organizations){
            return new TheError($organizations);
        }else{
            return new TheError(402);
        }
    }
    public const CallableName = 'getOwnersOrganizations';
    public const RequireVerification =  true;
    public static $ParamsList = array(
        "vk_user_id"=>"integer"
    );
}