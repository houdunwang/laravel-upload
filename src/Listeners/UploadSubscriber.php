<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:07
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Houdunwang\LaravelUpload\Listeners;

use Houdunwang\LaravelUpload\Events\UploadEvent;

class UploadSubscriber
{
    public function subscribe($events)
    {
        $events->listen(UploadEvent::class, config('hd_upload.listener'));
    }
}
