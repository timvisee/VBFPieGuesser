<?php

use app\template\PageFooterBuilder;
use app\template\PageHeaderBuilder;

// Include the page top
require_once('top.php');

?>

<div data-role="page" id="page-about" data-unload="false">
    <?php PageHeaderBuilder::create(__('general', 'about'))->setBackButton('index.php')->build(); ?>

    <div data-role="main" class="ui-content" align="center">
        <br />
        <p>
            <b>Pie Guesser</b><br />
            <small>Version <?=APP_VERSION_NAME; ?> <sup>(<?=APP_VERSION_CODE; ?>)</sup></small>
        </p>
        <br />
        <br />
        <p><?=__('pageAbout', 'developer'); ?></p>
        <br />
        <p><?=__('pageAbout', 'source'); ?></p>
        <br />
        <fieldset data-role="controlgroup" data-type="vertical">
            <a href="status.php" class="ui-btn ui-icon-info ui-btn-icon-left"><?=__('pageAbout', 'applicationStatus'); ?></a>
        </fieldset>
        <br />
        <br />
        <p><?=__('pageAbout', 'poweredByCarbonCms'); ?></p>
        <br />
        <p><?=__('pageAbout', 'license'); ?></p>
        <br />
        <p>Copyright &copy; Tim Vis&eacute;e <?=date('Y'); ?>.<br />All rights reserved.</p>
    </div>

    <?php PageFooterBuilder::create()->build(); ?>
</div>

<?php

// Include the page bottom
require_once('bottom.php');