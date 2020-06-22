CREATE DATABASE poll;

USE poll;

CREATE TABLE poll_results (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  candidate VARCHAR(30),
  num_votes INT
);

INSERT INTO poll_results (candidate, num_votes) VALUES
  ('John Smith', 0),
  ('Mary Jones', 0),
  ('Fred Bloggs', 0)
;

CREATE USER poll 
IDENTIFIED BY 'poll';

GRANT ALL PRIVILEGES
ON poll.*
TO poll
# @localhost
# MySQL da error cuando le agrego el @localhost seguido del usuario,
# pero es recomendable especificar el 
# hostname (@localhost por ejemplo), para mayor seguridad