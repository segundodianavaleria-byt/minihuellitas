<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Procesar URL de imagen para que funcione correctamente
     */
    public static function processUrl($url)
    {
        if (empty($url)) {
            return 'https://placehold.co/400x300?text=Sin+Imagen';
        }
        
        // Si es una URL de Google Images, intentar extraer la URL real
        if (strpos($url, 'google.com/imgres') !== false || strpos($url, 'googleusercontent.com') !== false) {
            // Extraer la URL de la imagen de Google
            preg_match('/imgurl=([^&]+)/', $url, $matches);
            if (isset($matches[1])) {
                $url = urldecode($matches[1]);
            }
        }
        
        // Verificar si es una URL válida de imagen
        $extensiones = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        $esImagen = false;
        foreach ($extensiones as $ext) {
            if (stripos($url, '.' . $ext) !== false) {
                $esImagen = true;
                break;
            }
        }
        
        // Si no parece una imagen directa, usar placeholder
        if (!$esImagen && !filter_var($url, FILTER_VALIDATE_URL)) {
            return 'https://placehold.co/400x300?text=Imagen+no+disponible';
        }
        
        return $url;
    }
    
    /**
     * Obtener URL de placeholder para productos
     */
    public static function getPlaceholder($categoria = 'producto')
    {
        $placeholders = [
            'alimento' => 'https://placehold.co/400x300/F97316/white?text=Alimento',
            'aseo' => 'https://placehold.co/400x300/3B82F6/white?text=Aseo',
            'juguete' => 'https://placehold.co/400x300/8B5CF6/white?text=Juguete',
            'accesorio' => 'https://placehold.co/400x300/10B981/white?text=Accesorio',
            'snack' => 'https://placehold.co/400x300/F59E0B/white?text=Snack',
            'default' => 'https://placehold.co/400x300/9CA3AF/white?text=Producto'
        ];
        
        return $placeholders[$categoria] ?? $placeholders['default'];
    }
}