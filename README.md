# Kata Password Refactoring
* [Fuente del código original](http://www.codeofaninja.com/2013/03/php-hash-password.html)
* Fecha de publicación del código: 31 de Marzo de 2013 (eran otros tiempos)

# Contexto
Es tu primer día de trabajo en GanianesCorp. Viene el jefe y te comenta:
>Ahora estamos en “época valle” en cuanto a carga de trabajo.
>
>El próximo mes contrataremos mucha gente nueva que deberá pasar por el **sistema de registro de personal**. Queremos hacer una prueba para que lo hagan **vía consola**, pero **mantendremos el registro vía web** por si vemos que los nuevos no se hacen a la UI.
>
>Aquí tienes el código del sistema de registro actual. No lo tocamos desde hace un tiempo, pero ten en cuenta que a nivel de servidores, todos ya ejecutan PHP 7.

Perfecto. Todo pinta bien. Es tu primer día, tienes una tarea concreta que no parece complicada, y además podrás lucirte dejando atrás código PHP 5.X y pasarlo a 7.

# El "código"
Todo son risas y unicornios hasta que ves el código. Espagueti del bueno.

* Aprovecha que estás en época valle y **piensa bien el rediseño de tu mini-aplicación**. Luego tendréis muchísima faena y no podréis dedicarle tanto tiempo a ello.
* Aplica la **arquitectura de software y patrones de diseño** que consideres necesarios para cumplir con lol requisitos que te ha comentado el jefe.
* Por el código, parece que las buenas prácticas no están muy extendidas en el equipo de desarrollo. Tienes la oportunidad de ganarte la credibilidad del equipo con esta primera tarea para luego poder ir introduciéndolas teniendo esta como ejemplo. Para ello **elabora un breve informe** (menos de 5 páginas) especificando:
    * Algunos de los **Code Smells** que has solucionado
    * Algunos de los **Refactorings** concretos has aplicado (recuerda poner ejemplos de código para que no se piensen que todo esto va de teoría y ponis).
    * Qué **Arquitectura de Software** implementa y cómo se refleja eso en el código. A pesar de que sea una mini-aplicación, es un escenario perfecto para un ejemplo "controlado".
* Recuerda: “El refactoring es el arte de remover la mierda por dentro sin que se note por fuera”, es decir: **todo debe seguir funcionando como hasta ahora**.

# El Traficante de Enlaces
Te viene El Desarrollador Coleguita, que ahora está liado en otro proyecto de la empresa, y al verte un poco abrumado, te pasa los siguientes enlaces sin que lo vea nadie, royo Traficante De Enlaces:

## Code Smells y Refactorings
* [Vídeo Qué son los Code Smells y el Refactoring](http://codely.tv/screencasts/code-smells-refactoring/)
* [Refactoring Guru](http://refactoring.guru/)
* [SourceMaking - Refactoring](http://sourcemaking.com/refactoring)
* [Refactoring.com - Catalog](http://refactoring.com/catalog/)
* [Vídeos de CodelyTV Refactoring](http://codely.tv/tag/refactoring/) (esto es crema, te dice :P)

## Patrones de diseño
* [SourceMaking - Design Patterns](http://sourcemaking.com/design_patterns)
* [Examples of Design Patterns in PHP](https://github.com/domnikl/DesignPatternsPHP) (y [2](https://github.com/zfcampus/zendcon-design-patterns))

## Arquitectura
* [Introducción Arquitectura Hexagonal – DDD](http://codely.tv/screencasts/arquitectura-hexagonal-ddd/)
* [DDD y CQRS: Preguntas Frecuentes](http://codely.tv/screencasts/ddd-cqrs-preguntas-frecuentes/)
* [De código acoplado al framework a microservicios pasando por DDD](http://codely.tv/screencasts/codigo-acoplado-framework-microservicios-ddd/)

## Passwords en PHP
* [FAQ](http://php.net/manual/en/faq.passwords.php)
* [Manual](http://php.net/manual/en/book.password.php)

# El Traficante de Enlaces Psicópata
Ojito! Al segundo día que vas al trabajo, escuchas al jefe hablando con El Traficante de Enlaces. Le está comentando que para **cuando acabe su proyecto se pondrá a trabajar contigo**.

En ese momento te das cuenta que **posiblemente sea un psicópata**. _Tienes_ que dejar un buen código, el traficante psicópata trabajará contigo y no te interesa que llegue y no le guste la base de código que haya.

Para tantear el terreno, le pasas [este vídeo](https://www.youtube.com/watch?v=WosrUnjb2UQ) al traficante psicópata y no le hace gracia. **Vas a tener que dejar un código muy bueno**, el amigo no se anda con tonterías. Como primeros pasos, tu mente te dice que para tenerlo contento:

* El nombre del repo será: `3_Refactoring-TuNombreYApellido`
* Harás commits frecuentes con commit messages descriptivos
* El repo sólo tendrá una única rama (`master`) en el momento de la entrega
* El informe estará en el mismo repositorio (PDF o Markdown)
* Se incluirán unas breves instrucciones de cómo ejecutar la aplicación

# Aclaraciones
* El ejercicio de refactorizar se limita al código que se asume como propio de GanianesCorp (sistema de registro y login). No se pide entrar al código de la librería `PasswordHash.php` a menos que lo necesites
* Los usuarios registrados actualmente deben poder seguir iniciando sesión (deberás usar la librería actual para que el login les siga funcionando)
* Se deben usar las funciones de password hashing introducidas en PHP 5.5 para los nuevos registros ya que ésta es más óptima y segura
* El registro debe estar disponible por consola y por web
* Usa patrones de diseño para conseguir un código modular y desacoplado. No obstante, recuerda no abusar de ellos acabando con diseños excesivamente complejos
* La semántica y la calidad del código es crítica. Haz uso de todos tus conocimientos
* Puedes integrar librerías de terceros (sistema de templating, gestión de rutas, de consola, etc.)
