<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Utilities\PasswordGenerator;


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

    public function contact()
    {
        return view('page.contact');
    }
}
