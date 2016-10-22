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

    public function setProfileFileName($profileFileNamePar) {
        $this->profileFileName = $profileFileNamePar;
    }


    public function generateUsers(){
        $pulledNames = $this->generateData($this->userFileName, $this->totalUser);
        $pulledLocations = $this->generateData($this->locationFileName, $this->totalUser);
        $pulledProfiles = $this->generateData($this->profileFileName, $this->totalUser);

        for($i = 0; $i < $this->totalUser; $i++){
            $userDOB = date('d/m/Y', mktime(0, 0, 0, rand(1,12), rand(0,28), date("Y")-rand(18,60)));
            $userName = $pulledNames[$i];
            $userLocation = $pulledLocations[$i];
            $userProfile = $pulledProfiles[$i];
            $user =[$userName, $userDOB, $userLocation, $userProfile];
            $pulledUsers[$i] =$user;
        }
        return $pulledUsers;
    } //End of generateUser Function

    private function generateData($dataFile, $totalRows){
        $pulledData = [];
        if (file_exists($dataFile)) { //Double checking if the file exists
            $jsondata = file_get_contents($dataFile); //get the file contents - already saved in JSON Format
            $allRows = json_decode($jsondata,true); //Convert to array
        } else {
            return $pulledData["No Data Generated!"];
        }

        $i = 0;
        while($i <= $totalRows){
            $index = rand(1,count($allRows)); //Randomly select a key
            if(!in_array(trim($allRows[$index]),$pulledData)){ //Make sure that the user is not already picked
                $pulledData[$i] = trim($allRows[$index]);
                $i++;
            } //End of inner IF
        } //End of WHILE loop
        return $pulledData;
    } //End of generateData() function
}
