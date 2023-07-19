
# COGIP


The Cogip project is a customer management application for the Cogip company.

This __BeCode__ exercise is spread over 10 days and involves two teams: one front-end, the other back-end. A project manager is appointed within the group to manage the whole.


## 👩‍💻 The team

This Cogip was developed by Steve Grard, Alexandra Petit, Anthony Denayer and Arnould Julien.

**Back-end** :

[![portfolio](https://img.shields.io/badge/Alexandra_Petit-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://github.com/Alexpe77)

*Alexandra participated in the creation of the database, and its improvement throughout the project.
She also created the sorting systems and search engine for the data tables presented on the Invoices / Contacts / Companies pages.*

*Her participation in the creation of the server queries, enabled the display of the details of the various data mentioned above.*

*It took a lot of coffee to feed Alex energy...*


[![portfolio](https://img.shields.io/badge/Steve_Grard-045?style=for-the-badge&logo=redhat&logoColor=white)](https://github.com/Grards)

*Steve's role was to lead the team as project manager. Multi-hatted, he was heavily involved in the back end of the project and in debugging in general, while at the same time unblocking certain situations on the front end.*

*The different parts of the exercise were cut out on a [trello](https://trello.com/b/Fgo9zR21/cogip) which he maintained throughout the 10 days of development.* 

*On the back side, he set up the routing, the databases, the pagination system, the breadcrumb trail, the htaccss files, the dashboard and his CRUD.*


**Front-end** :

[![portfolio](https://img.shields.io/badge/Anthony_Denayer-934?style=for-the-badge&logo=bandsintown&logoColor=white)](https://github.com/BillyGrind)

*Anthony was at the forefront of this project, managing almost the entire design. Having worked mainly with Sass, he also wrote a few small client-side scripts in native JavaScript.*

*In particular, he was responsible for the hamburger menu and general navigation. As well as the overall responsive look of the various pages presented.*

*A [mokup](https://www.figma.com/file/PS5hPdhywkRfxreITOYwba/Cogip?type=design&node-id=0-1&mode=design&t=ZxSZnTCef5YIH6fT-0) figma was provided for integration.*


[![portfolio](https://img.shields.io/badge/Julien_Arnould-960?style=for-the-badge&logo=apachecouchdb&logoColor=white)](https://github.com/Arnould-Julien)

*On this project, Julien was mainly an observer and learner. He took part in creating a footer, a 404 page and setting up the general structure of sass.*


## 🛠️ Skills

HTML, CSS, SQL, JavaScript and PHP

## 🏗️ Structures

SASS, OOP, MVC, [Bramus](https://github.com/bramus/router) (router)

## 📜 Criteria

### Global missions (but PM responsibilities)
* Workload distribution
* Progress management (agile methods, tool of your choice)

### Back-end
* Tech Used
* PHP + SQL
* OOP
* MVC

#### Missions
* Using composer
* PHP (POO), MVC Structure
* CRUD
* Validation & Sanitization server-side

### Front-end
* Tech Used
* JS
* HTML
* SASS + BEM (or CSS framework : Tailwind || Bootstrap)
* Typescript (Bonus)

#### Missions

* Mockup compliance
* Mobile First
* Validation client-side

## ⏰ Time

**10 days** to complete the project.

## 📸 Screenshots

![screenshotcogip](https://github.com/Grards/Cogip_Challenge/assets/128476445/0faa5f7a-8197-4c71-942e-dd13e0def8ce)

## ⚙️ Installation 

* Use `composer install` for the dependances.
* Import the file `public/assets/db/cogip.sql` in your 'cogip' DB
* Specify your local db password in `Core/config.php` 

```php
<?php 
$dbPass = ''; 
?>
```

## 📚 Documentation


#### Routes & 404
Routes are managed by [Bramus](https://github.com/bramus/router).
See the related documentation to perform the routing application.
All routes are describe in `Routes/Routes.php`


#### Errors
All errors are define in `Ressources/views/includes/errors.php`.


#### Dashboard
You can access to the Dashboard in `Cogip_Challenge/public/dashboard`.
