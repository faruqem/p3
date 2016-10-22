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
    public function home()
    {
        return view('page.home');
    }

    public function loremIpsum()
    {
        return view('page.loremIpsum');
    }

    public function loremIpsumPost(Request $request){
        # Validate
        $this->validate($request, [
            #'totalPara' => 'required|min:3|alpha_num',
            'totalPara' => 'required|numeric|min:1|max:99',
        ]);

        # If there were errors, Laravel will redirect the
        # user back to the page that submitted this request

        # If there were NO errors, the script will continue...

        # Get the data from the form
        $totalPara = $request->input('totalPara'); # Option 2) USE THIS ONE! :)
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs((int)$totalPara);
        # Here's where your code for what happens next should go.
        # Examples:
        # Save book in the database
        //$paragraphs1 = $paragraphs[1];
        # When done - what should happen?
        # You can return a String (not ideal), or a View, or Redirect to some other page:
        return \Redirect::to('/lorem-ipsum')->with('paragraphs',serialize($paragraphs));
        #return view('page.loremIpsum');
        #return $paragraphs[1];
        # FYI: There's also a Laravel helper that could shorten the above line to this:
        # return redirect('/books/create');
    }

    public function randomUser()
    {
        return view('page.randomUser');
    }

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

        $userGen = new UserGenerator($totalUser,$includeDOB,$includeLocation,$includeProfile);
        $userGen->setUserFileName('../storage/app/faruqe/names.json');
        $userGen->setLocationFileName('../storage/app/faruqe/locations.json');
        $userGen->setProfileFileName('../storage/app/faruqe/quotes.json');


        $users = $userGen->generateUsers();
        //$users = [["Mo Faruqe","Toronto"],["Ru Haque","NYC"]];
        //dd($users);
        return \Redirect::to('/random-user')->with(['svUsers'=>serialize($users), 'svIncludeDOB'=>$includeDOB, 'svIncludeLocation'=>$includeLocation, 'svIncludeProfile'=>$includeProfile]);
        //return view('page.randomUser');
    }

    public function randomPassword()
    {
        return view('page.randomPassword');
    }

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

        #Instantiate and call appropriate class instance to generate the password
        $passGen = new PasswordGenerator($totWords, $totSpChars, $totNumbers, $useSeparator, $wordCase);
        $passGen->setWordFileName('../storage/app/faruqe/words.json');
        $password = $passGen->generatePassword();

        #Return the password
        return \Redirect::to('/random-password')->with('password',$password);
    }

    public function permissionCalculator()
    {
        return view('page.permissionCalculator');
    }

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
        //dd($permReadOwner);

        $permGen = new ChmodPermissionGenerator($permReadOwner, $permReadGroup, $permReadOther,
                                                $permWriteOwner, $permWriteGroup, $permWriteOther,
                                                $permExecuteOwner, $permExecuteGroup, $permExecuteOther);
        $calPerms = $permGen->calculatePermission();
        //dd($calPerms);
        //return view('page.permissionCalculator');
        return \Redirect::to('/permission-calculator')->with('svCalPerms',serialize($calPerms));
    }

    public function contact()
    {
        return view('page.contact');
    }

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
        $email = $request->input('email');
        $message = $request->input('message');
        $from = 'Developer Best Friends Site';
        $to = 'faruqem@yahoo.com';
        $subject = 'Message from Developer Best Friends Site User!';

        $sendMail = new SendEmail($name, $email, $message, $from, $to, $subject);
        $confMessage = $sendMail->send();
        //$confMessage = "Your message has been successfully sent. We will be in touch soon.";
        return \Redirect::to('/contact')->with('svConfMessage',$confMessage);
    }
}
