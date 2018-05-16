# yp_task
# MVC Ads project
Simple Ads Review application which display list of ads into main page for application any ads details consist into two parts an image and a description,
 click on any ad design box will redirect to another page for ad details and also include ads 
comments as review ,on ads any comment consist commenter name , date of comment and the comment itself.

### Pattrens used:
MVC 

Pepository Pattern to isolate the ads business logic from the controller as  a new layer

ACL for user tasks authorization 

### Usage :
Configure Database host name, user, password in app/config.php.

import the database in db.sql file and you good to go.

it consists of three users

user1 authorized for editing ads, 

user2 authorized for deleting ads

user3 authorized for add,edit,delete 

authentication

username user1

password 1111 (for all users)

### paths
Ads /public/ads
once you login the manage link will appear in nav menu
