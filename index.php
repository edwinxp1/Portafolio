<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Nintendo Switch 2</title>
    <link rel="icon" href="https://www.nintendo.com/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <header class="site-header">
        <h1>Nintendo Switch 2 🎮</h1>
        <nav>
            <a href="#autor">Autor</a>
        </nav>
    </header>

    <main>
        <h2>Todo sobre la Nintendo Switch 2</h2>
        <hr>

        <div class="switch-container">
            <img src="https://www.komplett.no/img/p/800/1319731_1.jpg" alt="Imagen de la Nintendo Switch 2" class="switch-image">

            <section id="Caracteristicas">
                <h3>🚀 Caracteristicas</h3>
                <img src="https://img.redbull.com/images/c_limit,w_1500,h_1000/f_auto,q_auto/redbullcom/2019/06/05/90cac166-4832-4f4f-9c74-213145fb70ce/mario-maker-2-entrevista" alt="Imagen de mario maker" class="switch-image">
                <p>
                    Es la consola mas nueva de Nintendo con un procesador más potente, usando un nuevo chip NVIDIA personalizado para la consola. Se con la posibilidad de soportar resoluciones de 4K en modo dock (dependiendo del juego) y que se mantenga estable en el modelo portátil con juegos de muy alta potencia, mejorando la calidad visual de los juegos ya existentes y los nuevos por añadir. Ademas de tener cambios como mandos magneticos, 2 puertos usb-c y mas tamaño en la consola.
                </p>
            </section>

            <section id="lanzamiento">
                <h3>🗓️ Eventos que surgieron en el lanzamiento</h3>
                <img src="https://i.kinja-img.com/image/upload/c_fill,h_675,pg_1,q_80,w_1200/0bc58989d2a4a853680360fa226b3fc9.jpg" alt="Imagen de la vaca" class="switch-image">
                <p>
                    Las filtraciones y análisis de la industria sugieren que la Nintendo Switch 2 podría ser anunciada oficialmente a finales de 2024, con un lanzamiento previsto para la <strong>primavera de 2025</strong>. En cuanto al precio, los expertos especulan que podría rondar los $399-$449 USD, un ligero aumento respecto a su predecesora debido a las mejoras en hardware.
                </p>
            </section>

            <section id="juegos">
                <h3>🕹️ Juegos Más Esperados</h3>
                <img src="https://log-wp-media.s3.amazonaws.com/wp-content/uploads/2025/04/DK-bananza-scaled.jpg" alt="Imagen de DK Bananza" class="switch-image">
                <p>
                    El catálogo de lanzamiento es crucial. Se espera con ansias una nueva entrega de <strong>The Legend of Zelda</strong>, un <strong>Mario Kart 9</strong> que aproveche las nuevas capacidades de la consola y, por supuesto, el tan esperado <strong>Metroid Prime 4</strong>. Además, es muy probable que veamos nuevas franquicias y el apoyo de desarrolladores externos desde el primer día.
                </p>
            </section>
        </div>

        <section id="autor" class="autor-info">
            <h2>Sobre el Autor</h2>
            <p>
                Hola mundo mi nombre es Edwin Rodríguez, esta es mi segunda pagina web hecha (ya que julian mando a hacer eso una vez), hice esta pagina pensando en la nintendo switch 2 y mas que todo hablar sobre mi. Soy una persona apasionada al mundo de los videojuegos y de la tegnologia pero sobre la comida, como anécdota el primer html lo hice en bloc de notas, y me acuerdo que lo pase medio mal por que intente hacer algo con CSS sin saber absolutamente nada y lo peor es que no era necesario, solo pidio un html simple (y con un contador de personas que no sirve xd)
                P.D: esta es una nueva edicion pero con php, lo sufri mucho con php, entre los 1000 y un errores que me saltaron de principio, acostumbrarme al hecho de que php no es lo mismo que html (a veces se me olvidaba como actualizar la pagina)ademas de que cambiar cosas en la config de apache me bloqueo el uso de phpmyadmin, pero en general todo bien.
            </p>
        </section>

        <hr>
        <section id="comentarios" class="comentarios-section">
            <h2>📝 Comentarios y Notas</h2>

            <div class="comentario-form-container">
                <h3>Agrega una nueva nota</h3>
                <form action="php/crud.php" method="post" class="comentario-form">
                    <div class="form-group">
                        <label for="nombreyapellido">Nombre y Apellido:</label>
                        <input type="text" id="nombreyapellido" name="nombreyapellido" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Nombre de Usuario (opcional):</label>
                        <input type="text" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nota">Nota:</label>
                        <textarea id="nota" name="nota" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="agregar_nota">Enviar Nota</button>
                </form>
            </div>

            <div class="notas-container">
                <h3>Notas recientes</h3>
                <?php
                // Incluir los archivos PHP para mostrar las notas
                include 'php/db_connection.php';
                include 'php/crud.php';

                $notas = obtenerNotas($conn);

                if ($notas) {
                    while ($row = $notas->fetch_assoc()) {
                        echo '<div class="nota-card">';
                        echo '  <div class="nota-header">';
                        echo '      <p class="nota-autor"><strong>' . htmlspecialchars($row['nombreyapellido']) . '</strong>';
                        if (!empty($row['usuario'])) {
                            echo ' (' . htmlspecialchars($row['usuario']) . ')';
                        }
                        echo '      </p>';
                        echo '      <p class="nota-fecha">Fecha: ' . htmlspecialchars($row['fechanota']) . '</p>';
                        echo '  </div>';
                        echo '  <p class="nota-contenido">' . htmlspecialchars($row['nota']) . '</p>';
                        echo '  <div class="nota-acciones">';
                        // Botón para Editar (abre un formulario modal)
                        echo '      <button class="editar-btn" onclick="mostrarFormularioEdicion(' . $row['id'] . ', \'' . addslashes(htmlspecialchars($row['nota'])) . '\')"><i class="fas fa-edit"></i> Editar</button>';
                        // Botón para Eliminar
                        echo '      <a href="php/crud.php?eliminar_nota=' . $row['id'] . '" class="eliminar-btn" onclick="return confirm(\'¿Estás seguro de que quieres eliminar esta nota?\')"><i class="fas fa-trash-alt"></i> Eliminar</a>';
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-notas">No hay notas todavía. ¡Sé el primero en dejar una!</p>';
                }

                $conn->close();
                ?>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <p>&copy; 2025 | Edwin Rodríguez - Portafolio</p>
    </footer>

    <div id="modal-edicion" class="modal">
        <div class="modal-contenido">
            <span class="cerrar-modal" onclick="cerrarFormularioEdicion()">&times;</span>
            <h4>Editar nota</h4>
            <form action="php/crud.php" method="post">
                <input type="hidden" id="edit-id" name="id_nota">
                <textarea id="edit-nota" name="nota_edita" rows="5"></textarea>
                <button type="submit" name="editar_nota">Guardar cambios</button>
            </form>
        </div>
    </div>

    <script>
        function mostrarFormularioEdicion(id, nota) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nota').value = nota;
            document.getElementById('modal-edicion').style.display = 'block';
        }

        function cerrarFormularioEdicion() {
            document.getElementById('modal-edicion').style.display = 'none';
        }

        // Cierra el modal si el usuario hace clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('modal-edicion');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>