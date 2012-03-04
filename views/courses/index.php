<?php

$this->set_layout("layouts/single_page_normal");
$page_title = "Stud.IP - Courses";
$page_id = "courses-index";

if (sizeof($courses)) {
    echo $this->render_partial('courses/_list.php');
} else { ?>
<p>Sie haben zur Zeit keine Veranstaltungen abonniert, an denen Sie teilnehmen k�nnen. Bitte nutzen Sie <a href="#">Veranstaltung suchen / hinzuf�gen</a> um neue Veranstaltungen aufzunehmen</p>
<? } ?>
