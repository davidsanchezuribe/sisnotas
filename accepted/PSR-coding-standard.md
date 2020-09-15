#  Guía de estilo de programación
Se debe tener presente esta guiá para poder participar en el proyecto

## PSR-1: Codificación estandar básica
- Los nombres de las clases DEBEN declararse en formato *StudlyCaps*
```php
class NombreDeLaClase 
{
....body
}
```
- El nombre de las constantes DEBEN estar en mayúsculas. 
> const FECHA_DE_NACIMIENTO = “1999”

- Los nombres de los métodos DEBEN declararse en notación *camelCase* 
> getIdEstudiante()

## PSR-2: Guía de estilo de codificación
- No se debe usar tabulaciones. En su lugar, se deben usar cuatro espacios para indentación. 
- La apertura de llaves debe estar en la siguiente línea de la declaración de una clase, de una función o de un método, y el cierre justo la línea después del cuerpo
- Extensiones e implementaciones: extend y implements deben declararse en la misma línea de la clase y las llaves de la clase en líneas diferentes.
```php
class NombreClase exteds ClasePadre
{
....body
}
```