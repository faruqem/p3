<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Utilities\PasswordGenerator;
use App\Utilities\UserGenerator;
use App\Utilities\ChmodPermissionGenerator;
use App\Utilities\SendEmail;

class PageController extends Controller
{
    #Home page
    #---------
    #Show the page
    public function home()
    {
        return view('page.home');
    }
    #End of Home Page


    #Lorem ipsum page
    #----------------
    #Show the page
    public function loremIpsum()
    {
        return view('page.loremIpsum');
    }

    #Post the page
    public function loremIpsumPost(Request $request){
        # Validate
        $this->validate($request, [
            'totalPara' => 'required|numeric|min:1|max:99',
        ]);

        # Get the data from the form
        $totalPara = $request->input('totalPara'); # Option 2) USE THIS ONE! :)
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs((int)$totalPara);

        return \Redirect::to('/lorem-ipsum')->with('paragraphs',serialize($paragraphs));
    }
    #End of Lorem Ipsum page


    #Random Users Generator page
    #---------------------------
    #Show the page
    public function randomUser()
    {
        return view('page.randomUser');
    }

    #Post the page
    public function randomUserPost(Request $request)
    {
        #Validate
        $this->validate($request, [
            'totalUser' => 'required|numeric|min:1|max:75',
            'includeDOB' => 'boolean',
            'includeLocation' => 'boolean',
            'includeProfile' => 'boolean'
        ]);

        #Retrieve form values
        $totalUser = $request->input('totalUser');
        $includeDOB = ($request->input('includeDOB') === "" ? true : false);
        $includeLocation = ($request->input('includeLocation') === "" ? true : false);
        $includeProfile = ($request->input('includeProfile') === "" ? true : false);

        #Call the UserGenerator class to generate users
        $userGen = new UserGenerator($totalUser,$includeDOB,$includeLocation,$includeProfile);
        $userGen->setUserFileName('../storage/app/faruqe/names.json');
        $userGen->setLocationFileName('../storage/app/faruqe/locations.json');
        $userGen->setProfileFileName('../storage/app/faruqe/quotes.json');

        $users = $userGen->generateUsers();

        return \Redirect::to('/random-user')->with(['svUsers'=>serialize($users), 'svIncludeDOB'=>$includeDOB, 'svIncludeLocation'=>$includeLocation, 'svIncludeProfile'=>$includeProfile]);
    }
    #End of Random Users Generator page


    #Random Password Generator page
    #------------------------------
    #Show the page
    public function randomPassword()
    {
        return view('page.randomPassword');
    }

    #Post the page
    public function randomPasswordPost(Request $request)
    {
        # Validate
        $this->validate($request, [
            #'totalPara' => 'required|min:3|alpha_num',
            'tot-words' => 'required|numeric|min:2|max:6',
            'tot-sp-chars' => 'required|numeric|min:0|max:4',
            'tot-numbers' => 'required|numeric|min:0|max:4',
            'use-separator' => 'required',
            'word-case' => 'required|alpha'
        ]);

        #Retrieve form values
        $totWords = $request->input('tot-words');
        $totSpChars = $request->input('tot-sp-chars');
        $totNumbers = $request->input('tot-numbers');
        $useSeparator = $request->input('use-separator');
        $wordCase = $request->input('word-case');

        #Instantiate and call the PasswordGenerator class instance to generate the password
        $passGen = new PasswordGenerator($totWords, $totSpChars, $totNumbers, $useSeparator, $wordCase);
        $passGen->setWordFileName('../storage/app/faruqe/words.json');
        $password = $passGen->generatePassword();

        #Return the password by redirecting to the same page
        return \Redirect::to('/random-password')->with('password',$password);
    }
    #End of Random Password Generator page


    #Permissions Calculator page
    #--------------------------
    #Show the page
    public function permissionCalculator()
    {
        return view('page.permissionCalculator');
    }

    #Post the page
    public function permissionCalculatorPost(Request $request)
    {
        #Validate
        $this->validate($request, [
            'permissionReadOwner' => 'boolean',
            'permissionReadGroup' => 'boolean',
            'permissionReadOther' => 'boolean',
            'permissionWriteOwner' => 'boolean',
            'permissionWriteGroup' => 'boolean',
            'permissionWriteOther' => 'boolean',
            'permissionExecuteOwner' => 'boolean',
            'permissionExecuteGroup' => 'boolean',
            'permissionExecuteOther' => 'boolean'
        ]);

        #Retrieve form values
        $permReadOwner = ($request->input('permissionReadOwner') === "" ? true : false);
        $permReadGroup = ($request->input('permissionReadGroup') === "" ? true : false);
        $permReadOther = ($request->input('permissionReadOther') === "" ? true : false);
        $permWriteOwner = ($request->input('permissionWriteOwner') === "" ? true : false);
        $permWriteGroup = ($request->input('permissionWriteGroup') === "" ? true : false);
        $permWriteOther = ($request->input('permissionWriteOther') === "" ? true : false);
        $permExecuteOwner = ($request->input('permissionExecuteOwner') === "" ? true : false);
        $permExecuteGroup = ($request->input('permissionExecuteGroup') === "" ? true : false);
        $permExecuteOther = ($request->input('permissionExecuteOther') === "" ? true : false);


        #Instantiate and call the ChmodPermissionGenerator class instance to generate the permissions
        $permGen = new ChmodPermissionGenerator($permReadOwner, $permReadGroup, $permReadOther,
                                                $permWriteOwner, $permWriteGroup, $permWriteOther,
                                                $permExecuteOwner, $permExecuteGroup, $permExecuteOther);
        $calPerms = $permGen->calculatePermission();

        #Return the permission values by redirecting to the same page
        return \Redirect::to('/permission-calculator')->with('svCalPerms',serialize($calPerms));
    }
    #End of Permissions Calculator page


    #Contact page
    #------------
    #Show the page
    public function contact()
    {
        return view('page.contact');
    }

    #Post the page
    public function contactPost(Request $request)
    {
        #Validate
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|between:5,500',
        ]);

        #Retrieve form values
        $name = $request->input('name');
        $userEmail = $request->input('email');
        $message = $request->input('message');
        $to = 'faruqem@yahoo.com';
        $subject = 'Message from Developer Best Friends Site';

        #Instantiate and call the SendEmail class instance to send the message
        $sendMail = new SendEmail($name, $userEmail, $message, $to, $subject);
        $confMessage = $sendMail->send();

        #Return the send status message by redirecting to the same page
        return \Redirect::to('/contact')->with('svConfMessage',$confMessage);
    }
    #End of Contact page
}
