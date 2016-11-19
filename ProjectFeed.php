

    <?php

    include 'Version1DB.php';


        $user="U2752013";
        $pass="eugen200";
        $ProjectDatabase = new Version1DB("rdbms.strato.de",$user, $pass);
        $dbConnection = $ProjectDatabase->connect();
        //Case: User adds ProjectTitle
        $allProjectList = $ProjectDatabase->getAllProjects($dbConnection);
        printAllProjectsTable($allProjectList);

    function printAllProjectsTable($projectList) {

        echo "<table>";
        echo "<tr>";
        echo "<th></th>";
        echo "</tr>";


        $img_url = "http://localhost:8888/media/images/projects/";




        $rowCount = 0;
        while ($row = $projectList->fetch()) { //Hier Cards rausspucken

            //Cards_Code
            $htmlForCards="<div class=\"card medium col s12 l6\">
    <div class=\"card-image waves-effect waves-block waves-light\">
      <img class=\"activator\" src=".$img_url.$row['projectId'].$row['projectImagePath']." style='width:300px' />
    </div>
	<!--Karten FrontFace-->
    <div class=\"card-content\">
      <span class=\"Chat card-title activator grey-text text-darken-4 \">".$row['projectTitle']."<i class=\"material-icons right\">video_library</i></span>
      <p class=\"userName\">".$row['projectDescription']."</p>
		<a class=\"blue lighten-1 waves-effect waves-light btn right\"><i class=\"material-icons left\">zoom_in</i>Details</a>
		<a class=\"blue lighten-1 waves-effect waves-light btn right\"><i class=\"material-icons right\">chat</i>Chat</a>
		
    </div>
		<!--Karten InnenSeite-->
    <div class=\"card-reveal\">
      <span class=\"card-title grey-text text-darken-4\">Wachse über dich Hinaus!<i class=\"material-icons right\">close</i></span>
		
		<div class=\"video-container\">
        <iframe width=\"853\" height=\"480\" src=\"//www.youtube.com/embed/_nQoYH3lYBg?rel=0\" frameborder=\"0\" allowfullscreen></iframe>
      </div>
		<p>Das ist ein Text</p>
    </div>
  </div>";





            echo $htmlForCards;
            echo "<tr>";
            echo "<td>".$row["projectTitle"]."
            <button id=".$row['projectId'].">Mitmachen</button>
            <img src=".$img_url.$row['projectImagePath']." style='width:300px' /></td>";
            echo "</tr>";

            echo "<tr>";
            echo "</tr>";
            $rowCount++;
        }
        echo "</table>";
    }

    ?>

