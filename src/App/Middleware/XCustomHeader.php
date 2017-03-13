<?php
declare(strict_types=1);

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * This class is identical as the XClacksOverheadMiddleware at https://docs.zendframework.com/zend-expressive/reference/migration/to-v2/#http-interop (the 2nd example)
 *
TypeError thrown with message "Argument 2 passed to App\Middleware\XCustomHeader::__invoke() must implement interface Interop\Http\ServerMiddleware\DelegateInterface, instance of Zend\Diactoros\Response given, called in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Middleware/CallableMiddlewareWrapper.php on line 58"

Stacktrace:
#23 TypeError in /var/www/html/ze-example/src/App/Middleware/XCustomHeader.php:11
#22 App\Middleware\XCustomHeader:__invoke in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Middleware/CallableMiddlewareWrapper.php:58
#21 Zend\Stratigility\Middleware\CallableMiddlewareWrapper:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#20 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/LazyLoadingMiddleware.php:79
#19 Zend\Expressive\Middleware\LazyLoadingMiddleware:Zend\Expressive\Middleware\{closure} in /var/www/html/ze-example/vendor/zendframework/zend-expressive-helpers/src/UrlHelperMiddleware.php:50
#18 Zend\Expressive\Helper\UrlHelperMiddleware:__invoke in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/LazyLoadingMiddleware.php:80
#17 Zend\Expressive\Middleware\LazyLoadingMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#16 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/ImplicitOptionsMiddleware.php:69
#15 Zend\Expressive\Middleware\ImplicitOptionsMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#14 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/ImplicitHeadMiddleware.php:75
#13 Zend\Expressive\Middleware\ImplicitHeadMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#12 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/RouteMiddleware.php:80
#11 Zend\Expressive\Middleware\RouteMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#10 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/LazyLoadingMiddleware.php:79
#9 Zend\Expressive\Middleware\LazyLoadingMiddleware:Zend\Expressive\Middleware\{closure} in /var/www/html/ze-example/vendor/zendframework/zend-expressive-helpers/src/ServerUrlMiddleware.php:42
#8 Zend\Expressive\Helper\ServerUrlMiddleware:__invoke in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/LazyLoadingMiddleware.php:80
#7 Zend\Expressive\Middleware\LazyLoadingMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#6 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Middleware/ErrorHandler.php:157
#5 Zend\Stratigility\Middleware\ErrorHandler:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Middleware/LazyLoadingMiddleware.php:60
#4 Zend\Expressive\Middleware\LazyLoadingMiddleware:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/Next.php:128
#3 Zend\Stratigility\Next:process in /var/www/html/ze-example/vendor/zendframework/zend-stratigility/src/MiddlewarePipe.php:102
#2 Zend\Stratigility\MiddlewarePipe:process in /var/www/html/ze-example/vendor/zendframework/zend-expressive/src/Application.php:374
#1 Zend\Expressive\Application:run in /var/www/html/ze-example/public/index.php:28
#0 {closure} in /var/www/html/ze-example/public/index.php:29
 */

class XCustomHeader
{
    public function __invoke(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $response = $delegate->process($request->withAddedHeader('X-Custom-Header', 'foo'));
        return $response;
    }
}
