# Aplicación Web Vulnerable (DEMO)

⚠️ **ADVERTENCIA: Esta es una aplicación deliberadamente vulnerable para propósitos de demostración. NO USAR EN PRODUCCIÓN** ⚠️

## Vulnerabilidades incluidas

1. SQL Injection (SQLi)
   - En login.php: Consulta SQL sin preparar
   - En search.php: Búsqueda vulnerable

2. Cross-Site Scripting (XSS)
   - XSS Reflejado en search.php
   - XSS basado en DOM en frontend

3. Malas prácticas de seguridad
   - Credenciales hardcodeadas
   - Falta de sanitización de entrada
   - Falta de validación de datos
   - Falta de CSRF tokens

## Misconfigurations
- Credenciales de base de datos en texto plano
- Mensajes de error detallados expuestos
- Sin HTTPS forzado
- Sin headers de seguridad básicos

## Propósito
Este repositorio es solo para fines educativos y de demostración. Muestra ejemplos de código vulnerable común para ayudar a entender cómo NO se debe desarrollar una aplicación web.