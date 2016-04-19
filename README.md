# php-reg-login

Registration and Login using php developed by me and my infotech team mates during our earlier stage of development. 
It uses phpmailer for sending verification link on the users emailid.
It also provides support to the users who have mistakenly forgotten their password.
Hope this may helps you to save your time and you may further build up on this and create your own buddy!!


Database for this Registration and login 

Create database "nameofyourownchoice"


Create table for your database to handle users

<-------------------------------------------------------->

CREATE TABLE IF NOT EXISTS `users` (
`Memberid` int(10) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Mob` varchar(141) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Activation` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

<-------------------------------------------------------->

