CodeIgniter Simple Authenticate System
======================================

Add users table
---------------
```sql
CREATE TABLE users
(
    user_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    gender varchar(255) NOT NULL,
    phone varchar(255) NOT NULL,
    created_at date NOT NULL
);
```


