# 介绍

基于事件机制的 Laravel 上传处理。

> houdunren.com @ 向军大叔  

项目地址：https://github.com/houdunwang/laravel-upload

## 安装

### 安装组件

```
composer require houdunwang/laravel-upload
```

### 生成配置文件

```
php artisan vendor:publish --provider="Houdunwang\LaravelUpload\ServiceProvider"
```
组件会生成配置文件 `config/hd_upload.php` 文件

**配置荐说明**

| 配置     | 说明                                                         |
| -------- | ------------------------------------------------------------ |
| listener | 上传事件监听器，系统提供以下监听器，开发者可以自行开发监听器处理上传 |

### 内置监听器

系统提供几个上传处理监听器，当然开发者可以自行开发监听器处理上传，只需要修改配置文件相应参数就可以了。

| 监听器                                                    | 说明         |
| --------------------------------------------------------- | ------------ |
| Houdunwang\LaravelUpload\Listeners\FileListener           | 本地文件上传 |
| Houdunwang\LaravelUpload\Listeners\OssListener [近期推出] | 阿里OSS上传  |

### 注册事件
修改 `app/Providers/EventServiceProvider.php` 文件
```
...
protected $subscribe = [
    \Houdunwang\LaravelUpload\Listeners\UploadSubscriber::class,
];
...
```

## 使用

在控制器中调用分发事件 `UploadEvent` ，系统会根据配置项中设置的事件处理器完成上传。

```
<?php namespace App\Http\Controllers;

use Houdunwang\LaravelUpload\Events\UploadEvent;
use Illuminate\Http\Request;

class VueFormController extends Controller
{
    public function upload(Request $request){
        $event = new UploadEvent($request->file('file'));
        event($event);
        ##上传成功的文件y
        dd($event->getFile());
    }
}
```

