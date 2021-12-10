# Term Project
StockSmart is a web application that aims at reducing food waste by helping people keep track of food items in the kitchen. This app was created for the Web Systems Development Term Project by Raph Chung, Sean Hung, Tiffany Filawo, and Roma Paranjpe.

# Key Features 
The In My Kitchen page allows users to view items in their kitchen based on specific  food group(s) they select. Upon selection, users will see key item information such as purchase date, expiration date, and item status. There are three kinds of status: Red, Yellow and Green. Red means the food is expired. Yellow means the food is going to expire. Green means you still have time to finish it. Users can also add items to their kitchen page. 

The Grocery List Page allows users to build grocery lists prior to shopping. After shopping, they can change the “Bought” column for the item from “no” to “yes” by clicking the “Change” button.The user can then ransfer these items over to the My Kitchen Page by clicking the “Add to Kitchen” button and filling out the form. 

 The donation list page allows users to add items that they wish to donate from their In My Kitchen page that are still well before the expiration date and unopened. This process has been facilitated with an “Add to Donation List” button. When clicked, this button opens up an easy to fill out form with a drop down menu that conveniently contains all the food items in the In My Kitchen page and has the user fill out the other fields. This makes sure that users are only adding foods in their kitchen to the donation list. This page ensures that no food is thrown out and helps in helping to overall mitigate food waste which is one of the missions of our web application 

The User Profile Page allows users to view their credentials as well as update their contact information. Users can also upload a profile picture of their choosing for a more personalized page. 

The Sign up/Login Page allows new users to create a stock smart account and manage their food items, and returning users to see what is currently in their kitchen. 

# Implementation 
StockSmart is implemented in the LAMP stack. PHP Sessions and SQL queries drive the back end and data management of this application. The front end is implemented in HTML5, CSS, JS, and Bootstrap. 

# Challenges/Important Notes 
Due to time constraints, we were not able to get the “Donate” button on the In my Kitchen page to work. Given more time, we would definitely be able to implement this. That being said, the rest of the application works smoothly, and any bugs that were present on presentation day (12/3) due to database issues have since been corrected. 

# Future Work 
In the future, StockSmart would like to implement a date scanner technology that would reduce the burden of users inputting dates of bought food items manually. Additionally, a more extensive database would make the application more reliable with the expiration date and food item information and result in a more accurate item status. The team is also considering expanding StockSmart from personal use to a more interconnected approach where users can create friend groups with their roommates, family, people they live with, etc, to make sure food items are properly tracked and there is no excess spending or waste. Since our status buttons in the In My Kitchen page are red, yellow and green, we also want to create a colorblind mode for users who are colorblind especially colorblind to red, yellow, green, and other colors used in our web application. In order to make sure users have enough incentive to use StockSmart, we are also thinking about implementing a rewards system in the future ( potentially based on how much they donate/ how much food they do not waste per month) that would give them a discount on their groceries. 

# How to use StockSmart:
1. Clone repository 
2. Start the XAMPP Server
3. Import the database file into phpmyadmin
4. Open application in the browser
5. Sign Up, Login, and get started!
