<?php
include_once './engine/lib/logic/organization.php';

class deleteOrganization extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $id = $this->data['id'];
        $user_id = $this->data['vk_user_id'];
        $org = get_organization($id);
        if ($org['owner'] == $user_id){
            delete_organization($id);
            return new TheSuccess('deleted');
        }else{
            return new TheError(102);
        }

    }
    public const CallableName = 'deleteOrganization';
    public const RequireVerification =  true;
    public static $ParamsList = array(
        "id"=>"integer",
        "vk_user_id"=>"integer"
    );
}