<?php
include_once './engine/lib/logic/organization.php';

class getOrganizations extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $organizations = get_organizations();
        if ($organizations) {
            return new TheSuccess($organizations);
        }else{
            return new TheError(402);
        }

    }
    public const CallableName = 'getOrganizations';
    public const RequireVerification = false;
}