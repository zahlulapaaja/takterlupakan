<?php

namespace App\Core\Bootstrap;

class BootstrapPrint
{
    public function init()
    {
        // See also starterkit/app/View/Components/PrintLayout.php to change the layout

        addHtmlClass('body', 'app-blank');
    }
}
