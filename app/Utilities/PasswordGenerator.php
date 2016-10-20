<?php
namespace App\Utilities;

class PasswordGenerator {
    private $wordFileName;

    private $totWords;
    private $wordCase;
    private $totNumbers;
    private $totSpChars;
    private $useSeparator;

    public function __construct ($totWordsPar, $totSpCharsPar, $totNumbersPar, $useSeparatorPar, $wordCasePar) {
        if(isset($totWordsPar)){
            $this->totWords = $totWordsPar;
        } else {
            $this->totWords = 2;
        }

        if(isset($totSpCharsPar)){
            $this->totSpChars = $totSpCharsPar;
        } else {
            $this->totSpChars = 0;
        }

        if(isset($totNumbersPar)){
            $this->totNumbers = $totNumbersPar;
        } else {
            $this->totNumbers = 0;
        }

        if(isset($useSeparatorPar)){
            $this->useSeparator = $useSeparatorPar;
        } else {
            $this->useSeparator = '-';
        }

        if(isset($wordCasePar)){
            $this->wordCase = $wordCasePar;
        } else {
            $this->wordCase = 'camel';
        }
    }

    public function setWordFileName($wordFileNamePar) {
        $this->wordFileName = $wordFileNamePar;
    }

    public function generatePassword(){
        /*-----------------------------------------------------------------------
            First check if the words file exist.
            If the words file does not exist call generateWordFile() function
            to grab words from Paul's website, create a new file
            and save the words there in JSON format.
        -----------------------------------------------------------------------*/
        /*if(!isset($this->wordFileName)){
            $this->wordFileName = '../storage/app/faruqe/words.json';
        }*/

        $wordFile = $this->wordFileName; //Initialize a varibale with words' file folder address

        if (!file_exists($wordFile)) {
            $this->generateWordFile($wordFile); //Call generateWordFile() function to generate the file
        }


        /*-----------------------------------------------------------------------
            Now read the query string and create the password by retrieving
            words from the locally saved file.
        -----------------------------------------------------------------------*/
        #Pull the words from the local file into an array
        if (file_exists($wordFile)) { //Double checking if the file exists
            $jsondata = file_get_contents($wordFile);
            $allWords = json_decode($jsondata,true);
        }

        #Randomly select the no of words user have asked for and save them into useWords[] array
        #Before saving them into an array, also convert them to the case users asked for
        $useWords = [];
        $i = 1;
        if ($this->totWords){
            while($i <= $this->totWords){
                $index = rand(0,count($allWords)-1); //Randomly select a key
                if(!in_array(trim($allWords[$index]),$useWords)){ //Make sure that the word is not already picked
                    if($this->wordCase == "upper") {
                        $useWords[] = strtoupper(trim($allWords[$index]));
                    } else if($this->wordCase == "lower") {
                        $useWords[] = strtolower(trim($allWords[$index]));
                    } else if($this->wordCase =="camel") {
                        $useWords[] = ucwords(trim($allWords[$index]));
                    } else {
                        $useWords[] = trim($allWords[$index]);
                    }
                    $i++;
                } //End of inner IF
            } //End of WHILE loop
        } //End of outer IF

        #Pick the numbers to be added
        $useNumbers = "";
        if ($this->totNumbers !=0) {
            $n = -1;
            $j = 1;
            if ($this->totNumbers){
                while($j <= $this->totNumbers){
                    $n = rand(0,9); //Randomly select a key
                    if(strpos($useNumbers, (string)$n) === false){ //Make sure that the digit is not repeated
                        $useNumbers = $useNumbers . $n;
                        $j++;
                    }
                }
            }
        }

        #Pick the special characters to be added
        $useSpecialChars = "";
        if ($this->totSpChars !=0) {
            //const SPECIAL_CHARS = ["!", "@","#","$","%","^","&","*"]; //Not supported by older PHP verson used in Digital Ocean
            $special_constants = ["!", "@","#","$","%","^","&","*"];
            $k = 1;
            if ($this->totSpChars){
                while($k <= $this->totSpChars){
                    $index = rand(0,count($special_constants)-1); //Randomly select an index
                    $c = $special_constants[$index]; //Find the spceial character with that index
                    if(strpos($useSpecialChars, $c) === false){ //Make sure that the special character is not repeated
                        $useSpecialChars = $useSpecialChars . $c;
                        $k++;
                    }
                }
            }
        }

        #Find the separator to be used
        $separator = "";
        if ($this->useSeparator){
            if($this->useSeparator == "space"){
                $separator = " ";
            } else if($this->useSeparator == "none"){
                $separator = "";
            } else {
                $separator = $this->useSeparator;
            }
        }

        #Build the password
        #Concatenate the words with selected separator
        $suggestedPassword = "";
        foreach($useWords as $key => $useWord){
            if($key < (count($useWords) - 1)){
                $suggestedPassword = $suggestedPassword . $useWord . $separator;
            } else { //Don't add the sperator after the last word
                $suggestedPassword = $suggestedPassword . $useWord;
            }
        }

        #Add the numbers and special characters at the end
        $suggestedPassword = $suggestedPassword . $useSpecialChars . $useNumbers;

        if(!$suggestedPassword){
            $suggestedPassword = 'Could not generate a password!';
        }

        return $suggestedPassword;
    } //End of generatePassword()

    private function generateWordFile($wordFile){
        #Intialization
        define("PAULS_SITE_MAX_PAGE", 30); //Define a constant on how many pages Paul's site has
        $urls = [];
        $allWords = [];

        #Create an array with all page urls
        for($i = 0; $i < PAULS_SITE_MAX_PAGE; $i++){
            if($i % 2 == 0){
                $urls[] = "http://www.paulnoll.com/Books/Clear-English/words-". sprintf('%02d', $i + 1) . "-" . sprintf('%02d', $i + 2) . "-hundred.html";
            }
        }

        $pattern = '~<li>(.*?)</li>~s'; //Declare the pattern. All words are in between a html <li></li> tag

        #Loop through all the pages and dump all the words to pwWords array
        foreach($urls as $url) {
            $wordPage = file_get_contents($url);
            preg_match_all ($pattern, $wordPage, $allWords);
            foreach($allWords[0] as $word){
                $pwWords[] = trim(strip_tags($word));
            }
        }

        #Now create a JSON string from the words retrieved
        $jsonString = "{";
        $i = 0;
        foreach($pwWords as $pwWord){
            //$pwWord = trim(str_replace("<\li>","",str_replace("<li>","",$pwWord)));
            if($i < count($pwWords)-1){
                $jsonString = $jsonString . '"' . $i . '":' . '"' . $pwWord . '",';
            } else{
                $jsonString = $jsonString . '"' . $i . '":' . '"' . $pwWord . '"';
            }
            $i++;
        }
        $jsonString = $jsonString . "}";

        #Save the JSON string in the "words.json" file in the "data" folder
        file_put_contents($wordFile, $jsonString);

        /*ALternate way opening and saving the data in a new file*/
        /*-------------------------------------------------------*/
        //$myfile = fopen($wordFile, "w") or die("Unable to open file!");
        //fwrite($myfile, $jsonString);
        //fclose($myfile);
    } //End of generateWordFile
}
