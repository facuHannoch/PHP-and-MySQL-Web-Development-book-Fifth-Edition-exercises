CREATE DATABASE chat;

USE chat;

CREATE TABLE chatlog (

     id INT(11) AUTO_INCREMENT PRIMARY KEY,
     -- Integer display width is deprecated and will be removed in a future release.

     message TEXT,

     sent_by VARCHAR(50),

     date_created INT(11)
     -- Integer display width is deprecated and will be removed in a future release.

);

-- This rudimentary database table stores the basic metadata about the chat plus the message itself. The four columns are the uniquely identifying record ID, the message itself, the PHP session ID of the user who sent the message, and an integer field meant to hold the UNIX timestamp for when the message was submitted. The PHP session ID is important because we will use that value to determine if a chat message was sent by the user viewing the chat or another user entirely.


CREATE USER chatUser
IDENTIFIED BY 'chatUser';

GRANT select, insert, update, CREATE
ON chat.*
TO chatUser
