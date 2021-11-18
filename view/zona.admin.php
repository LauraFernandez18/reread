<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zona Admin</title>
    <link rel="shortcut icon" href="../img/book-dead-solid.svg" type="image/x-icon">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include '../services/connection.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
    }
    
    ?>
    
    <ul class="padding-lat">
        <li><a>Hola <?php echo $_SESSION['email'];?></a></li>
        <li class="right">
            <a href="../processes/logout.proc.php">Logout</a>
        </li>
    </ul>
    <div class="row padding-top padding-lat">
        <div class="column-2">
            <form action="" method="post">
                <input type="submit" value="añadir libro">
            </form>
        </div>
        <div class="column-2" id="filter">
            <form action="zona.admin.php" method="post">
                <input type="text" placeholder="buscar por título..." name="titulo">
                <input type="submit" value="filtrar" name="filtro">
            </form>
        </div>
    </div>

    <div class="row padding-top-less padding-lat">
        <div class="column-1">
            <?php
            $libros = mysqli_query($conn,"SELECT books.Title,books.Description,authors.name 
            FROM books 
            INNER JOIN booksauthors ON books.Id=booksauthors.BookId 
            INNER JOIN authors ON booksauthors.AuthorId=authors.Id;");
            echo "<table class='table table-light'>";
            echo "<tr>";
            echo "<th>Titulo</th>";
            echo "<th>Descripcion</th>";
            echo "<th>Autor</th>";
            echo "</tr>";

            /* ej 2 */

            if(isset($_POST['filtro']) and !empty($_POST['titulo'])){
                $consulta="SELECT b.Title, b.Description, a.Name from books b inner join booksauthors ba on b.Id=ba.BookId inner join authors a on ba.AuthorId=a.Id where b.Title LIKE '%".$_POST['titulo']."%';";
            }else{
                $consulta="SELECT b.Title, b.Description, a.Name from books b inner join booksauthors ba on b.Id=ba.BookId inner join authors a on ba.AuthorId=a.Id;";
            }
            
                $query=mysqli_query($conn,$consulta);
                $libros=mysqli_fetch_all($query,MYSQLI_ASSOC);

            //ej1
            foreach ($libros as $libro) {
                echo "<tr>";
                echo "<td>{$libro['Title']}</td>";
                echo "<td>{$libro['Description']}</td>";
                echo "<td>{$libro['name']}</td>";
                echo '</tr>'; 
            }
            ?>
            </table>
        </div>
    </div>
</body>

</html>