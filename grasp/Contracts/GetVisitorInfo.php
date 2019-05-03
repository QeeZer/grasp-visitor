<?php
/**
 * GetVisitorInfo
 */

namespace Grasp\Contracts;

interface GetVisitorInfo
{
	/**
	 * 获取 REMOTE_ADDR
	 *
	 * ------ @des
	 * 最后一次访问的服务器IP或代理服务器的IP
	 * ------ @enddes
	 *
	 * ------ @demo
	 * 1. 192.168.0.1
	 * 2. 8.8.8.8
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['REMOTE_ADDR']
	 *
	 * HTTP construct: Unable to construct.
	 *
	 * @return mixed
	 */
	public function getRemoteAddr();

	/**
	 * 获取 VIA
	 *
	 * ------ @des
	 * 列出从客户端到 OCS 或者相反方向的响应经过了哪些代理服务器，他们用什么协议（和版本）发送的请求。
	 * ------ @enddes
	 *
	 * ------ @demo
	 * 1. WTP/1.1 GDSZ-PS-GW010-WAP05.gd.chinamobile.com (Nokia WAP Gateway 4.0 CD3/ECD13_C/NWG4.0 CD3 ECD13_C 4.1.03)
	 * 2. 1.0 236-81.D07071953.sina.com.cn:80 (squid/2.6.STABLE13)
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['HTTP_VIA']
	 *
	 * HTTP construct: Via
	 *
	 * @return mixed
	 */
	public function getVia();

	/**
	 * 获取 X-Forwarded-For
	 *
	 * ------ @des
	 * > wiki https://zh.wikipedia.org/wiki/X-Forwarded-For
	 * 当使用代理时，web服务器无法通过TCP数据包来源获得发起请求的client的真实IP，
	 * 因此代理服务器通常会在http请求头增加一个叫做x_forwarded_for的字段，用来记录请求发起者的真实IP。
	 * ------ @enddes
	 *
	 * ------ @demo
	 * > client1, proxy1, proxy2...
	 * 1. 8.8.8.8
	 * 2. 192.168.11.10, 192.168.10.11, 192.168.0.2
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['HTTP_X_FORWARDED_FOR']
	 *
	 * HTTP construct: X-Forwarded-For
	 *
	 * @return mixed
	 */
	public function getXForwardedFor();

	/**
	 * 获取 Client-Ip
	 *
	 * ------ @des
	 * 代理服务器发送的HTTP头。如果是“超级匿名代理”，则返回none值。
	 * ------ @enddes
	 *
	 * ------ @demo
	 * 1. 8.8.8.8
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['HTTP_CLIENT_IP']
	 *
	 * HTTP construct: Client-Ip
	 *
	 * @return mixed
	 */
	public function getClientIp();

	/**
	 * 获取 Referer
	 *
	 * ------ @des
	 * 当访客访问网页时，HTTP来源地址 (referer 或 referring page) 是前一个网页的URL。
	 * 如果是图片的话，通常指的就是图片所在的网页。在网页浏览器送往网页服务器的时候，HTTP来源地址就被包含在HTTP请求方法中。
	 * ------ @enddes
	 *
	 * ------ @demo
	 * 1. https://www.google.com/search?q=1
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['HTTP_REFERER']
	 *
	 * HTTP construct: Referer
	 *
	 * @return mixed
	 */
	public function getReferer();

	/**
	 * 获取 User-Agent
	 *
	 * ------ @des
	 * 在HTTP中，User-Agent字符串通常被用于内容协商，而原始服务器为该响应选择适当的内容或操作参数。
	 * 例如，User-Agent字符串可能被网络服务器用以基于特定版本的客户端软件的已知功能选择适当的变体。
	 * ------ @enddes
	 *
	 * ------ @demo
	 * 1. Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36
	 * ------ @enddemo
	 *
	 * PHP get: $_SERVER['HTTP_USER_AGENT']
	 *
	 * HTTP construct: User-Agent
	 *
	 * @return mixed
	 */
	public function getUserAgent();

	/**
	 * 获取 Headers
	 *
	 * @return mixed
	 */
	public function getHeaders();
}