# control-status-back

> A Laravel project

## Bootstrap

-- Back-end

## Run scripts

-- composer install && composer update && composer dump && php artisan key:generate

-- php artisan migrate

-- php artisan db:seed

## Run event alter status machine

-- Add command crontab -e

-- * * * * * php ~/control-status/control-status-back/artisan schedule:run

-- php artisan schedule:run 
   

## serve with hot reload http://127.0.0.1:8000

-- php artisan serve --host=127.0.0.1 --port=8000

## Route / Endpoint Production

## Eventmachine

-- https://control-status-back.herokuapp.com/public/api/eventmachine
                                          
GET|HEAD                               | api/eventmachine               
POST                                   | api/eventmachine               
GET|HEAD                               | api/eventmachine/create        
DELETE                                 | api/eventmachine/{status}      
PUT                                    | api/eventmachine/{status}      
GET|HEAD                               | api/eventmachine/{status}      
GET|HEAD                               | api/eventmachine/{status}/edit 


## Machine

-- https://control-status-back.herokuapp.com/public/api/machine

POST                                   | api/machine                    
GET|HEAD                               | api/machine                    
GET|HEAD                               | api/machine/create             
PUT                                    | api/machine/{status}           
GET|HEAD                               | api/machine/{status}           
GET|HEAD                               | api/machine/{status}/edit      
            
## Simulator

-- https://control-status-back.herokuapp.com/public/api/simulator

POST                                   | api/simulator                  
GET|HEAD                               | api/simulator                  
GET|HEAD                               | api/simulator/create           
GET|HEAD                               | api/simulator/{status}         
PUT                                    | api/simulator/{status}         
GET|HEAD                               | api/simulator/{status}/edit    

## Status

-- https://control-status-back.herokuapp.com/public/api/status

POST                                   | api/status                     
GET|HEAD                               | api/status                     
GET|HEAD                               | api/status/create              
DELETE                                 | api/status/{status}            
PUT                                    | api/status/{status}            
GET|HEAD                               | api/status/{status}            
GET|HEAD                               | api/status/{status}/edit       
