<?
$page_title = Studip\Mobile\Helper::out($GLOBALS['UNI_NAME_CLEAN']);
$page_id = "quickdial-index";
$this->set_layout("layouts/single_page");
?>

<ul data-role="listview" data-inset="true">
  <li>
      <a href="<?= $controller->url_for("mails") ?>">
        <?= Assets::img("icons/32/grey/mail", array('class' => 'ui-li-icon')) ?>

        <? if ($number_unread_mails > 0) { ?>
          <?= sprintf(ngettext("%d neue Nachricht" , "%d neue Nachrichten", $number_unread_mails), $number_unread_mails) ?>
        <? } else { ?>
          Keine neuen Nachrichten.
        <? } ?>
      </a>
  </li>

  <? if (sizeof($activities)) : ?>
  <li>
    <a href="#quickdial-activities">
      <?= Assets::img("icons/32/grey/news", array('class' => 'ui-li-icon')) ?>

      <? if ($days == 1) { ?>
        <? $title = sprintf(ngettext(_("1 Aktivität in 24h"), _("%d Aktivitäten in 24h"),  sizeof($activities)), sizeof($activities)) ?>
      <? } else if (is_finite($days)) { ?>
        <? $title = sprintf(ngettext(_("1 Aktivität in %d Tagen"), _("%d Aktivitäten in %d Tagen"),  sizeof($activities)), sizeof($activities), $days) ?>
      <? } else { ?>
        <? $title = sprintf(ngettext(_("1 Aktivität"), _("%d Aktivitäten"),  sizeof($activities)), sizeof($activities)) ?>
      <? } ?>

      <?= $title ?>
    </a>
  </li>
  <? endif ?>
</ul>

<? if (!empty($next_courses)) : ?>
<ul data-role="listview" data-inset="true">
  <?= $this->render_partial('quickdial/_next_courses') ?>
</ul>
<? endif ?>

<? $additional_pages .= $this->render_partial('quickdial/_activities', compact('title')) ?>
