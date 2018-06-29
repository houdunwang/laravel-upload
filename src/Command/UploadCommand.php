<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/6/30 上午1:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace Houdunwang\LaravelUpload\Command;

use Illuminate\Console\Command;

class UploadCommand extends Command
{

    protected $signature = 'hd:structure {model} {dir=0} {--force}';

    protected $description = 'Generate the table structure cache';


    //模型
    protected $model;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model       = $this->argument('model');
    }
}
