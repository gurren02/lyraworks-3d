# Descripción General

Desarrollarás un sistema desde cero aplicado a un dominio real. En este proyecto final no solo evaluaremos que el usuario pueda "entrar y salir" del sistema, sino cómo el software interactúa proactivamente con el usuario mediante la generación de documentos, correos y procesos automáticos.

---

# Sugerencias de dominio (Elige uno o propón el tuyo)

Para que tengas una idea clara de qué construir, aquí tienes ejemplos de negocios y cómo aplicarían las nuevas reglas de automatización:

## BarberShop / Estética
Gestión de barberos, servicios y citas.

**Ejemplo de automatización:**  
Recordatorio de cita por WhatsApp un día antes.

---

## Veterinaria
Mascotas, dueños, historial clínico y citas.

**Ejemplo de automatización:**  
Envío de receta médica o comprobante de vacuna en PDF al correo del dueño.

---

## Gimnasio
Clases, entrenadores, membresías.

**Ejemplo de automatización:**  
Tarea programada que envíe un correo de aviso 3 días antes de que venza la mensualidad.

---

## Coworking
Salas, reservas, clientes.

**Ejemplo de automatización:**  
Al reservar, llega un PDF al correo con la confirmación y las reglas del espacio.

---

## Escuela de música
Alumnos, instrumentos, clases.

**Ejemplo de automatización:**  
Envío automático de calificaciones o asistencia en PDF al final del mes.

---

Si tienes otra idea relacionada con tu realidad (negocio familiar, emprendimiento, etc.), también es válida, siempre que cumpla con los requisitos técnicos.

---

# Requisitos Técnicos Mínimos

Además del Login y la gestión de Roles (Ej: Admin, Staff, Cliente), tu proyecto debe incluir:

## Integración de Documentación
Generación de un reporte o comprobante en PDF con diseño profesional.

## Notificaciones Reales
Implementación de envíos de Email (vía Mailtrap/SMTP) o WhatsApp (vía API) disparados por eventos del sistema (ej. al guardar un registro).

## Lógica de Negocio Profesional

- Uso de Soft Deletes en el módulo principal para no perder historial.
- Uso de validaciones estrictas en el backend.

## Automatización (Cron Jobs)
Configuración de al menos un comando o tarea programada (Task Scheduling) que el sistema ejecute solo, sin intervención humana.