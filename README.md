<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Instraction this app

Clone this app and update, 
For login put two parameters "http://localhost:8000/api/login"
1. email
2. password

or 
For resigter put four parameters "http://localhost:8000/api/register"
1. name
2. email
3. password
4. c_password

both of login or register get a bearer token
Get any data from this application put this bearer token for Authentication. Without token request is unauthorized.
Get place name by coordinate 'get' method "http://localhost:8000/api/location/lat=62.54503862060&lon=94.78433640546564"

or
Get place name by coordinate 'post' method "http://localhost:8000/api/location?lat=62.54503862060&lon=94.78433640546564"
