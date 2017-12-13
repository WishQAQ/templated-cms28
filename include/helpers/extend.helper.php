<?php  if(!defined('DEDEINC')) exit('dedecms');
/**
 * 扩展小助手
 *
 * @version        $Id: extend.helper.php 1 13:58 2010年7月5日Z tianya $
 * @package        DedeCMS.Helpers
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */

/**
 *  返回指定的字符
 *
 * @param     string  $n  字符ID
 * @return    string
 */
if ( ! function_exists('ParCv'))
{
    function ParCv($n)
    {
        return chr($n);
    }
}


/**
 *  显示一个错误
 *
 * @return    void
 */
if ( ! function_exists('ParamError'))
{
    function ParamError()
    {
        ShowMsg('对不起，你输入的参数有误！','javascript:;');
        exit();
    }
}

/**
 *  默认属性
 *
 * @param     string  $oldvar  旧的值
 * @param     string  $nv      新值
 * @return    string
 */
if ( ! function_exists('AttDef'))
{
    function AttDef($oldvar, $nv)
    {
        return empty($oldvar) ? $nv : $oldvar;
    }
}


/**
 *  返回Ajax头信息
 *
 * @return     void
 */
if ( ! function_exists('AjaxHead'))
{
    function AjaxHead()
    {
        @header("Pragma:no-cache\r\n");
        @header("Cache-Control:no-cache\r\n");
        @header("Expires:0\r\n");
    }
}

/**
 *  去除html和php标记
 *
 * @return     string
 */
if ( ! function_exists('dede_strip_tags'))
{
	function dede_strip_tags($str) { 
	    $strs=explode('<',$str); 
	    $res=$strs[0]; 
	    for($i=1;$i<count($strs);$i++) 
	    { 
	        if(!strpos($strs[$i],'>')) 
	            $res = $res.'&lt;'.$strs[$i]; 
	        else 
	            $res = $res.'<'.$strs[$i]; 
	    } 
	    return strip_tags($res);    
	} 
}

if ( ! function_exists('thumb'))
    {
    function thumb($imgurl, $width, $height, $bg = true)
    {
    global $cfg_mainsite,$cfg_multi_site;
    $thumb = eregi("http://",$imgurl)?str_replace($cfg_mainsite,'',$imgurl):$imgurl;
    list($thumbname,$extname) = explode('.',$thumb);
    $newthumb = $thumbname.'_'.$width.'_'.$height.'.'.$extname;
    if(!$thumbname || !$extname || !file_exists(DEDEROOT.$thumb)) return $imgurl;
    if(!file_exists(DEDEROOT.$newthumb))
    {
    include_once DEDEINC.'/image.func.php';
    if($bg==true)
    {
    ImageResizeNew(DEDEROOT.$thumb, $width, $height, DEDEROOT.$newthumb);
    }
    else
    {
    ImageResize(DEDEROOT.$thumb, $width, $height, DEDEROOT.$newthumb);
    }
    }
    return $cfg_multi_site=='Y'?$cfg_mainsite.$newthumb:$newthumb;
    }
    }

