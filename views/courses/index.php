<?
$this->set_layout("layouts/single_page");
$page_title = "Veranstaltungen";
$page_id = "courses-index";
?>

<? if (sizeof($courses)) : ?>

  <?= $this->render_partial('courses/_list.php') ?>

<? else : ?>

  <p>
    Sie haben zur Zeit keine Veranstaltungen abonniert, an denen Sie
    teilnehmen können. Bitte nutzen Sie <a href="#">Veranstaltung suchen
    / hinzufügen</a> um neue Veranstaltungen aufzunehmen
  </p>

<? endif ?>
