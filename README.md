# COSC48906 - Assignment 2 Working with database
## Create an account at filess.io

## Create a new MariaDB database. Do not select any other database engine!

## Connect your website to a database (filess.io) 
(see my video for details, both week 3 and assignment 2 video)

## The table will be called users

## A user should have the ability to create an account

## Check to see if the account name exists already

## Passwords should be stored securely

## Passwords need to meet a minimum security standard

## Modify your login code so it is no longer hard-coded and the user should be able to login with their account details

## Make sure password is hashed. When they login, SELECT * FROM users WHERE username = '$_REQUEST['username'], then you will hash the password they put in the login form and compare it to the hash in the users table. If they are the same, then they entered the right password
