# DB restore 
Simply restores a database with a php file in case DB becomes corrupted or unusable. Checks if dump file exists, drops DB if DB exists, explodes queries into array on semi-colons. Executes those queries on the database, one by one. Can be used from a button on the page.
