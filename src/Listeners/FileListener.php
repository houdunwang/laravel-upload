<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:07
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace Houdunwang\LaravelUpload\Listeners;

use Houdunwang\LaravelUpload\Events\UploadEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;

class FileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param \App\Events\UploadEvent $event
     *
     * @return bool
     */
    public function handle(UploadEvent $event)
    {
        if ( ! $request = $event->getRequest()) {
            return false;
        }
        $fileName = str_random(10).microtime(true).'.'.$request->getClientOriginalExtension();
        $saveDir = 'uploads/'.date('ym/d');
        $request->move($saveDir, $fileName);
        $event->setFile($saveDir.'/'.$fileName);
    }
}
