<?php

namespace yii\file;

use common\components\Validate;

/**
 * @Description 文件操作类
 * @author eboss
 * @createData $(createDate)
 */
class File {

    /**
     * 转化 \ 为 /
     * 
     * @param	string	$path	路径
     * @return	string	路径
     */
    private static $_instance;

    private function __construct() {
        
    }

    //单例方法,用于访问实例的公共的静态方法
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function dir_path($path) {
        $path = str_replace('\\', '/', $path);
        if (substr($path, -1) != '/')
            $path = $path . '/';
        return $path;
    }

    /**
     * 判断是否为目录
     */
    public function is_dir($path) {
        return is_dir($path);
    }
    
    /**
     * 判断文件可写
     */
    public function is_writable($path){
        return is_writable($path);
    }
    
    /**
     * 判断文件或目录是否存在
     */
    public function file_exists($path){
        return file_exists($path);
    }

    /**
     * 判断文件可读
     */
    public function is_readable($path){
        return is_readable($path);
    }
    
    /**
     * 创建目录
     * 
     * @param	string	$path	路径
     * @param	string	$mode	属性
     * @return	string	如果已经存在则返回true，否则为flase
     */
    public function dir_create($path, $mode = 0777) {
        if (is_dir($path))
            return TRUE;
        $ftp_enable = 0;
        $path = self::dir_path($path);
        $temp = explode('/', $path);
        $cur_dir = '';
        $max = count($temp) - 1;
        for ($i = 0; $i < $max; $i++) {
            $cur_dir .= $temp[$i] . '/';
            if (@is_dir($cur_dir))
                continue;
            @mkdir($cur_dir, 0777, true);
            @chmod($cur_dir, 0777);
        }
        return is_dir($path);
    }

    /**
     * 拷贝目录及下面所有文件
     * 
     * @param	string	$fromdir	原路径
     * @param	string	$todir		目标路径
     * @return	string	如果目标路径不存在则返回false，否则为true
     */
    public function dir_copy($fromdir, $todir) {
        $fromdir = self::dir_path($fromdir);
        $todir = self::dir_path($todir);
        if (!is_dir($fromdir))
            return FALSE;
        if (!is_dir($todir))
            self::dir_create($todir);
        $list = glob($fromdir . '*');
        if (!empty($list)) {
            foreach ($list as $v) {
                $path = $todir . basename($v);
                if (is_dir($v)) {
                    self::dir_copy($v, $path);
                } else {
                    copy($v, $path);
                    @chmod($path, 0777);
                }
            }
        }
        return TRUE;
    }

    /**
     * 转换目录下面的所有文件编码格式
     * 
     * @param	string	$in_charset		原字符集
     * @param	string	$out_charset	目标字符集
     * @param	string	$dir			目录地址
     * @param	string	$fileexts		转换的文件格式
     * @return	string	如果原字符集和目标字符集相同则返回false，否则为true
     */
    public function dir_iconv($in_charset, $out_charset, $dir, $fileexts = 'php|html|htm|shtml|shtm|js|txt|xml') {
        if ($in_charset == $out_charset)
            return false;
        $list = dir_list($dir);
        foreach ($list as $v) {
            if (pathinfo($v, PATHINFO_EXTENSION) == $fileexts && is_file($v)) {
                file_put_contents($v, iconv($in_charset, $out_charset, file_get_contents($v)));
            }
        }
        return true;
    }

    /**
     * 列出目录下所有文件
     * 
     * @param	string	$path		路径
     * @param	string	$exts		扩展名
     * @param	array	$list		增加的文件列表
     * @return	array	所有满足条件的文件
     */
    public function dir_list($path, $exts = '', $list = array()) {
        $path = self::dir_path($path);
        $files = glob($path . '*');
        foreach ($files as $v) {
            if (!$exts || pathinfo($v, PATHINFO_EXTENSION) == $exts) {
                $list[] = $v;
                if (is_dir($v)) {
                    $list = self::dir_list($v, $exts, $list);
                }
            }
        }
        return $list;
    }

    //某个文件夹下的子文件
    public function getFileList($dirName, $exts = '', $list = array()) {
        $tree = '';
        if (is_dir($dirName)) {//是否目录
            if ($dh = opendir($dirName)) { //打开
                while (($file = readdir($dh)) !== false) { //readdir成功，则返回一个文件名，否则返回 false。
                    if ($file != "." && $file != "..") {
                        $filePath = $dirName . DIRECTORY_SEPARATOR . $file;
                        $tree[] = $file;
                        //$tree[$file]['updatime'] = self::updateFiletime($filePath);
                    }
                }
                closedir($dh);
            } else {
                return FALSE;
            }
            return $tree;
        } else {
            return FALSE;
        }
    }
    
    //文件修改时间
    public function updateFiletime($path){
        if(file_exists($path)){
            return  filemtime($path);
        }
    }
    
    //返回目录
    public function getSubDirs($dirName) {
        $tree = '';
        if (is_dir($dirName)) {//是否目录
            if ($dh = opendir($dirName)) { //打开
                while (($file = readdir($dh)) !== false) { //readdir成功，则返回一个文件名，否则返回 false。
                    if ($file != "." && $file != "..") {
                        $filePath = $dirName . DIRECTORY_SEPARATOR . $file;
                        if (is_dir($filePath)) {
                            //$tree[$file]['zi'] = self::getSubDirs($filePath);
                            $tree[$file]['path'] = $filePath;
                        }
                    }
                }
                closedir($dh);
            } else {
                return FALSE;
            }
            //返回当前的$tree 
            return $tree;
        } else {
            return FALSE;
        }
    }

    public function fileDigui($data) {
        $html = '';
        foreach ($data as $key => $value) {
            $html .= "<li><a class='diguiula diguiula_".$key."' data='" . str_replace('\\', '/', $value['path']) . "'>" . $key . "</a>";
//            if (is_array($value['zi'])) {
//                $html .= self::fileDigui($value['zi']);
//            }
            $html = $html . "</li>";
        }
        return "<ul class='digui'>" . $html . "</ul>";
    }

    /**
     * 设置目录下面的所有文件的访问和修改时间
     * 
     * @param	string	$path		路径
     * @param	int		$mtime		修改时间
     * @param	int		$atime		访问时间
     * @return	array	不是目录时返回false，否则返回 true
     */
    public function dir_touch($path, $mtime = TIME, $atime = TIME) {
        if (!is_dir($path))
            return false;
        $path = dir_path($path);
        if (!is_dir($path))
            touch($path, $mtime, $atime);
        $files = glob($path . '*');
        foreach ($files as $v) {
            is_dir($v) ? dir_touch($v, $mtime, $atime) : touch($v, $mtime, $atime);
        }
        return true;
    }

    /**
     * 目录列表
     * 
     * @param	string	$dir		路径
     * @param	int		$parentid	父id
     * @param	array	$dirs		传入的目录
     * @return	array	返回目录列表
     */
    public function dir_tree($dir, $parentid = 0, $dirs = array()) {
        global $id;
        if ($parentid == 0)
            $id = 0;
        $list = glob($dir . '*');
        foreach ($list as $v) {
            if (is_dir($v)) {
                $id++;
                $dirs[$id] = array('id' => $id, 'parentid' => $parentid, 'name' => basename($v), 'dir' => $v . '/');
                $dirs = self::dir_tree($v . '/', $id, $dirs);
            }
        }
        return $dirs;
    }

    /**
     * 删除目录及目录下面的所有文件
     * 
     * @param	string	$dir		路径
     * @return	bool	如果成功则返回 TRUE，失败则返回 FALSE
     */
    public function dir_delete($dir) {
        $dir = self::dir_path($dir);
        if (!is_dir($dir))
            return FALSE;
        $list = glob($dir . '*');
        foreach ($list as $v) {
            is_dir($v) ? self::dir_delete($v) : @unlink($v);
        }
        return @rmdir($dir);
    }

    /**
     * 重命名
     */
    public function dir_update($olddir, $dir) {
        if (file_exists($olddir)) {
            return rename($olddir, $dir);
        }
    }

    /**
     * 移动文件夹
     *
     * @param string $oldDir
     * @param string $aimDir
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     * 使用说明：moveDir('a/','b/c'); 测试移动文件夹 建立一个b/c文件夹,并把a文件夹下的内容移动进去，并删除a文件夹
     */
    public function moveDir($oldDir, $aimDir, $overWrite = false) {
        $aimDir = str_replace('', '/', $aimDir);
        $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir . '/';
        $oldDir = str_replace('', '/', $oldDir);
        $oldDir = substr($oldDir, -1) == '/' ? $oldDir : $oldDir . '/';
        if (!is_dir($oldDir)) {
            return false;
        }
        if (!file_exists($aimDir)) {
            self :: dir_create($aimDir);
        }
        @ $dirHandle = opendir($oldDir);
        if (!$dirHandle) {
            return false;
        }
        while (false !== ($file = readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!is_dir($oldDir . $file)) {
                self :: moveFile($oldDir . $file, $aimDir . $file, $overWrite);
            } else {
                self :: moveDir($oldDir . $file, $aimDir . $file, $overWrite);
            }
        }
        closedir($dirHandle);
        return rmdir($oldDir);
    }

    /**
     * 移动文件
     *
     * @param string $fileUrl
     * @param string $aimUrl
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     * 使用说明 moveFile('b/1/2/3.exe','b/d/3.exe'); 测试移动文件        建立一个b/d文件夹，并把b/1/2中的3.exe移动进去                  
     */
    public function moveFile($fileUrl, $aimUrl, $overWrite = false) {
        if (!file_exists($fileUrl)) {
            return false;
        }
        if (file_exists($aimUrl) && $overWrite = false) {
            return false;
        } elseif (file_exists($aimUrl) && $overWrite = true) {
            self :: dir_delete($aimUrl);
        }
        $aimDir = dirname($aimUrl);
        self :: dir_create($aimDir);
        rename($fileUrl, $aimUrl);
        return true;
    }

    /**
     * 删除单个图片
     */
    public function dir_unlink($dir) {
        if (file_exists($dir)) {
            return unlink($dir);
        }
    }

    /**
     * 当前目录的上级目录
     */
    public function dir_superior($dir) {
        if (file_exists($dir)) {
            $dir = substr($dir, 0, -1);
            $dir_array = explode(DIRECTORY_SEPARATOR, $dir);
            $dir_array ? array_pop($dir_array) : 1;
            $dire = implode(DIRECTORY_SEPARATOR, $dir_array);
            return $dire . DIRECTORY_SEPARATOR;
        }
    }

    /*     * ********************
     * @file - path to zip file 需要解压的文件的路径
     * @destination - destination directory for unzipped files 解压之后存放的路径
     * @需要使用 ZZIPlib library ，请确认该扩展已经开启
     */

    public function unzip_file($filename, $path) {
        //先判断待解压的文件是否存在
        if (!file_exists($filename)) {
            die("文件 $filename 不存在！");
        }
        $starttime = explode(' ', microtime()); //解压开始的时间
        //将文件名和路径转成windows系统默认的gb2312编码，否则将会读取不到
        $filename = iconv("utf-8", "gb2312", $filename);
        $path = iconv("utf-8", "gb2312", $path);
        //打开压缩包
        $resource = zip_open($filename);
        $i = 1;
        //遍历读取压缩包里面的一个个文件
        while ($dir_resource = zip_read($resource)) {
            //如果能打开则继续
            if (zip_entry_open($resource, $dir_resource)) {
                //获取当前项目的名称,即压缩包里面当前对应的文件名
                $file_name = $path . zip_entry_name($dir_resource);
                //以最后一个“/”分割,再用字符串截取出路径部分
                $file_path = substr($file_name, 0, strrpos($file_name, "/"));
                //如果路径不存在，则创建一个目录，true表示可以创建多级目录
                if (!is_dir($file_path)) {
                    mkdir($file_path, 0777, true);
                }
                //如果不是目录，则写入文件
                if (!is_dir($file_name)) {
                    //读取这个文件
                    $file_size = zip_entry_filesize($dir_resource);
                    //最大读取6M，如果文件过大，跳过解压，继续下一个
                    if ($file_size < (1024 * 1024 * 6)) {
                        $file_content = zip_entry_read($dir_resource, $file_size);
                        file_put_contents($file_name, $file_content);
                    } else {
                        echo "<p> " . $i++ . " 此文件已被跳过，原因：文件过大， -> " . iconv("gb2312", "utf-8", $file_name) . " </p>";
                    }
                }
                //关闭当前
                zip_entry_close($dir_resource);
            }
        }
        //关闭压缩包
        zip_close($resource);
        $endtime = explode(' ', microtime()); //解压结束的时间
        $thistime = $endtime[0] + $endtime[1] - ($starttime[0] + $starttime[1]);
        $thistime = round($thistime, 3); //保留3为小数
        echo "<p>解压完毕！，本次解压花费：$thistime 秒。</p>";
    }

    /**
     * 读取xml、html等内容，存为字符串
     */
    public function curlRead($url) {
        //curl取
//        if( ! Validate::isUrl($url)){
//            return FALSE;
//        }
//        $ch = curl_init();
//        //2.设置URL和相应的选项
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        //3.抓取URL并把它传递给浏览器
//        $data = curl_exec($ch);
//        //4.关闭cURL资源，并且释放系统资源
//        curl_close($ch);
        //file_get_contents取
        if (!file_exists($url)) {
            return FALSE;
        }
        $data = file_get_contents($url);
        return $data;
    }

    /**
     * 保存xml内容
     * 未完
     */
    public function saveXMl($data, $path) {
        $xml = simplexml_load_string($data);
        return $xml->asXML($path);
    }

    /**
     * 保存html内容
     */
    public function saveHtml($data, $path) {
        return file_put_contents($path, $data);
    }

}
