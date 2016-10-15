<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class PageController extends Controller
{
    public function home()
    {
       return view('page.home');
    }

    public function loremIpsum()
    {
        //$generator = new \Badcow\LoremIpsum\Generator();
        //$paragraphs = $generator->getParagraphs(5);
        return view('page.loremIpsum'); #->with('paragraphs',$paragraphs);
    }

    public function loremIpsumPost(Request $request){
        # Validate
         /*$this->validate($request, [
             'title' => 'required|min:3|alpha_num',
         ]);*/

         # If there were errors, Laravel will redirect the
         # user back to the page that submitted this request

         # If there were NO errors, the script will continue...

         # Get the data from the form
         #$title = $_POST['title']; # Option 1) Old way, don't do this.
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

    public function permissionCalculator()
    {
       return view('page.permissionCalculator');
    }

    public function contact()
    {
       return view('page.contact');
    }
}
