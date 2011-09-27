<?
$this->set_layout("layouts/single_page");
$page_title = _("Stud.IP - Hauptmen�");
?>

<!-- Just gimme a 3x3 grid -->
<div class="ui-grid-b">
	<div class="ui-block-a">
            <a href="<?= $controller->url_for("activities") ?>" data-role="button" data-icon="studip-activities" data-iconpos="top">Activity Feed</a>
        </div>
	<div class="ui-block-b">
            <a href="<?= $controller->url_for("courses") ?>" data-role="button" data-icon="studip-courses" data-iconpos="top">Courses</a>
        </div>
	<div class="ui-block-c">
            <a href="<?= $controller->url_for("dates") ?>" data-role="button" data-icon="studip-dates" data-iconpos="top">Dates</a>
        </div>
	<div class="ui-block-a">
            <a href="index.html" data-role="button" data-icon="home" data-iconpos="top">Option 4</a>
        </div>
	<div class="ui-block-b">
            <a href="index.html" data-role="button" data-icon="gear" data-iconpos="top">Option 5</a>
        </div>
	<div class="ui-block-c">
            <a href="index.html" data-role="button" data-icon="star" data-iconpos="top">Option 6</a>
        </div>
	<div class="ui-block-a">
            <a href="index.html" data-role="button" data-icon="home" data-iconpos="top">Option 7</a>
        </div>
	<div class="ui-block-b">
            <a href="index.html" data-role="button" data-icon="gear" data-iconpos="top">Option 8</a>
        </div>
	<div class="ui-block-c">
            <a href="index.html" data-role="button" data-icon="star" data-iconpos="top">Option 9</a>
        </div>
</div><!-- /grid-b -->