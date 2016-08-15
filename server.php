<?php   //server.php
/**服务器端
 * Created by PhpStorm.
 * User: jerry
 * Date: 2016/8/15
 * Time: 12:46
 */
//确保在连接服务器端不会超时


/*
 * ----------------------
 *  @socket 通信过程
 * ----------------------
 *  @socket_create();
 *  @socket_bind();
 *  @socket_listen();
 *  @socket_accept();
 *  @socket_read();
 *  @socket_write();
 *  @socket_close();
 * ----------------------
 *
 */

error_reporting(E_ALL);
set_time_limit(0);
//ob_implicit_flush();

$address = '127.0.0.1';
$port = 10005;
//创建端口
if( ($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed :reason:" . socket_strerror(socket_last_error()) . "\n";
}

//绑定
if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
}

//监听
if (socket_listen($sock, 5) === false) {
    echo "socket_bind() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    //得到一个链接
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accepty() failed :reason:".socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    //welcome  发送到客户端
    $msg = "<font color='red'>server send:welcome</font><br/>";
    socket_write($msgsock, $msg, strlen($msg));
    echo 'read client message\n';
    $buf = socket_read($msgsock, 8192);
    $talkback = "received message:$buf\n";
    echo $talkback;
    if (false === socket_write($msgsock, $talkback, strlen($talkback))) {
        echo "socket_write() failed reason:" . socket_strerror(socket_last_error($sock)) ."\n";
    } else {
        echo 'send success';
    }
    socket_close($msgsock);
} while(true);
//关闭socket
socket_close($sock);
