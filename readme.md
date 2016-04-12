Steps to install:-
1. Take git checkout Or download the project from github.
2. Open git bash or composer and run following command
    
```composer update```

3. Open .env.example present at root level of the project in your favourite editor. Create database locally, and add db creds in .env.example file.
 Save it again as .env at same root level.
 
4. Now open git bash or cmd to run migration file.
    
```php artisan migrate```

5. Now open the url localhost\projectname(testblog-master\public).