CREATE TABLE auth 
(name CHAR(50) NOT NULL,
password CHAR(60) NOT NULL);

CREATE USER webauth
IDENTIFIED BY 'webauth';

GRANT select, insert
ON auth.*
TO 'webauth';

