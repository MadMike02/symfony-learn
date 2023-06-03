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