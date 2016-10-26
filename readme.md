#HSE CSCIE -15 Dynamic Web Applications - Project P3

##Live URL:
[Developer's Best Friend](http://p3.guddi.ca)

##Demo:
[Developer's Best Friend Site Demo](http://screencast.com/t/ZFpQk9v8Q)

##Description:
This site provides tools to generate random lorem ipsum text, random users with names & other data, xkcd style random password and chmod permission values.

Lorem Ipsum Generator:
[Lorem Ipsum] (http://lipsum.com/) is simply dummy text to setup the layout of a website as a reader may get distracted by the readable content of a page when looking at its layout. You can use this tool to generate 1 to 99 paragarphs of Lorem Ipsum text.

Random Users Generator:
This tool gives a developer 1 to 75 randomly generated dummy user names along with the options to generate their date of birth, location and short profile blurb, that the developer can use as test data for any of their applications.

Random Password Generator:
This tool helps a user generate a xkcd style random password based on their preference. XKCD style password is considered easy to remember but hard to guess. For more information check [XKCD Password Strength](http://xkcd.com/936/) page.

Permissions Calculator:
This utility helps a user calculate the numeric (octal) value for a set of file or folder permissions in Linux servers to be used with the chmod command. To learn more about chmod command visit [chmod Wikipedia] (https://en.wikipedia.org/wiki/Chmod) page.


##Outside Resources:
* [badcow/lorem-ipsum](https://packagist.org/packages/badcow/lorem-ipsum) for Lorem Ipsum Generator.
* [Bootstrap](http://getbootstrap.com/) CSS and JavaScript Framework
* [Bootsrap theme](https://www.bootstrapcdn.com/bootswatch/)
* [Paul and Bernice Noll Website](http://www.paulnoll.com) for words to be used for Random Password Generator.
* [100 Motivational Quotes](http://www.huffingtonpost.com/lolly-daskal-/100-motivational-quotes-t_b_4505356.html) to be used as a random profile for Random Users Generator.

##Note for the Grader
###My class files:
Folder: app/utilities and files in this folder:
* UserGenerator.php for Random Users Generator page.
* PasswordGenerator.php for Random Password Generator page.
* ChmodPermissionGenerator.php for Permissions Calculator page.
* SendEmail.php for Contact page.
* I used badcow/lorem-ipsum external package for Lorem Ipsum Generator page.

###My data files:
Folder: storgae/app/faruqe and files in this folder:
* names.json for Random Users Generator's user names.
* locations.json for Random Users Generator's user locations.
* quotes.json for Random Users Generator's user profiles.
* words.josn for for Random Password Generator page.

###Other notes:
* I used the badcow Lorem-Ipsum external package to fulfill the requirement of "You must research and implement at least one external package." For all other tools, including Random Users Generator, I created my own classes and other functionalities.
* As extras I provided two additional tools and an additional page: Random Password Generator - converted from my P2 project (procedural) to object oriented style; Chmod Permission Calculator and a Contact Me page.
* Though it was not a requirement, I returned the result set to the same page. I figured how to do it and thought it would give a user better UX.
* For all my logic code, where I haven't used an external package i.e. except Lorem Ipsum Generator, I created a class for each of my tools instead of putting the logic code directly into the controller.
* I used the blade old() value function to retrieve and display the old value upon a failed form validation. It worked very well for all the text boxes but not so for the bootstrap checkboxes. Anyway, it was not a requirement for this project. I did it as an extra.
* I set up SendMail in Digital Ocean to test my Contact Me page. It worked but in Digital Ocean it was extremely slow that's why I disabled the actual send mail part though other functionalities (field validation, success/fail message etc.) of the page are kept intact and it's ready to go upon setting up a new mailing option.
* I tested my app in IE 11, Google Chrome and FireFox successfully. Piazza discussion mentioned to test it in at least two browsers.
* I checked my site by passing the home and all the child  pages to the W3C Markup Validation Service and they passed all the validations. I also validated the CSS file I wrote i.e. p3.css and it passed all the CSS validation rules. The app.css came with Laravel so I don't have much control over it.
* Since none of the page objects is a resource/data object but just a single page, that's why I did not follow the resource style route convention and created a single page controller for all the pages.
