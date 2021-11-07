# donationtracker

This project is intended to provide churches and other places of worship with a free, open-source solution for tracking donations for tax purposes.

-USER ROLE DEFINITIONS-

Superadmin: This role is intended for use by individuals in control of the server/service/application. It has total control(CRUD) over data in all tables.
This is intended to only be used as a tech-support and maintenance role, responding to tickets and requests from admins and users to solve issues their permissions cannot give them the ability to solve.
Admin: This role is intended to be used by individuals who have the authority and information at hand to populate data fields with charity information (including the sub-categories of donation targets), donators personal information and create accounts for normal users all associated with their church. Admins will also be able to perform a certain level of auditing for the work their associated users perform.
User: This is the role for more day-to-day operation on the platform. Users must be created by an admin and the credentials are then sent to the intended users email address.
Users can only input donation information. They will be able to see a dropdown list of all "donator numbers" (Whatever value each church uses to anonymously track their donators), a dropdown list of every associated charity with the church and their associated sub-categories, as well as input for the value of the donation and a section for 'comments'. This will all be saved to the donation table in addition to a timestamp.

-WORKFLOW/STEPS FOR INTENDED USAGE-

1: An office administrator (Or person of high enough authority) creates an admin account on the website hosting this service. As a part of the sign-up process they fill in information for their church.

2: Once they have created their admin account and church, the admin fills in data for their donators. This would include 'envelope numbers', real names, addresses and phone numbers (Emails will be optional). The admin will then fill in information for their associated charities and the sub-categories that donations can be directed to (If inapplicable, simply create a 'general' category).

3: The admin account creates user accounts for whoever will be handling the input of donations (Volunteers/other office employees). When they create the account, the login credentials will go the email address of the intended user. The user may then login using those credentials and access the form for inputting donations.


## Installation

### Windows

**Install XAMPP:** https://www.apachefriends.org/index.html

**Install Git:** https://git-scm.com/download/win

**Install Github Desktop**: https://desktop.github.com/



### Linux

