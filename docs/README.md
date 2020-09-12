
HPlus，基于hyperf、Element UI 插件式快速开发框架

[UI演示地址] https://shop.sh.cn

## 安装
首先确保安装好了hyperf。

``` bash
composer require hyperf-plus/ui
```

然后运行下面的命令来发布资源：
``` bash
composer require hyperf-plus/ui:~1.0

    php bin/hyperf.php ui:init  初始化静态文件。

    有特殊定制用户可以修改 根目录下的resources/vue项目文件，如有只需要基本页面可以忽略vue文件
```

在该命令会将resources/ui/vue文件拷贝到您的项目根目录（方便特殊定制），static资源拷贝到web 目录：

## 开始使用
下面是一个简单使用的代码示例

### 1、创建资源控制器入口（一个项目只需创建一次即可）
可以用命令gen:ui-demo
```php
    php bin/hyperf.php gen:ui-demo  创建UI控制器演示文件。
```
### 查看当前版本
```bash
composer show hyperf-plus/ui --latest
```
### 更新到最新版
```bash
composer require hyperf-plus/ui
```
### 更新到开发版
```bash
composer require hyperf-plus/ui:dev-master
```
### 更新资源文件
``` php
php bin/hyperf.php ui:update
```
