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
- enable html templating for twig file also on VScode -- 
setings-- search -- settings--- edit settings.json---
add -- ` "emmet.includeLanguages": {"twig" : "html"},`

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
- symfony console make:entity entityName ---create table or entity
- symfony console make:migration --- create migration file
- symfony console doctrine:migrations:migrate ---- run migration

## env configurations
DATABASE_URL="mysql://user:pass@127.0.0.1:3306/DbName?serverVersion=8.0.32&charset=utf8mb4"

## Entity (Tables)
- location - src/Entity/entityName.php
- Realtion between two entities --- 
    - create two entities
    - run symfony console make:entity entityName and add key as other entity name according to relation (departments)
    - add type as RelationName (ManyToMany, ManyToOne, OneToMany, OneToOne)
    - Run migration it will automatically create pivot table (if needed ) and changes according to linkage
## Data Fixtures
- ```composer require --dev doctrine/doctrine-fixtures-bundle``` --- install bundle
- It will create new folder DataFixtures in root which contain file. Import Entity in fixture and to add data and reference to pivot table use this 
- ```
        UserFixtures.php

        $user = new User();
        $user->setName('John Doe');
        $user->setUMail('John@doe.com');
        $user->setStatus(1);

        $this->addReference('user-1',$user);
        $manager->persist($user);
        $manager->flush();``` 
- ```
    DepartmentFixtures.php

     $dept = new Department();
        $dept->setDeptName('Manager');
        $dept->addUser($this->getReference('user-1'));
        
        $manager->persist($dept);
        $manager->flush();
    ```
- Run fixture using -- ```symfony console doctrine:fixtures:load```

## Repositories

- Automatically gets created when entity created-  symfony console make:entity entityName
- Add repository in controller method argument and use methods
- findAll(), find(ID), findBy(['id' => 1], ['id' => 'DESC']), count(['status' => 1]), getClassName() -> current entity name

## Compiling Assests
- ```composer require symfony/webpack-encore-bundle``` -- intalling webpak
- it will create new folder <app> in root directory which contains the css and js which are need to be compiled by webpack and the compiled folder will be at public/build/app.css for css.
- To use webpack in our application install - ```composer require symfony/asset``` 
- Add css changes in assets/style/app.css and compile using ```npm run watch``` (packages.json), to link the compiled file -- ```<link rel="stylesheet" href=""{{asset('build/app.css')}}```/>
- check ```webpack.config.js``` for paths and commands in ```package.json``` file

## using images
- place files in `assets/images/file.jpg`
- install `npm install file-loader`
- add in webpack.config.json 
    ```
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]',
        pattern: /\.(png|jpg|jpeg)$/
    })
    ```
- `npm run build` and use path as `<img src="{{asset("build/images/img.8c2c0eac.jpg")}}"/>`

## forms
- `composer require symfony/fom`
- `symfony console make:form EntityFormType EntityName(form should be connected with this entity)`
- `composer require symfony/validator doctrine/annotations` ---- to validate fields using annotations in entity class when submitting forms
- Add `?` before arguments name in setter methods in entity to validate null values
- Create form in App\Form\EntityFormType and render form in view by 
```
{{form_start(form)}}
    {{form_widget(form)}}
    <button type='submit' value="submitForm"/>
{{form_end(form)}}

```

- `form` is comming from controller 

## AUTHORIZATION

- `composer require symfony/security-bundle`
- Authentication - verify user and give him some access to do things
- Authorization - Check user is allowed to do those things or not
- `Symfony console make:user User` --- make user entity, repository and update security.yaml file
- make migration and migrate DB.
- `symfony console make:registration-form` -- create registration form (create controller, template and formType)
- `symfony console make:auth` -- create controller and all
- {{ app.user.email }} -- in twig file will give current logged in user 
