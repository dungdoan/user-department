# About app
* The mini-app is developed based on **Laravel framework 9.47.0** and **PHP 8.1**

# Requirements
**Main idea:** Create department and user can be assigned to one department.

**1. Department:**
* Create a new department
* Delete the department

**2. User:**
* Create a new user
* Assign user to department

## Set up and run app on local
* Clone source code from: https://github.com/dungdoan/user-department.git
* Put source code in the main folder that will be run by webserver and create virtual host for it.
* Run ```php artisan migrate``` (for creating database and tables)
* Run ```php artisan db:seed``` (for creating sample data)
* Run the app with ```virtual domain``` or ```php artisan serve```

### Routes for running the app
#### Department
* Show all departments ```(GET): department```
* Create department (fill form) ```(GET): department/new```
* Create department (insert to database) ```(POST): department/create```
* Delete department ```(POST): department/delete```

#### User
* Show all users ```(GET): user```
* Create user (fill form) ```(GET): user/new```
* Create user (insert to database) ```(POST): user/create```
* Assign department ```(POST): user/assign```
