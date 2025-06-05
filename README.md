<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto Cuenta - TDD con Laravel

Este repositorio contiene la implementación de la clase `Cuenta` en Laravel, desarrollada mediante la metodología TDD. Cada vez que haces push a la rama `main`, GitHub Actions ejecuta automáticamente los tests unitarios.

## Estructura principal

- `app/Models/Cuenta.php`: Clase `Cuenta`.
- `tests/Unit/CuentaTest.php`: Pruebas unitarias.
- `.github/workflows/laravel.yml`: Configuración de GitHub Actions para ejecutar PHPUnit.
- `composer.json`: Dependencias del proyecto.
- `phpunit.xml`: Configuración de PHPUnit.

## Instrucciones para ejecutar localmente

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/TU_USUARIO/Cuenta-TDD-Laravel.git
   cd Cuenta-TDD-Laravel
