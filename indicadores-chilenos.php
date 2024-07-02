<?php
/*
Plugin Name: Indicadores Chilenos
Plugin URI: http://kreaweb.cl
Description: Un plugin que muestra indicadores económicos de Chile mediante shortcodes.
Version: 1.0
Author: Luis Bustos Quezada
Author URI: http://kreaweb.cl
License: GPL2
*/

// Evitar el acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Función para obtener datos de la API
function ic_obtener_datos_economicos($indicador) {
    $api_url = "https://mindicador.cl/api/" . $indicador;
    $response = wp_remote_get($api_url);
    
    if (is_wp_error($response)) {
        return 'Error al obtener los datos';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (isset($data['serie'][0]['valor'])) {
        return $data['serie'][0]['valor'];
    } else {
        return 'Datos no disponibles';
    }
}

// Shortcode para mostrar cualquier indicador
function ic_shortcode_indicador($atts) {
    $atts = shortcode_atts(array('tipo' => ''), $atts, 'indicador');
    $indicador = esc_attr($atts['tipo']);
    $valor = ic_obtener_datos_economicos($indicador);
    return "<div class='ic-indicador'><strong>" . strtoupper($indicador) . ":</strong> " . $valor . "</div>";
}
add_shortcode('indicador', 'ic_shortcode_indicador');

// Shortcodes individuales para cada indicador
function ic_shortcode_uf() { return ic_obtener_datos_economicos('uf'); }
function ic_shortcode_ivp() { return ic_obtener_datos_economicos('ivp'); }
function ic_shortcode_dolar() { return ic_obtener_datos_economicos('dolar'); }
function ic_shortcode_dolar_intercambio() { return ic_obtener_datos_economicos('dolar_intercambio'); }
function ic_shortcode_euro() { return ic_obtener_datos_economicos('euro'); }
function ic_shortcode_ipc() { return ic_obtener_datos_economicos('ipc'); }
function ic_shortcode_utm() { return ic_obtener_datos_economicos('utm'); }
function ic_shortcode_imacec() { return ic_obtener_datos_economicos('imacec'); }
function ic_shortcode_tpm() { return ic_obtener_datos_economicos('tpm'); }
function ic_shortcode_libra_cobre() { return ic_obtener_datos_economicos('libra_cobre'); }
function ic_shortcode_tasa_desempleo() { return ic_obtener_datos_economicos('tasa_desempleo'); }
function ic_shortcode_bitcoin() { return ic_obtener_datos_economicos('bitcoin'); }

add_shortcode('uf', 'ic_shortcode_uf');
add_shortcode('ivp', 'ic_shortcode_ivp');
add_shortcode('dolar', 'ic_shortcode_dolar');
add_shortcode('dolar_intercambio', 'ic_shortcode_dolar_intercambio');
add_shortcode('euro', 'ic_shortcode_euro');
add_shortcode('ipc', 'ic_shortcode_ipc');
add_shortcode('utm', 'ic_shortcode_utm');
add_shortcode('imacec', 'ic_shortcode_imacec');
add_shortcode('tpm', 'ic_shortcode_tpm');
add_shortcode('libra_cobre', 'ic_shortcode_libra_cobre');
add_shortcode('tasa_desempleo', 'ic_shortcode_tasa_desempleo');
add_shortcode('bitcoin', 'ic_shortcode_bitcoin');

// Añadir menú de administración
function ic_menu_administracion() {
    add_menu_page(
        'Indicadores Chilenos', // Título de la página
        'Indicadores 📈', // Título del menú
        'manage_options', // Capacidad
        'indicadores_chilenos', // Slug del menú
        'ic_pagina_administracion', // Función
        'dashicons-chart-line', // Icono
        90 // Posición
    );
}
add_action('admin_menu', 'ic_menu_administracion');

// Contenido de la página de administración
function ic_pagina_administracion() {
    echo '<div class="wrap">';
    echo '<h1>Indicadores Chilenos</h1>';
    echo '<p>Utiliza los siguientes shortcodes para mostrar los indicadores económicos en tu sitio de WordPress:</p>';
    echo '<ul>';
    echo '<li><code>[uf]</code> - Muestra el valor actual de la UF.</li>';
    echo '<li><code>[ivp]</code> - Muestra el valor actual del IVP.</li>';
    echo '<li><code>[dolar]</code> - Muestra el valor actual del Dólar.</li>';
    echo '<li><code>[dolar_intercambio]</code> - Muestra el valor actual del Dólar Intercambio.</li>';
    echo '<li><code>[euro]</code> - Muestra el valor actual del Euro.</li>';
    echo '<li><code>[ipc]</code> - Muestra el valor actual del IPC.</li>';
    echo '<li><code>[utm]</code> - Muestra el valor actual de la UTM.</li>';
    echo '<li><code>[imacec]</code> - Muestra el valor actual del IMACEC.</li>';
    echo '<li><code>[tpm]</code> - Muestra el valor actual de la TPM.</li>';
    echo '<li><code>[libra_cobre]</code> - Muestra el valor actual de la Libra de Cobre.</li>';
    echo '<li><code>[tasa_desempleo]</code> - Muestra el valor actual de la Tasa de Desempleo.</li>';
    echo '<li><code>[bitcoin]</code> - Muestra el valor actual del Bitcoin.</li>';
    echo '</ul>';
    echo '<p>También puedes usar el shortcode general con el atributo <code>tipo</code> para cualquier indicador:</p>';
    echo '<pre><code>[indicador tipo="uf"]</code></pre>';
    echo '<p>Reemplaza <code>"uf"</code> por cualquier indicador disponible.</p>';
    echo '</div>';
}

// Firma del plugin
function ic_firma_final() {
    echo '<p style="text-align:center; font-size:12px;">Hecho con <span style="color:#e25555;">&#10084;</span> en Magallanes.</p>';
}
add_action('wp_footer', 'ic_firma_final');
?>
