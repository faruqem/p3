<?php
namespace App\Utilities;

class ChmodPermissionGenerator {
    private $permReadOwner;
    private $permReadGroup;
    private $permReadOther;
    private $permWriteOwner;
    private $permWriteGroup;
    private $permWriteOther;
    private $permExecuteOwner;
    private $permExecuteGroup;
    private $permExecuteOther;

    public function __construct (   $permReadOwnerPar, $permReadGroupPar, $permReadOtherPar,
                                    $permWriteOwnerPar, $permWriteGroupPar, $permWriteOtherPar,
                                    $permExecuteOwnerPar, $permExecuteGroupPar, $permExecuteOtherPar
                                )
    {
        if(isset($permReadOwnerPar)){
            $this->permReadOwner = $permReadOwnerPar;
        } else {
            $this->permReadOwner = false;
        }

        if(isset($permReadGroupPar)){
            $this->permReadGroup = $permReadGroupPar;
        } else {
            $this->permReadGroup = false;
        }

        if(isset($permReadOtherPar)){
            $this->permReadOther = $permReadOtherPar;
        } else {
            $this->permReadOther = false;
        }

        if(isset($permWriteOwnerPar)){
            $this->permWriteOwner = $permWriteOwnerPar;
        } else {
            $this->permWriteOwner = false;
        }

        if(isset($permWriteGroupPar)){
            $this->permWriteGroup = $permWriteGroupPar;
        } else {
            $this->permWriteGroup = false;
        }

        if(isset($permWriteOtherPar)){
            $this->permWriteOther = $permWriteOtherPar;
        } else {
            $this->permWriteOther = false;
        }

        if(isset($permExecuteOwnerPar)){
            $this->permExecuteOwner = $permExecuteOwnerPar;
        } else {
            $this->permExecuteOwner = false;
        }

        if(isset($permExecuteGroupPar)){
            $this->permExecuteGroup = $permExecuteGroupPar;
        } else {
            $this->permExecuteGroup = false;
        }

        if(isset($permExecuteOtherPar)){
            $this->permExecuteOther = $permExecuteOtherPar;
        } else {
            $this->permExecuteOther = false;
        }
    }


    public function calculatePermission()
    {
        //Define constants for different permission types' values
        define("READ_PERMISSION_VALUE", 4);
        define("WRITE_PERMISSION_VALUE", 2);
        define("EXECUTE_PERMISSION_VALUE", 1);

        //Intialization
        $calPermissions = [
                            "ownerPermission"=>"0",
                            "groupPermission" => "0",
                            "otherPermission" => "0"
        ];

        $ownerPermission = 0;
        $groupPermission = 0;
        $otherPermission = 0;

        #Calculate peemissions
        //Owner Permission
        if($this->permReadOwner){
            $ownerPermission += READ_PERMISSION_VALUE;
        }

        if($this->permWriteOwner){
            $ownerPermission += WRITE_PERMISSION_VALUE;
        }

        if($this->permExecuteOwner){
            $ownerPermission += EXECUTE_PERMISSION_VALUE;
        }

        //Group permission
        if($this->permReadGroup){
            $groupPermission += READ_PERMISSION_VALUE;
        }

        if($this->permWriteGroup){
            $groupPermission += WRITE_PERMISSION_VALUE;
        }

        if($this->permExecuteGroup){
            $groupPermission += EXECUTE_PERMISSION_VALUE;
        }

        //Others' permission
        if($this->permReadOther){
            $otherPermission += READ_PERMISSION_VALUE;
        }

        if($this->permWriteOther){
            $otherPermission += WRITE_PERMISSION_VALUE;
        }

        if($this->permExecuteOther){
            $otherPermission += EXECUTE_PERMISSION_VALUE;
        }

        //Update and return the final calculated permission values
        $calPermissions["ownerPermission"] = (string)$ownerPermission;
        $calPermissions["groupPermission"] = (string)$groupPermission;
        $calPermissions["otherPermission"] = (string)$otherPermission;

        return  $calPermissions;
    } //End of calculatePermission() method
}
