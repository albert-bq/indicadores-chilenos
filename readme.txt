=== Indicadores Chilenos ===
Contributors: Luis Bustos Quezada
Plugin URI: http://kreaweb.cl
Author: Luis Bustos Quezada
Author URI: http://kreaweb.cl
Tags: indicadores, economía, Chile, shortcodes
Requires at least: 5.0
Tested up to: 6.2
Stable tag: 1.0
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Indicadores Chilenos es un plugin que permite mostrar diversos indicadores económicos de Chile en tu sitio de WordPress mediante el uso de shortcodes.

== Descripción ==
Indicadores Chilenos es un plugin que permite mostrar diversos indicadores económicos de Chile en tu sitio de WordPress mediante el uso de shortcodes.

== Instalación ==
1. Sube la carpeta `indicadores-chilenos` al directorio `/wp-content/plugins/`.
2. Activa el plugin a través del menú `Plugins` en WordPress.
3. Utiliza los shortcodes para mostrar los indicadores económicos en tu contenido.

== Uso ==
Utiliza los siguientes shortcodes en cualquier parte de tu sitio de WordPress para mostrar los indicadores económicos:
- `[uf]` - Muestra el valor actual de la UF.
- `[ivp]` - Muestra el valor actual del IVP.
- `[dolar]` - Muestra el valor actual del Dólar.
- `[dolar_intercambio]` - Muestra el valor actual del Dólar Intercambio.
- `[euro]` - Muestra el valor actual del Euro.
- `[ipc]` - Muestra el valor actual del IPC.
- `[utm]` - Muestra el valor actual de la UTM.
- `[imacec]` - Muestra el valor actual del IMACEC.
- `[tpm]` - Muestra el valor actual de la TPM.
- `[libra_cobre]` - Muestra el valor actual de la Libra de Cobre.
- `[tasa_desempleo]` - Muestra el valor actual de la Tasa de Desempleo.
- `[bitcoin]` - Muestra el valor actual del Bitcoin.

También puedes usar el shortcode general con el atributo `tipo` para cualquier indicador:
`[indicador tipo="uf"]`
Reemplaza `"uf"` por cualquier indicador disponible.

== Página de Administración ==
Después de activar el plugin, encontrarás una nueva opción en el menú de administración llamada `Indicadores 📈`. Aquí podrás ver una lista de todos los shortcodes disponibles y ejemplos de uso.

== Preguntas Frecuentes ==
= ¿Cómo puedo mostrar un indicador específico en mi página o publicación? =
Puedes usar el shortcode específico para el indicador que deseas mostrar, por ejemplo, `[uf]` para la UF. También puedes usar el shortcode general `[indicador tipo="uf"]`.

= ¿Qué hago si los datos no se muestran? =
Asegúrate de que tu sitio tenga acceso a internet para poder obtener los datos de la API. Si el problema persiste, verifica si hay algún error en el archivo `debug.log` de WordPress.

== Registro de Cambios ==
= 1.0 =
* Versión inicial del plugin con soporte para múltiples indicadores económicos.

== Licencia ==
Este plugin está licenciado bajo la GPLv2. Para más información, visita [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html).
