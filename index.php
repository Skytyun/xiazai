<? 
include_once('./includes/config.php');

$form=($_GET['form']);
$form_arr=array("dy"=>"抖音","ks"=>"快手","ppx"=>"皮皮虾","bilibili"=>"B站","wb"=>"微博","ws"=>"微视","xg"=>"西瓜视频","qm"=>"全民小视频","xhs"=>"小红书","hs"=>"火山小视频","mep"=>"美拍","hk"=>"好看视频","jianying"=>"剪映","kwaiying"=>"快影","tt"=>"今日头条","tnews"=>"腾讯新闻","kkd"=>"快看点","qtt"=>"趣头条","kuaibao"=>"快报","zy"=>"最右","sun"=>"阳光宽频网","twitter"=>"Twitter","lvzhou"=>"绿洲","mt"=>"美图秀秀","ins"=>"Instagram","dcd"=>"懂车帝","duanyou"=>"段友","sb"=>"刷宝短视频","huoguo"=>"火锅视频","ydzx"=>"一点资讯","baidu"=>"百度视频","qqkd"=>"QQ看点","tiktok"=>"tiktok","youtube"=>"Youtube","qing"=>"轻视频","mm"=>"陌陌视频","li"=>"梨视频","ky"=>"开眼","ippzone"=>"皮皮搞笑","music163"=>"网易云音乐","kandian"=>"看点视频","acfun"=>"AcFun","liwo"=>"梨涡","modou"=>"魔豆","uc"=>"UC浏览器","qiezi"=>"茄子短视频","vue"=>"VUE","xinpianchang"=>"新片场","changku"=>"场库","miaopai"=>"秒拍","basai"=>"巴塞电影","keep"=>"keep","qmkg"=>"全民k歌","wide"=>"wide","xkx"=>"小咖秀","doupai"=>"逗拍","bixin"=>"比心","before"=>"避风","msj"=>"美食杰","uwpp"=>"灵感");  

if($form!=null){ $platform=array_key_exists($form, $form_arr)?$form_arr[$form]:false;
if($platform!=null){ $config=array_merge($config,tdk($platform,1)); //合并数组元素
}else{ exit(include_once('./404.php')); }  }
?>

<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title><?=$config['title']?></title>
<meta name="keywords" content="<?=$config['keywords']?>">
<meta name="description" content="<?=$config['description']?>">
     <link rel="stylesheet" href="./assets/layui/css/layui.css">
    

</head>
<body style="background-color: #F2F2F2">
<style>
.title-yx{padding:10px;overflow: hidden;margin-left: 0;margin-right: 0;background: #fff;margin-bottom:15px;}
</style>


<br><div class="layui-container">

<div class="title-yx layui-containe">
<h2><strong><center><?=$config['sitename']?>
</center></strong></h2></div>
    
<div class="layui-row layui-col-space15">
        
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">使用说明：</div>
                <div class="layui-card-body">
<p>本平台永久网址：<a href="<?=$config['siteurl']?>" target="_blank"><font color=blue><b><?=get_host()?></b></font></a>，记得收藏起来，方便以后使用！
<p>觉得不错的话，请分享给朋友一起用哦，建议下载APP 使用更方便！</p>
                </div>
            </div>
        </div>
        

        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">在线使用</div>
                <div class="layui-card-body">
                        

<div class="layui-tab layui-tab-brief" lay-filter="tab">
  <ul class="layui-tab-title"  style="text-align: center">
    <li class="layui-this">去除水印</li>
    <li>解析日志</li>
    <li onclick="app()">下载APP</li>
  </ul>

    
<div class="layui-tab-content" yx="1">
    <div class="layui-tab-item layui-show">
<form class="layui-form layui-form-pane">
<blockquote class="layui-elem-quote layui-quote-nm">请将复制的视频链接粘贴到下面的输入框</blockquote>
<div class="layui-form-item">
<label class="layui-form-label">作品链接</label>
<div class="layui-input-block">
<input style="border-radius: 0 30px 30px 0;" type="text" name="url" id="url" onkeyup="song_url()" autocomplete="off" placeholder="请输入短视频作品分享链接~" class="layui-input">
</div><br>

<div align="center">
<button type="button" style="width: 98%; margin: 0;" class="layui-btn layui-btn-fluid layui-btn-danger layui-btn-radius" onclick="jiexi()">开始祛水印</button>
</div>
</div>
</form></div>
    
    
    
    
    <div class="layui-tab-item" yx="2">
<div class="layui-card">
<div style="padding: 2px;">
<div style="border:0;" class="list-group-item">
<marquee direction="up" behavior="scroll" loop="3" scrollamount="3" scrolldelay="10" align="top" bgcolor="#ffffff" height="200px" width="93%" hspace="20" vspace="10" onmouseover="this.stop()" onmouseout="this.start()" style="background-color: rgb(255, 255, 255); height: 200px; width: 93%; margin: 10px 20px;">
<button type="button" class="layui-btn layui-btn-fluid layui-btn-normal  layui-btn-radius" onclick="app()"><i class="layui-icon layui-icon-app"></i>点此下载官方APP<i class="layui-icon layui-icon-app"></i></button>

<? $lib=@printdir($dir);
krsort($lib); //根据键名大到小重新排序
foreach($lib as $row){ 
$user_file=@json_decode(file_get_contents($dir.'/'.$row),true);
if($user_file!=null){
$a_url='./user.php?url='.$user_file['url'];
echo'<div class="layui-colla-item"><i class="layui-icon layui-icon-date"></i>'.date('Y-m-d',strtotime($user_file['date'])).'&nbsp;<i class="layui-icon layui-icon-email"></i>'.$user_file['name'].$user_file['type'].'：<i class="layui-icon layui-icon-speaker"></i><a href="'.$a_url.'" target="_blank">'.$user_file['desc'].'</a>&nbsp;<a href="'.$a_url.'" target="_blank" class="layui-btn layui-btn-xs"><i class="layui-icon layui-icon-release"></i>前往查看</a></div>';
}}?>

</marquee>
</div></div></div>
</div>
    
</div>
</div>

</div>
</div>
</div>

        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">支持应用：</div>
                <div class="layui-card-body">
                    
<? foreach($form_arr as $key=>$valua){ ?>
<a href="<?='./?form='.$key?>" target="_blank" title="<?=$valua?>"><img alt="<?=$valua?>" src="<?='./assets/img/ico'?>/icon-sp-<?=$key?>.png" width="25px"></a><?}?>
                </div>
            </div>
        </div>

<div class="layui-col-md12"><div class="layui-card">
<div class="layui-card-body" style="text-align: center">
<a target="_blank" href="http://beian.miit.gov.cn/#/Integrated/index" id="icp">ICP加载中</a>
<p>Powered By @<a target="_blank" href="https://skytyun.top/">Skytyun</a>-2023
<br>视频版权归相关网站及作者所有，本平台不存储任何视频及图片！</p>
<script>document.write('<script src="https://www.yuanxiapi.cn/api/qqbeian/?type=js&url='+window.location.host+'"><\/script>');
window.onload=function(){ document.getElementById("icp").innerHTML=icp["ICPSerial"]; } </script>
    
</div>
</div></div>

</div>
<script src="./assets/layui/layui.all.js"></script>
<? include_once('./includes/js.php');?>
