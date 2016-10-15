@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@endsection

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    {{--Place holder for page specific CSS file--}}
@endsection

@section('content')
<!--Begin page content-->
    <div class="container">
      <div class="page-header">
        <h1>Lorem Ipsum Generator</h1>
      </div>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

     <form method='POST' action='/lorem-ipsum'>
        {{ csrf_field() }}
         Total Paragraph (1 to 99): <input type='text' name='totalPara' value='{{ old("totalPara") }}'>
          <input type='submit' value='Generate Lorem Ipsum'>
           @if(count($errors) > 0)
             <ul>
                 @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         @endif
     </form>
     <br><h3>Generated Lorem Ipsum will be displayed below:</h3>
     @if(session('paragraphs'))
         @foreach(unserialize(session('paragraphs')) as $para)
            <p>{{$para}}</p>
         @endforeach
         <br>
     @endif
    </div>
@endsection


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{--Place holder for page specific JS file--}}
@endsection
