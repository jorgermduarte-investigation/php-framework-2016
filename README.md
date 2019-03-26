# php-framework
Simple framework for project/application creation.


# Configurations Required
- Set the public folder as the Document Root.


# Usage

The respective pages are created in the public folder using the PageBuilder.

Page Builder Usage:

    $PageBuilder->build(
        "Page Name", //page Name
        array( //load pages or components 
            "test"
        ), 
        array( //settings for the page
            "libraries" => array( // load custom libraries
                // "test"
            ), 
            "middlewares" => array(  //load custom middlewars
                "test"
            ),
            "layout" => "default"
        )
    );

# Framework information

This framework contains core services, libraries and services that are loaded in the entire project and are setted in the main.php.

The pages and components are created in the app folder.

The layouts are in the app/layouts folder using fragments.

The services,libraries and middlewares have their own respective folder with examples.

To show errors from the services,middlewares and libraries use the $framework::info()  in the respective page.

**Notice that in the components folder u are inside the Framework.**
  - Load component inside another component : $this->setComponent("anothercomponent");
  - Call a service/lib/middleware :  $queryhelper = parent::loadService("queryhelper");
 
 
This framework has been based on Angular and Laravel.

