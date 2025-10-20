<?php

use Illuminate\Support\Str;

if (!function_exists('format_isbn')) {
    /**
     * Formatea una cadena de ISBN (ISBN-10 o ISBN-13) con guiones.
     *
     * @param string|null $isbn
     * @return string
     */
    function format_isbn(?string $isbn): string
    {
        if (empty($isbn)) {
            return 'No disponible';
        }

        // Eliminar cualquier carácter que no sea número o 'X'
        $cleanIsbn = preg_replace('/[^0-9Xx]/', '', $isbn);

        // ISBN-13 (ejemplo: 9783161484100 → 978-3-16-148410-0)
        if (strlen($cleanIsbn) === 13) {
            return preg_replace('/(\d{3})(\d{1})(\d{2})(\d{6})(\d{1})/', '$1-$2-$3-$4-$5', $cleanIsbn);
        }

        // ISBN-10 (ejemplo: 316148410X → 3-16-148410-X)
        if (strlen($cleanIsbn) === 10) {
            return preg_replace('/(\d{1})(\d{2})(\d{6})([\dXx]{1})/', '$1-$2-$3-$4', $cleanIsbn);
        }

        // Si no coincide con ninguna longitud válida
        return $isbn;
    }
}
