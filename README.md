# term-project
StockSmart is a web application that aims at reducing food waste by helping people keep track of food items in the kitchen. This app was created for the Web Systems Development Term Project by Raph Chung, Sean Hung, Tiffany Filawo, and Roma Paranjpe.

Key Features 
The In My Kitchen page allows users to view items in their kitchen based on specific  food group(s) they select. Upon selection, users will see key item information such as purchase date, expiration date, and item status. There are three kinds of status: Red, Yellow and Green. Red means the food is expired. Yellow means the food is going to expire. Green means you still have time to finish it. Users can also add items to their kitchen page. 

The Grocery List Page allows users to build grocery lists prior to shopping. After shopping, they can check the items as bought,and transfer these items over to the My Kitchen Page. 

 The donation list page allows users to add items that they wish to donate that are still well before the expiration date and unopened. This page ensures that no food is thrown out. 

The User Profile Page allows users to view their credentials as well as update the contact information. Users can also upload a profile picture of their choosing for a more personalized page. 

The Sign up/Login Page allows new users to create a stock smart account and manage their food items, and returning users to see what is currently in their kitchen. 

Implementation 
StockSmart is implemented in the LAMP stack. PHP Sessions and SQL queries drive the back end and data management of this application. The front end is implemented in HTML5, CSS, JS, and Bootstrap. 

Challenges/Important Notes 
Due to time constraints, we were not able to get the “Donate” button on the In my Kitchen page to work. Given more time, we would definitely be able to implement this. That being said, the rest of the application works smoothly, and any bugs that were present on presentation day (12/3) due to database issues have since been corrected. 

Future Work 
In the future, StockSmart would like to implement a date scanner technology that would reduce the burden of users inputting dates manually. Additionally, a more extensive database would make the application more reliable with the expiration date and food item information and result in a more accurate item status. The team is also considering expanding StockSmart from personal use to a more interconnected approach where users can create friend groups of their roommates, family, people they live with, etc, to make sure food items are properly tracked and there is no excess spending or waste. Since our buttons are red, yellow and green we should also consider a colorblind mode for users. In order to make sure users have enough incentive to use StockSmart, we are also thinking about implementing a rewards system in the future ( potentially based on how much they donate/ how much food they do not waste per month) that would give them a discount on their groceries. 

How to use StockSmart:
Clone repository 
Start the XAMPP Server
Import the database file into phpmyadmin
Open application in the browser
Sign Up, Login, and get started!

