# Instrucciones de documentación

La primera consideración es que **NO debes editar ningún fichero de README.md para tu propia documentación**. Si quieres corregir algún error ortográfico o de cualquier tipo, realízalo a través de un pull request.

Para documentar tu código debes contemplar los siguientes aspectos:

## Mecanismo de versionado

Cuando tengas un revisión de tu código que consideres estable, etiquétala de la siguiente manera
`v1.y.z-usuario`

* Donde `y`, es un número que incrementarás empezando por el 0, cuando realices cambios en tu programa que se puedan apreciar desde la interfaz gráfica (aspectos funcionales)
* Donde `z`, es un número que incrementarás empezando por el 0, cuando realices correcciones en tu programa o refactorizaciones. (aspectos NO funcionales)
* Donde `usuario`, es el indentificador que se te ha proporcicionado en clase.

**Importante:** Sé estricto y preciso formando la cadena de la versión. Utiliza caracteres [ASCII](https://es.wikipedia.org/wiki/ASCII) (sin acentos). Pon tu nombre con la primera letra en minúscula siguiendo el resto con el estilo [lowerCamelCase](https://es.wikipedia.org/wiki/CamelCase). Recuerda que esto es importante porque pueden existir mecanismos de automatización de revisión de ejercicios.

```Shell
# Ejemplo
git tag v1.0.0-juanCarlosDeBorbon
```