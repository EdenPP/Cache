<?php
/**
 * Description :
 *
 * @author      Eden
 * @datetime    2015/12/18 15:33
 * @copyright   Beijing CmsTop Technology Co.,Ltd.
 */
/**
 * application.session.save_handler=redis
application.session.save_path="tcp://" SESSION_HOST ":" SESSION_PORT "?auth%3d" SESSION_AUTH "&weight%3d1%26timeout%3d1%26prefix%3dFrontendSiteSession:"
application.session.gc_maxlifetime=3600
 */
return array(

    'session' => array(
        'save_handler' => 'redis',
        'save_path' => "tcp://127.0.0.1:6380?database=1&prefix=mySession:",
        'gc_maxlifetime' => 10
    ),

);