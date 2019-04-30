

## Bootstrap

-- Back-end

## Run scripts

-- composer install && composer update && composer dump

-- php artisan migrate

-- php artisan db:seed

## Run event alter status machine

-- php artisan schedule:run 

## Route

-- eventmachine
                                          
GET|HEAD                               | api/eventmachine               
POST                                   | api/eventmachine               
GET|HEAD                               | api/eventmachine/create        
DELETE                                 | api/eventmachine/{status}      
PUT                                    | api/eventmachine/{status}      
GET|HEAD                               | api/eventmachine/{status}      
GET|HEAD                               | api/eventmachine/{status}/edit 


-- macnihe

POST                                   | api/machine                    
GET|HEAD                               | api/machine                    
GET|HEAD                               | api/machine/create             
PUT                                    | api/machine/{status}           
GET|HEAD                               | api/machine/{status}           
GET|HEAD                               | api/machine/{status}/edit      
            
-- simulator

POST                                   | api/simulator                  
GET|HEAD                               | api/simulator                  
GET|HEAD                               | api/simulator/create           
GET|HEAD                               | api/simulator/{status}         
PUT                                    | api/simulator/{status}         
GET|HEAD                               | api/simulator/{status}/edit    

-- status

POST                                   | api/status                     
GET|HEAD                               | api/status                     
GET|HEAD                               | api/status/create              
DELETE                                 | api/status/{status}            
PUT                                    | api/status/{status}            
GET|HEAD                               | api/status/{status}            
GET|HEAD                               | api/status/{status}/edit       
