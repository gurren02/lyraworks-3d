# Documentación Técnica del Proyecto: Healthify

Este documento detalla todas las herramientas, librerías, frameworks y procesos utilizados en el desarrollo de la aplicación de gestión de citas médicas **Healthify**.

## 🛠 Stack Tecnológico Principal

### Backend
- **Framework:** [Laravel 12.x](https://laravel.com/)
- **PHP:** Versión ^8.2
- **Base de Datos:** MySQL (Producción/Local) y SQLite (Entorno de pruebas)
- **Gestión de Dependencias:** Composer

### Frontend
- **Framework UI:** [Livewire 3.x](https://livewire.laravel.com/) (Full-stack para Laravel)
- **Estilos (CSS):** [Tailwind CSS 3.4](https://tailwindcss.com/)
- **Componentes UI:** 
  - [Flowbite](https://flowbite.com/) (Basado en Tailwind)
  - [WireUI](https://livewire-wireui.com/) (Componentes específicos para Livewire)
- **Tablas Dinámicas:** [Rappasoft Laravel Livewire Tables](https://rappasoft.com/docs/laravel-livewire-tables/v3)
- **Build Tool:** [Vite](https://vitejs.dev/)

---

## 📧 Envío de Correos Electrónicos

El sistema de correos está integrado nativamente con el motor de Mail de Laravel.

- **Proveedor de Servicio:** Gmail SMTP.
- **Configuración:**
  - **Host:** `smtp.gmail.com`
  - **Puerto:** 587 (TLS)
  - **Autenticación:** Uso de "Contraseñas de aplicación" de Google para mayor seguridad.
- **Procesos:**
  - **Confirmación Inmediata:** Se envía un correo al paciente cuando se registra o confirma una cita.
  - **Recordatorios Automáticos:** Se envían correos 24 horas antes de la cita mediante una tarea programada.
  - **Reportes Diarios:** Envío automático de la agenda del día a doctores y administradores.

---

## 📱 Envío de Mensajes por WhatsApp

Se implementó un sistema flexible de mensajería a través del servicio `WhatsAppService`.

- **Herramienta Principal (Actual):** **Evolution API v2**
  - **Tipo:** API Auto-hosteada mediante Docker.
  - **Funcionamiento:** Actúa como un puente (bridge) entre Laravel y una instancia de WhatsApp Web, permitiendo enviar mensajes sin cargos por mensaje de APIs oficiales.
- **Herramientas Alternativas (Soportadas):**
  - **Twilio:** Integración con la API oficial de Twilio para WhatsApp.
  - **Meta API:** Integración directa con el WhatsApp Business Platform de Meta.
- **Procesos:**
  - **Recordatorios:** El comando `php artisan appointments:send-reminders` busca citas para el día siguiente y envía mensajes personalizados.
  - **Normalización:** Los números telefónicos son procesados automáticamente para incluir el código de país (ej. `+52 1` para México).

---

## 📄 Generación de Documentos PDF

Se utiliza la librería `barryvdh/laravel-dompdf` para la creación de documentos dinámicos.

- **Proceso:**
  - Se diseñan plantillas en HTML/CSS (Blade) dentro de `resources/views/pdf/`.
  - El servicio `PdfService` renderiza estas vistas y las convierte en binarios PDF.
- **Documentos Generados:**
  - **Comprobantes de Cita:** Incluyen detalles del paciente, doctor, fecha y un código QR único.
  - **Reportes Diarios:** Resumen de todas las citas del día para uso administrativo.

---

## 🔐 Seguridad y Roles

- **Autenticación:** [Laravel Jetstream](https://jetstream.laravel.com/) con **Sanctum**.
- **Gestión de Permisos:** [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6/).
  - **Roles definidos:** Admin, Doctor, Recepcionista, Paciente.
  - Cada acción está protegida por políticas de acceso (Policies) y middleware.

---

## 🚀 Procesos de Automatización (Cron Jobs)

El proyecto utiliza el Scheduler de Laravel para ejecutar tareas en segundo plano:

1. **Recordatorios:** Ejecución diaria para notificar a pacientes sobre sus citas próximas.
2. **Limpieza:** Tareas de mantenimiento de sesiones y caché.
3. **Reportes:** Generación y envío de la agenda diaria a las 08:00 AM.

---

## 📦 Librerías Adicionales Relevantes

- **Laravel Lang:** Soporte multi-idioma (configurado en Español).
- **Faker PHP:** Generación de datos de prueba.
- **Pest:** Framework de pruebas unitarias y de integración de última generación.
- **Laravel Sail:** Entorno de desarrollo basado en Docker (opcional).
