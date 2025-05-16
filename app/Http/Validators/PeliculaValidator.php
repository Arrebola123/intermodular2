<?php

declare(strict_types=1);

namespace App\Http\Validators;
use App\Core\Response;

class PeliculaValidator {

    public static function validate(array $data): void {
        $errors = [];

        $titulo_valido = isset($data['titulo']) && trim($data['titulo']) !== '';
        $estreno_valido = isset($data['estreno']) && filter_var($data['estreno'], FILTER_VALIDATE_INT) 
            && (int) $data['estreno'] > 1900 && (int) $data['estreno'] <= date('Y');
        $sinopsis_valida = isset($data['sinopsis']) && trim($data['sinopsis']) !== '';
        $duracion_valida = isset($data['duracion']) && filter_var($data['duracion'], FILTER_VALIDATE_INT) 
            && (int) $data['duracion'] > 0;

        if (!$titulo_valido) {
            $errors['titulo'] = 'El título es obligatorio.';
        }

        if (!$estreno_valido) {
            $errors['estreno'] = 'El año de estreno debe ser un número entero entre 1901 y el año actual.';
        }

        if (!$sinopsis_valida) {
            $errors['sinopsis'] = 'La sinopsis es obligatoria.';
        }

        if (!$duracion_valida) {
            $errors['duracion'] = 'La duración debe ser un número entero mayor que 0 minutos.';
        }

        if ($errors) {
            back()->withErrors($errors)->withInput($data)->send();
        }
    }
}

