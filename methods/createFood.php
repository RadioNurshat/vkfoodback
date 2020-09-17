<?php
include_once './engine/lib/logic/food.php';

class createFood extends Method implements IMethod
{

    public function Execute(): IReturnable
    {
        $organization = $this->data['organization'];
        $name = $this->data['name'];
        $description = $this->data['description'];
        $logo = $this->data['logo'];
        $photos = $this->data['photos'];
        $containment = $this->data['containment'];
        $category = $this->data['category'];
        $price = $this->data['price'];
        $user_id = $this->data['user_id'];
        create_food($organization,$name,$description,$logo,$photos,$containment,$category,$price);
        return new TheSuccess('created');
    }
    public static $ParamsList = array(
        "organization"=>"integer",
        "name"=>"string",
        "description"=>"string",
        "logo"=>"string",
        "photos"=>"Json",
        "containment"=>"Json",
        "category"=>"integer",
        "price"=>"int"
    );
    public const RequireVerification = true;
    public const CallableName = 'createFood';
}