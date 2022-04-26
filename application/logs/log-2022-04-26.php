<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-04-26 11:38:22 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: FATAL:  password authentication failed for user &quot;postgres&quot; C:\xampp7.2\htdocs\foryouerere\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2022-04-26 11:38:22 --> Unable to connect to the database
ERROR - 2022-04-26 11:42:30 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: FATAL:  password authentication failed for user &quot;postgres&quot; C:\xampp7.2\htdocs\foryouerere\system\database\drivers\postgre\postgre_driver.php 154
ERROR - 2022-04-26 11:42:30 --> Unable to connect to the database
ERROR - 2022-04-26 11:48:46 --> Severity: Notice --> Array to string conversion C:\xampp7.2\htdocs\foryouerere\system\database\DB_driver.php 1476
ERROR - 2022-04-26 11:48:46 --> Severity: Warning --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;0&quot;
LINE 1: INSERT INTO &quot;menu&quot; (0) VALUES (Array)
                            ^ C:\xampp7.2\htdocs\foryouerere\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2022-04-26 11:48:46 --> Query error: ERROR:  syntax error at or near "0"
LINE 1: INSERT INTO "menu" (0) VALUES (Array)
                            ^ - Invalid query: INSERT INTO "menu" (0) VALUES (Array)
