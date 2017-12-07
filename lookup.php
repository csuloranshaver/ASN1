<?php
    require_once('database.php');

    $userTerm = $_POST['term'];
    $userSubject = $_POST['subject'];
    
    /*Monster query incoming*/
    
    $query = "SELECT section.crn, section.sectionNum, section.location,
                     section.days, section.startTime, section.endTime,
                     section.startDate, section.endDate,
                     course.title, course.description, course.subjectCode,
                     course.courseType, course.creditHours,
                     subject.subjectAbbr,
                     instructor.lastName, instructor.firstName,
                     instructor.middleName
              FROM section
              JOIN course ON section.courseID = course.courseID
              JOIN subject ON course.subjectID = subject.subjectID
              JOIN term ON section.termID = term.termID
              JOIN instructor on section.instructorID = instructor.instructorID
              WHERE section.termID = ?
              AND course.subjectID = ?";
              
    $stmt = $db->prepare($query);
    $stmt->bind_param('ii', $userTerm, $userSubject);
    $stmt->execute();
    
    $stmt->store_result();
    $stmt->bind_result($crn, $sectionNum, $location, $days, $startTime,
                       $endTime, $startDate, $endDate, $title, $description,
                       $subjectCode, $courseType, $creditHours, $subjectAbbr,
                       $lastName, $firstName, $middleName);
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
            
            <div class="classList" style="width:100%; ">
                <?php while ($stmt->fetch()) : ?>
                    <table">
                        <tr style="font-weight:bold;">
                            <td colspan=2><?php echo $subjectAbbr." ".$subjectCode ?></td>
                            <td colspan=2><?php echo $title ?></td>
                            <td colspan=2><?php echo "Credits: ".$creditHours ?></td>
                        </tr>
                        <tr>
                            <td colspan=6><?php echo $description ?></td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td>CRN</td>
                            <td>Section</td>
                            <td>Day</td>
                            <td>Time</td>
                            <td>Location</td>
                            <td>Instructor</td>
                        </tr>
                        <tr>
                            <td><?php echo $crn ?></td>
                            <td><?php echo $sectionNum ?></td>
                            <td><?php echo $days ?></td>
                            <td><?php echo $startTime." - ".$endTime ?></td>
                            <td><?php echo $location ?></td>
                            <td><?php echo $lastName.", ".$firstName." ".$middleName ?></td>
                        </tr>
                    </table>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Soylent Green, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>

<?php
    $stmt -> free_result();
    $db -> close();
?>