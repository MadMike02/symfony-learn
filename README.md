# INSTALLATION
windows - scoop install symfony-cli
ubuntu -  
    curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
    sudo apt install symfony-cli

-------------------------------------------------------------------------------------

symfony new projectName --- create new project
symfony server:start ---- start server use -d to run in background
symfony server:stop --- stop a running server
symfony open:local --- open project in browser (127.0.0.1:8000)
symfony console debug:router --- list out all routes
symfony help --- all available commands list
symfony console ----all list of commands

--------------------------------------------------------------------------------------
php bin/console --- all commands list
php bin/console debug:router --- list out all routes

-------------------------------------------------------------------------------------
# Getting started with controller

## TO USE ANNOTATIONS FOR ROUTE

composer require annotations --- annotations is alias for flex package i.e.(symfony/flex)

### routes configuration file path 
config/routes.yaml --- all routes is added by default and type is set to attributes

## CONTROLLER SETUP

use Symfony\Component\Routing\Annotation\Route; (include above controller)

#[Route('/path')] ---- annotation above method to link to route
#[Route('/parmeter',methods:['GET','HEAD'])] ----- route methods
#[Route('/parameter/{name}',methods:['GET','HEAD'])] ---- parameter (use $name as method argument to use it)
#[Route('/parameter/{name}',methods:['GET','HEAD'], defaults:['name' => 'John'])] ----- with default


--------------------------------------------------------------------------------------

# View Components

Composer require twig ---- install twig template engine

- include use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
- extends AbstractController in controller
- use $this->render('fileName.html.twig') ---- default folder is templates in root directory

## TWIG BASICS

- {{variableName}} ---- for outputing variable 
- {% if condition %} ... {% else %} ... {% endif %} --- if else
- {% for item in items %} .... {% endfor %} ---- for loops
- {% extends "base.html.twig" %} ---- extending base template
- {% block title %} INDEX PAGE {% endblock %} ---- using blocks defined in template
- {{ _self }} --- fileName
- {{ _charset }} --- charset used
- {{ globalVariabel }} --- globalVariabel(defined in Config/Packages/twig.yaml) 

### passing data in views from controller

$data = ["key" => "value"];
return $this->render('fileName.html.twig',['variableName' => $data]); --- in controller


------------------------------------------------------------------------------------------

# Creating Database

## Installation 
- composer require symfony/orm-pack
- composer require --dev symfony/maker-bundle

## Commands
- symfony console list doctring --- list all doctrine commands
- symfony console doctrine:database:create ---- create db
- symfony console make:entity entityName

## env configurations
DATABASE_URL="mysql://user:pass@127.0.0.1:3306/DbName?serverVersion=8.0.32&charset=utf8mb4"

## Entity (Tables)
- location - src/Entity/entityName.php