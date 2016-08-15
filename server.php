<?php   //server.php
/**服务器端
 * Created by PhpStorm.
 * User: jerry
 * Date: 2016/8/15
 * Time: 12:46
 */
//确保在连接服务器端不会超时
set_time_limit(0);
$ip = "127.0.0.1";
$port = "1935";


/*
 * ----------------------
 *  @socket 通信过程
 * ----------------------
 *  @socket_create();
 *  @socket_bind();
 *  @socket_listen();
 *  @socket_concept();
 *  @socket_read();
 *  @socket_write();
 *  @socket_close();
 * ----------------------
 *
 */

