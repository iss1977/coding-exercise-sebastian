# Coding exercise Sebastian

We're happy you applied for a job as full-stack web developer at jobs.at :) Before you can get started at jobs.at, we have a small exercise for you where you can show us your skills.

## Exercise description

You should create a small web app where the user can see open job positions. He/She should also have
the opportunity to search for particular jobs which they are interested in.

## Requirements

In order to complete this exercise you need to make sure that you have installed a web server
like Apache, PHP and MySQL. If you have these tools up and running, you can skip the rest of this section and directly
go to the next one.

If you are on Windows you can use [WAMP](https://www.wampserver.com/en/) which provides
you with Apache2, PHP, MySQL and phpmyadmin out-of-the-box. 
On Mac OSX the Apache webserver comes already pre-installed.
You can install PHP for instance via [Homebrew](https://brew.sh/index_de). You just need to execute `brew update && brew install php` on the command line.
On Linux you could use for instance `sudo apt-get install apache2 php`.

You also need to install [MySQL](https://www.mysql.com/de/). 
For windows please follow this [link](https://dev.mysql.com/doc/refman/8.0/en/mysql-installer.html.)
On Mac OSX we recommend the installation via Homebrew with `brew install mysql`.
On Linux you could use `sudo apt-get install mysql`.

If you experience any issues in setting up these tools, feel free to contact me via [E-Mail](mailto:juergen.ratzenboeck@jobs.at).

## Tasks

1. Start to layout the home page with HTML and CSS to show a list of jobs. Each job should have
a title, the company it belongs to, location, short introduction text and the date it was published. Above
   the list of jobs insert a text input field and a search button next to it. In this first step,
   you can simply add few sample jobs to verify that your layout looks correctly. 
   Take a look at this [UI mockup](https://drive.google.com/file/d/18V_x8XmCNcMBAOrexFf6kpxn8WPWxumR/view?usp=sharing)
   which should give you a basic idea of how the layout should like approximately. You don't have to invest much time to make the user interface pretty.
2. Create a mysql database for the project and set it up so that you can store jobs and companies. 
   A job contains following data: ID, Title, Location, Date where it was published.
   A company contains only: ID, Name 
   From the relational requirements
   a company can have one or multiple jobs assigned while a particular job belongs to one company. Please
   consider this relationship when creating the database tables.
   Please commit the SQL statements you execute in order to set up your database as well in this git repository.
   You can put them in a  `.sql` file. 
3. Now it's time to replace your static data on the home page with data from the database. Therefore, 
you first need to insert a few sample jobs and companies in your database. Consider putting the SQL statements to
   insert these records in a `.sql` file as well and commit it. After having inserted some data in your database,
   create a small PHP backend which loads all jobs from the database and shows them on the home page instead of
   the static data. The jobs should be sorted by the published date in descending order so that the latest job is on top
   and the oldest one at the bottom. The name of the company should also be shown for each entry in the job list. 
4. Implement the functionality to filter jobs based on the search input of the user. When the user enters a keyword in the text
input and submits it by clicking the search button, only the jobs which contain the search input within their job title 
   should be shown. This filtering should be done with JavaScript on the client-side so that the page does not refresh
   after hitting the search button. The search should also work case-insensitive, for instance a job with the title
   `PHP Developer` should also be found when I am searching for `php`.

If you cannot complete all the tasks, don't mind to send us the results you have. 
   
## How to submit

The preferred option is to send us a link to the forked repository in your Github account. If you do not have one, please send us your result either as ZIP archive or by sharing a link to some other cloud service where you have stored it.

If you have any questions do not hesitate to contact me via [E-Mail](mailto:juergen.ratzenboeck@jobs.at). 

Happy coding :)
   

   
   
   

 