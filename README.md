
=> In this fresh laravel installation i have installed and implement laravel backpack package 

=> make cruds for 'user' and 'products'.


=> for users: 

-------a default middleware 'checkIfAdmin' is used to protect admin routes.

-------it checks boolian value of is_Admin column in users table


=> APIs

-------for the above two models (User, Product), i created following api routes:

-------api to register a user , login a user ,  get user after login , logout user,

-------api for email verification , reset password , forgot password.(for these apis, i duplicate the routes & controllers, provided by laravel auth and change there responses to json. )

-------Api to add,delete,update from a products table after authentication.

-------Use JWT package for Authentication.
 
-------Use Postman for testing.

