<?php
namespace Houdunwang\LaravelUpload\Exceptions;

use Exception;

/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/6/30 下午11:16
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
class UploadException extends Exception
{
    protected $code;
    protected $message;

    public function __construct(string $message = "", int $code = 500, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code    = $code;
    }

    public function render($request)
    {
        return ['message' => $this->message, 'code' => $this->code];
    }
}
