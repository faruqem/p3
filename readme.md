#HSE CSCIE -15 Dynamic Web Applications - Project P3

##Live URL:
[Developer's Best Friend](http://p3.guddi.ca)

##Demo:
[Developer's Best Friend Site Demo](Not yet ready!)

##Description:
This site provides tools that helps a developer to generate random lorem ipsum text, random users with names & other data, xkcd style random password and chmod permission values.

Lorem Ipsum Generator:
[Lorem Ipsum] (http://lipsum.com/) is simply dummy text to setup the layout of a website as a reader may get distracted by the readable content of a page when looking at its layout. You can use this tool to generate 1 to 99 paragarphs of Lorem Ipsum text.

Random Users Generator:
This tool will give you 1 to 75 randomly generated dummy user names along with the options to generate their date of birth, location and short profile blurb, that you can use as test data for any of your applications.

Random Password Generator:
This tool helps a user generate a xkcd style random password based on their preference. XKCD style password is considered easy to remember but hard to guess. For more information check [XKCD Password Strength](http://xkcd.com/936/) page.

Permissions Calculator:
This utility helps a user calculate the numeric (octal) value for a set of file or folder permissions in Linux servers to be used with the chmod command. To learn more about chmod command visit [chmod Wikipedia] (https://en.wikipedia.org/wiki/Chmod) page.


##Outside Resources:
[badcow/lorem-ipsum](https://packagist.org/packages/badcow/lorem-ipsum) for Lorem Ipsum Generator.
[Bootstrap](http://getbootstrap.com/) CSS and JavaScript Framework
[Bootsrap theme](https://www.bootstrapcdn.com/bootswatch/)
[Paul and Bernice Noll Website](http://www.paulnoll.com) for words to be used for Random Password Generator.
[100 Motivational Quotes](http://www.huffingtonpost.com/lolly-daskal-/100-motivational-quotes-t_b_4505356.html) to be used a s random profile for Random Users Generator.

##Note for the Grader
#My class files:
Folder: app/utilities
Files:
1. UserGenerator.php for Random Users Generator page.
2. PasswordGenerator.php for Random Password Generator page.
3. ChmodPermissionGenerator.php for Permissions Calculator page.
4. SendEmail.php for Contact page.
5. I used badcow/lorem-ipsum external package for Lorem Ipsum Generator page.

#My data files:
Folder: storgae/app/faruqe
Files:
1. names.json for Random Users Generator's user names.
2. locations.json for Random Users Generator's user locations.
3. quotes.json for Random Users Generator's user profiles.
4. words.josn for for Random Password Generator page.

#Other notes:
1. I converted my Random Password Generator P2 project to object oriented code and integrated in P3 using Laravel as an additional tool.
2. Though it was not a requirement, I am returning the result set to the same page. I figured how to do it and thought it would give a user better UX.
3. For all my logic code, where I haven't used an external file, I created a class file instead of putting the logic directly into the controller.
4. I used the blade old() value function to retrieve and display the old value upon a failed form validation. Anyway, it did not work very well for the bootstrap checkboxes though it worked for all the text inputs.
5. I did not implement any mail setup to test out the contact form outgoing mail. But all other functionalities (field validation, success/fail message etc.) are there and it's ready to go upon setting up a mail server.
6. I tested my app in IE 11, Google Chrome and FireFox successfully. Piazza discussion mentioned to test it at least in two browsers.
