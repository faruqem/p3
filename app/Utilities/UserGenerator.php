<?php
namespace App\Utilities;

class UserGenerator {
    private $userFileName;
    private $locationFileName;
    private $profileFileName;

    private $totalUser;
    private $dob;
    private $location;
    private $profile;

    public function __construct ($totalUserPar, $dobPar, $locationPar, $profilePar) {
        if(isset($totalUserPar)){
            $this->totalUser = $totalUserPar;
        } else {
            $this->totalUser = 1;
        }

        if(isset($dobPar)){
            $this->dob = true;
        } else {
            $this->dob = false;
        }

        if(isset($locationPar)){
            $this->location = $locationPar;
        } else {
            $this->location = true;
        }

        if(isset($profilePar)){
            $this->profile = $profilePar;
        } else {
            $this->profile = true;
        }
    }


    public function setUserFileName($userFileNamePar) {
        $this->userFileName = $userFileNamePar;
    }

    public function setLocationFileName($locationFileNamePar) {
        $this->locationFileName = $locationFileNamePar;
    }

    public function setProfileFileName($userProfileNamePar) {
        $this->userProfileName = $userProfileNamePar;
    }

    public function generateUsers(){
        $userFile = $this->userFileName;
        if (file_exists($userFile)) { //Double checking if the file exists
            $jsondata = file_get_contents($userFile); //get the file contents - already saved in JSON Format
            $allUsers = json_decode($jsondata,true); //Convert to array
        } else {
            return "Sorry, we are unable to generate users this time!";
        }

        $pulledUsers = [];
        $i = 1;
        if ($this->totalUser){
            while($i <= $this->totalUser){
                $index = rand(0,count($allUsers)-1); //Randomly select a key
                if(!in_array(trim($allUsers[$index]),$pulledUsers)){ //Make sure that the user is not already picked
                    $pulledUsers[$i] = trim($allUsers[$index]);
                    $i++;
                } //End of inner IF
            } //End of WHILE loop
        } //End of outer IF
        return $pulledUsers;
    } //End of generateUser Function
}
