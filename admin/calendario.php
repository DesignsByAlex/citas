<?php
// Incluir archivo de configuración de la base de datos
include("model/conexion.php");

try {
    // Consulta SQL para obtener las citas de la tabla "reservas"
    // Asegúrate de que los nombres de las columnas sean correctos
    $sql = "SELECT ID AS id, Nombre AS title, Fecha AS start, Hora AS time FROM reservas";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Crea un array para almacenar las citas
    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    echo "Error en la base de datos: " . $e->getMessage();
    $citas = []; // Asignar un array vacío en caso de error
}

// Cierra la conexión a la base de datos
$db = null;

// Convierte las citas a formato JSON para que JavaScript las pueda utilizar
$citas_json = json_encode($citas);
?>

<!DOCTYPE html>
<html>
<head>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/es.js'></script>
</head>
<body>

    <div id='calendar'></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?php echo $citas_json; ?>, // Carga las citas desde PHP
            locale: 'es', // Cambia el idioma a español
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false
            },
            dayHeaderFormat: {
                weekday: 'short',
                month: 'numeric',
                day: 'numeric'
            },
            views: {
                dayGridMonth: {},
                timeGridWeek: {},
                timeGridDay: {}
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            navLinks: true, // Habilitar enlaces en los eventos para navegar
            editable: false // No permitir arrastrar y soltar eventos para moverlos
        });
        calendar.render();
    });
    </script>
</body>
</html>
