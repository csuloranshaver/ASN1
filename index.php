<?php
    require_once('database.php');
    
    $termQuery = "SELECT termID, label 
                  FROM term";
              
    $termStmt = $db->prepare($termQuery);
    $termStmt->execute();
    
    $termStmt->store_result();
    $termStmt->bind_result($termID, $termLabel);
    
    $subjectQuery = "SELECT subjectID, subjectName, subjectAbbr 
                     FROM subject
                     ORDER BY subjectAbbr";
              
    $subjectStmt = $db->prepare($subjectQuery);
    $subjectStmt->execute();
    
    $subjectStmt->store_result();
    $subjectStmt->bind_result($subjectID, $subjectName, $subjectAbbr);
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>CSU Course Lookup</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>CSU Course Lookup</h1>
    </div>

    <div id="main">

        <h1>Course Lookup</h1>

        <div id="content">
            <form action="lookup.php" method="post">

                <div id="data">
                    <label>Semester:</label>
                    <select name="term">
                        <?php while ($termStmt->fetch()) : ?>
                        <option value=<?php echo $termID ?>><?php echo $termLabel ?></option>
                        <?php endwhile; ?>
                    </select>
                    
                    <br>
    
                    <label>Subject:</label>
                    <select name="subject">
                        <?php while ($subjectStmt->fetch()) : ?>
                        <option value=<?php echo $subjectID ?>><?php echo $subjectAbbr." - ".$subjectName ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
    
                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Lookup Courses" /><br />
                </div>

            </form>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> CSU</p>
    </div>

    </div><!-- end page -->
</body>
</html>