# laravel-becode-database
## how to use the API =

    
* POST CREATE 
    > http://localhost:8000/api/login
    
        { 
          email :"a-mag13@hotmail.com",
          pasword: "Admin2811"
        }
 


* POST CREATE 
    > http://localhost:8000/api/albums/create
    
        name	youhou
        file	test.jpg
        gender	kjkl
        year	58
        label	jjkl
        note	25
        artists	hjhjkhk
        songs	hferkk
        Content-Type	application/json
    
*  PUT UPDATE
    > http://localhost:8000/api/albums/19
    
        name	youhou
        fil e	test.jpg
        gender	kjkl
        year	58
        label	jjkl
        note	25
        artists	hjhjkhk
        songs	hferkk
        Content-Type	application/json 
    
* GET SEARCH
    > http://localhost:8000/api/albums/search
    
        id	
        name 
        
* GET SHOW one item
    > http://localhost:8000/api/19
    
* GET SHOW all itemps
    > http://localhost:8000/api/albums
    
* POST LOGOUT
    > http://localhost:8000/api/logout
    
