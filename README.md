# Welcome 

## Instalación
Ilogica wordpress prueba de desarrollo, esta creado con Wordpress utilizando plugin Contact Form 7 y CPTU (Custom Post Type), los campos personalizados como metabox se han creado con código y están en el archivo functions.php junto con las librerías que se su utilizaran como WOW JS, BOOTRAP, etc.
Debe copiar los archivos y pegarlos en la carpeta raiz del proyecto, dentro de la raíz existe una carpeta llamada DUMP donde se encuentra el archivo de la base de datos, usted puede importarlo con PHPMyAdmin o copiar el código y correrlo en consola MYSQL.

## Guide MYSQL
Cuando ya tenga importada la base de datos usted debe correr las siguientes cuatro Querys, para reemplazar el dominio anterior con el dominio actual que usted va a utilizar.

1) UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost/ilogica', 'Dominio_nuevo');
2) UPDATE wp_posts SET post_content =REPLACE(post_content, 'http://localhost/ilogica', 'Dominio_nuevo');
3) UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost/ilogica', 'Dominio_nuevo');
4) UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost/ilogica', 'Dominio_nuevo');

## Guide intregations
El siguiente paso es cambiar la configuración de la conexión a la base de datos, esto se logra cambiando los valores en el archivo wp_config.php que se encuentran en la raíz del proyecto.

Nombre de la base de datos
define( 'DB_NAME', '' );

Nombre del usuario de MySQL
define( 'DB_USER', '' );

Password del usuario de MySQL
define( 'DB_PASSWORD', '' );

Con los pasos realizados en las instrucciones anteriores, usted podrá ver el trabajo realizado para la prueba de desarrollo.

## Instrucciones de uso
A continuación describiremos las instrucciones de eso del backend de wordpress, codificado para la integraciones con los requerimientos solicitados.

Para efectos resumidos omitiremos las instrucciones que todos conocemos sobre wordpress, como Login, Page, Post, Config theme, Menu, Home page, etc.

THEME, el thema que se creó para este proyecto lo he llamado RockyWeb.

El logo, Favicon, Menú y página de inicio se deben configurar en Appearance => Customize.

## HOME 

La página de Home previamente seleccionada en el item anterior, se pueden agregar los valores por defecto que contiene las page de wordpress.

  1) La imagen del primer teléfono será la imagen destacada de Page home.
  2) El background-image o banner del home será una segunda imagen destacada que se le ha asignado llamada BANNER
  3) El título, resumen y URL del botón "Get App Now" tendrá sus campos personalizados con un custom box ubicado debajo de Page Attributes en la parte derecha de la pantalla.
  4) El listado de logotipo de Clientes se agregaran como una galería de imágenes ubicada en la parte inferior de la pantalla del Page de HOME.

## Campos dinamicos del Home

Si bien en la prueba de desarrollo solo se utiliza una sección extra en el Home, se intentó realizar esa sesión de forma dinámica, para que no esté atada a una sola, esto se creó con un Custom Post Type llamada HOME, y con campos personalizados y dinámicos.

La cantidad de secciones del HOME será igual a la cantidad de post creados con estado Publish.

La imagen del teléfono y la imagen del background será idéntica a la forma que se ha creado para la página de inicio.
  
  1) Imagen del teléfono será la imagen destacada.
  2) Imagen del Background será la imagen destacada llamada BANNER.

Los items de la sección que contienen icono, título y descripción, se han creado de forma dinámica, esto quiere decir, se pueden agregar la cantidad de item que se estime pertinente.

Los campos que se utilizan para crear estos items son los siguientes:

  1) Select icono, se debe seleccionar el icono a mostrar, por tiempo y por qué son los iconos que se utilizaran en la prueba de desarrollo, solo se pueden seleccionar un listado de 3 iconos.
  2) Color, Se puede asignar un background color al circulo contenedor del icono, con un codigo de color exadecimal, por defecto este tendra un color Warning o naranjo.
  3) Título: se debe agregar el título o el nombre del item.
  4) Resumen o descriptions: se debe asignar una pequeña descripción del items que se está registrando.

## CONTACTO
La sección de contacto está creada con un CUSTOM POST TYPE, llamada contactos, se ha creado un registro en este post type y se le asignó al menú, junto con su plantilla single-contacto.php

La page de contacto tiene dos custom box

Custom box de configuración.
  
  1) Está ubicada en la parte derecha de la pantalla, debajo de excerpt.
  2) tiene tres campos: Titulo, Link formulario y Código de google Maps.

    a) Título: es el título que llevará la página de contacto.
    b) Link de formulario: este es el campo SHORTCODE que se debe pegar del formulario creado por el plugin contact form 7.
    c) Mapa: se debe copiar el link del mapa desde la plataforma Google Maps.

Custom box de información
Se han creado campos para llenar con información la pagina de contacto, estos campos son:
  
  1) Location: debe agregar la dirección.
  2) Contacto: se debe agregar los teléfonos de contacto.
  3) Email: Se deben agregar las direcciones de correo.

Estos campos de información de contacto pueden tener dos campos, dos para locations, dos para contacto y dos para email.



Para efectos de esta prueba de desarrollo no se han configurado ni agregados estilos para los demás paginas internas de la web como Search, Sidebar, Page, Post, ETC.
