<?
$selected = 'outbox';
$this->setPageOptions('mails-index', 'Postausgang (' . intval(sizeof($messages)) . ')');
$this->addFooter('mails/_index_footer', compact('selected'));
$this->setPageData(array('cache' => 'never'));
?>

<?= $this->render_partial('mails/_message_list', compact('selected')) ?>
