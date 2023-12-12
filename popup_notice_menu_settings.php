<?php
$base_name = plugin_basename( __FILE__ );
$base_page = 'admin.php?page='.$base_name;
$popup_notice_pc_content  = get_option('popup_notice_pc_content');
$popup_notice_pc_jquery  = get_option('popup_notice_pc_jquery');//20231211
$popup_notice_pc_logo_width  = get_option('popup_notice_pc_logo_width');
$popup_notice_pc_logo  = get_option('popup_notice_pc_logo');
$jinzhi_yt_yso  = get_option('jinzhi_yt_yso');
$jinzhi_yt_yst  = get_option('jinzhi_yt_yst');
$popup_notice_pc_anz  = get_option('popup_notice_pc_anz');
$popup_notice_pc_any  = get_option('popup_notice_pc_any');
$popup_notice_pc_anylk  = get_option('popup_notice_pc_anylk');
$popup_notice_pc_zdy  = get_option('popup_notice_pc_zdy');//202365
$popup_noticet_pc_anz  = get_option('popup_noticet_pc_anz');
$popup_noticet_pc_an  = get_option('popup_noticet_pc_an');
$popup_noticet_pc_ans  = get_option('popup_noticet_pc_ans');
$popup_noticet_pc_ansy  = get_option('popup_noticet_pc_ansy');
$popup_noticet_pc_ansz  = get_option('popup_noticet_pc_ansz');
if(isset($_POST['Submit'])) {
$popup_notice_pc_content   = trim($_POST['popup_notice_pc_content']);
$popup_notice_pc_jquery   = trim($_POST['popup_notice_pc_jquery']);//20231211
$popup_notice_pc_logo_width   = trim($_POST['popup_notice_pc_logo_width']);
$popup_notice_pc_logo   = trim($_POST['popup_notice_pc_logo']);
$jinzhi_yt_yso   = trim($_POST['jinzhi_yt_yso']);
$jinzhi_yt_yst = isset($_POST['jinzhi_yt_yst']) ? trim($_POST['jinzhi_yt_yst']) : '';
$popup_notice_pc_anz   = trim($_POST['popup_notice_pc_anz']);
$popup_notice_pc_any   = trim($_POST['popup_notice_pc_any']);
$popup_notice_pc_anylk   = trim($_POST['popup_notice_pc_anylk']);
$popup_notice_pc_zdy   = trim($_POST['popup_notice_pc_zdy']);//202365
$popup_noticet_pc_anz   = trim($_POST['popup_noticet_pc_anz']);
$popup_noticet_pc_an   = trim($_POST['popup_noticet_pc_an']);
$popup_noticet_pc_ans   = trim($_POST['popup_noticet_pc_ans']);
$popup_noticet_pc_ansy   = trim($_POST['popup_noticet_pc_ansy']);
$popup_noticet_pc_ansz   = trim($_POST['popup_noticet_pc_ansz']);
	$update_ali_queries = array();
	$update_ali_text    = array('公告');
	$update_ali_queries[] = update_option('popup_notice_pc_content', $popup_notice_pc_content );
	$update_ali_queries[] = update_option('popup_notice_pc_jquery', $popup_notice_pc_jquery );//20231211
    $update_ali_queries[] = update_option('popup_notice_pc_logo_width', $popup_notice_pc_logo_width );
    $update_ali_queries[] = update_option('popup_notice_pc_logo', $popup_notice_pc_logo );
    $update_ali_queries[] = update_option('jinzhi_yt_yso', $jinzhi_yt_yso );
    $update_ali_queries[] = update_option('jinzhi_yt_yst', $jinzhi_yt_yst );
    $update_ali_queries[] = update_option('popup_notice_pc_anz', $popup_notice_pc_anz );
    $update_ali_queries[] = update_option('popup_notice_pc_any', $popup_notice_pc_any );
    $update_ali_queries[] = update_option('popup_notice_pc_anylk', $popup_notice_pc_anylk );
    $update_ali_queries[] = update_option('popup_notice_pc_zdy', $popup_notice_pc_zdy );//202365
    $update_ali_queries[] = update_option('popup_noticet_pc_anz', $popup_noticet_pc_anz );
    $update_ali_queries[] = update_option('popup_noticet_pc_an', $popup_noticet_pc_an );
    $update_ali_queries[] = update_option('popup_noticet_pc_ans', $popup_noticet_pc_ans );
    $update_ali_queries[] = update_option('popup_noticet_pc_ansy', $popup_noticet_pc_ansy );
    $update_ali_queries[] = update_option('popup_noticet_pc_ansz', $popup_noticet_pc_ansz );
	//$update_ali_text[] = '公告';//20231211
	 $success_message = '';//20231211
	 //20231211优化顶部更新提示
foreach($update_ali_queries as $update_ali_query) {
		if($update_ali_query) {
			$success_message = '<font color="green">更新成功！</font>'; // 将成功消息存储在变量中
            break; // 设置成功消息后跳出循环
		}
		$i++;
	}
	if(empty($success_message)) {
        $success_message = '<font color="red">您的设置没有做出任何改动...</font>';
    }
}
?>
<?php if(!empty($success_message)) { echo '<div id="message" class="updated fade"><p>'.$success_message.'</p></div>'; }//20231211优化顶部更新提示 ?>
<div id="wpbody" role="main">
<div id="content">
    <style>
  .wpossform .layui-form-label{width:120px;}
  .wpossform .layui-input{width: 350px;}
  .wpossform .layui-form-mid{margin-left:3.5%;}
  .tsxiao-wp-hidden {position: relative;}
  .tsxiao-wp-hidden .tsxiao-wp-eyes{padding: 5px;position:absolute;top:3px;z-index: 999;display: none;}
  .tsxiao-wp-hidden i{font-size:20px;}
  .tsxiao-wp-hidden i.dashicons-visibility{color:#009688 ;}
</style>
<link rel='stylesheet'  href='<?php echo plugin_dir_url( __FILE__ );?>layui.css' />
<link rel='stylesheet'  href='<?php echo plugin_dir_url( __FILE__ );?>tsxcc.css'/> 
<div class="container-tsxiao-main">
   <div class="tsxiao-wbs-header" style="margin-bottom: 15px;">
             <div class="tsxiao-wbs-logo"> <span class="wbs-span">弹窗公告插件</span><span class="wbs-free">V4.0</span></div>
            <div class="tsxiao-wbs-btn">
                 <a class="layui-btn layui-btn-primary" href="https://www.tsxxc.com" target="_blank"> 插件主页</a>
                 <a class="layui-btn layui-btn-primary" href="https://www.tsxxc.com/wordpress/plugins/1478.html" target="_blank">插件教程</a>
            </div>
       </div>
 </div>

<!-- 内容 -->
<div class="container-tsxiao-main">
       <div class="layui-container container-m">
           <div class="layui-row layui-col-space15">
          <!-- 左边 -->
          <div class="layui-col-md9">
           <div class="tsxiao-panel">
              <div class="tsxiao-controw">
                  <div class="wrap">
  <div id="message" class="updated fade">
  <p>ts小陈-首页弹窗公告插件，作用就是在网站页面上弹出公告。<br />
  </p>
  </div> 
 <form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" style="width:90%;float:left;">
 	  
<table class="form-table">
                <td valign="top" width="200px"><h3 style=" width: 100px; font-size: 14px;font-weight: 600;">弹窗公告设置</h3>
                </td>
                <td><p class="submit">
            <input type="submit" name="Submit" value="保存设置" class="button-primary"/>
            </p></td>
                <td>
                </td>
                <tr valign="top">
<td valign="top" width="200px"><strong style=" width: 100px; ">弹窗样式</strong><br/>
<td>          
<p name="jinzhi_yt">
<label class="list-item"><input type="checkbox" id="jinzhi_yt_yso" name="jinzhi_yt_yso"  value="<?php echo ( 'laia' ); ?>" <?php if ( get_option( 'jinzhi_yt_yso' ) === 'laia') { echo 'checked'; } ?> >样式1</label>
<label class="list-item"><input type="checkbox" id="jinzhi_yt_yst" name="jinzhi_yt_yst" value="<?php echo ( 'laia' ); ?>" <?php if ( get_option( 'jinzhi_yt_yst' ) === 'laia') { echo 'checked'; } ?> >样式2</label>

</p>
<p>弹窗公告样式<strong style="width: 100px;color: #f00;">注意对应样式的设置，默认样式 1</strong></p>
</td>
</tr>
 <tr valign="top">
<td valign="top" width="200px"><strong style=" width: 100px; ">引用插件jquery</strong><br/>
<td>          
<p name="jinzhi_yt">
<label class="list-itemm"><input type="checkbox" id="popup_notice_pc_jquery" name="popup_notice_pc_jquery"  value="<?php echo ( 'laia' ); ?>" <?php if ( get_option( 'popup_notice_pc_jquery' ) === 'laia') { echo 'checked'; } ?> ></label>
</p>
<p><strong style="width: 100px;color: #f00;">使用本插件后原网站部分功能或js效果丢失的</strong>请取消此处勾选，再次测试是否正常！<br>如还有问题请<a href="https://www.tsxxc.com/wordpres/plugins/1478.html#comment" target="_blank"><strong style="width: 100px;color: #f00;">点我反馈</strong></a></p>
</td>
</tr>
<tr>
            <td valign="top" style=" background-color: #006eaf; "><strong style=" font-size: 15px;color: white;letter-spacing: 1px;">样式1设置</strong><br />
                </td>
            </tr>
                <tr >
                <td valign="top"  width="200px"><strong style=" width: 100px; ">网站logo地址</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_notice_pc_logo" id="popup_notice_pc_logo" value="<?php echo $popup_notice_pc_logo; ?>"/>
			   
               <!-- 2022-8-1添加 -->   <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="上传logo"> 
                 <p>公告顶部显示的网站logo</p>
                </td>
            </tr>
			
			
			
			
			
			
			
			
			

            <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">左侧按钮文字</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_notice_pc_anz" id="popup_notice_pc_anz" value="<?php echo $popup_notice_pc_anz; ?>"/> 
                 <p>左侧按钮文字。默认“朕已阅”</p>
                </td>
            </tr>
            <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">右侧按钮文字</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_notice_pc_any" id="popup_notice_pc_any" value="<?php echo $popup_notice_pc_any; ?>"/> 
                 <p>右侧按钮文字。默认“点击访问”</p>
                </td>
            </tr>	
            <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">右侧按钮点击跳转链接</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_notice_pc_anylk" id="popup_notice_pc_anylk" value="<?php echo $popup_notice_pc_anylk; ?>"/> 
                  <p>右侧按钮点击跳转链接。默认“跳转到网站首页”，链接必须加前缀如：https://www.tsxxc.com/</p>
                </td>
            </tr>
			<!-- 202365 -->
			<tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">自定义样式</strong><br />
                </td>
                <td>
               <textarea type="text" style="width: 470px; height: 65px;"   name="popup_notice_pc_zdy" id="popup_notice_pc_zdy" value=""/> <?php echo $popup_notice_pc_zdy; ?></textarea>
                <p><strong style="width: 100px;color: #f00;">自定义样式</strong>，不明白的点→<a href="https://docs.tsxxc.com/docs/%E6%8F%92%E4%BB%B6%E4%BD%BF%E7%94%A8/1%E9%A6%96%E9%A1%B5%E5%BC%B9%E7%AA%97%E5%85%AC%E5%91%8A%E6%8F%92%E4%BB%B6/" target="_blank">查看帮助</a></p>
                </td>
            </tr>
			<!-- 202365 -->
</table>
<table class="form-table">
             <tr>
            <td valign="top" style="background-color: #343;width: 200px;"><strong style=" font-size: 15px;color: white;letter-spacing: 1px;" >样式2设置</strong><br/>
                </td>
<td>          
<p><strong style="width: 100px;color: #f00;" onclick="test(this)">点我展开样式2设置</strong></p>
</td>
</tr>
</table>
<script type="text/javascript">
function test(obj){
 
  var div1=document.getElementById("div2");
  if(div1.style.display=="block"){
    div1.style.display="none";
  }else{
    div1.style.display="block";
  }
}
</script>
<table class="form-table" id="div2" style="display: none;">
                        <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">弹窗标题</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_noticet_pc_anz" id="popup_noticet_pc_anz" value="<?php echo $popup_noticet_pc_anz; ?>"/> 
                 <p>弹窗标题。默认“网站通知”</p>
                </td>
            </tr>
                        <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">弹窗按钮文字</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_noticet_pc_an" id="popup_noticet_pc_an" value="<?php echo $popup_noticet_pc_an; ?>"/> 
                 <p>弹窗按钮文字。默认“朕已阅”</p>
                </td>
            </tr>

             <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">按钮和文字颜色</strong><br/>
                </td>
                <td>
				 <input class="colorxzq" type="text" size="60"  name="popup_noticet_pc_ans" id="popup_noticet_pc_ans" value="<?php echo $popup_noticet_pc_ans; ?>"/>
               <input class="colorxzq" type="text" size="60"  name="popup_noticet_pc_ansz" id="popup_noticet_pc_ansz" value="<?php echo $popup_noticet_pc_ansz; ?>"/> 
                 <p>前者按钮色（默认#98a3ff），后者按钮文字色（默认#FFF）</p>
                </td>
            </tr>
			<tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">按钮样式</strong><br/>
                </td>
                <td>
				<textarea type="text" style="width: 470px; height: 65px;"   name="popup_noticet_pc_ansy" id="popup_noticet_pc_ansy" value=""/> <?php echo $popup_noticet_pc_ansy; ?></textarea><!-- 202365 -->
                 <p><strong style="width: 100px;color: #f00;">如不懂使用默认即可</strong>，必须以;结尾</p>
                </td>
            </tr>
    </table>
		<table class="form-table">	
            <tr>
            <td valign="top" style=" background-color: #902ccf; "><strong style=" font-size: 15px;color: white;letter-spacing: 1px;">通用</strong><br />
                </td>
            </tr>
             <tr>
                <td valign="top" width="200px"><strong>公告窗口宽度</strong><br />
                </td>
                <td>
               <input type="text" size="60"  name="popup_notice_pc_logo_width" id="popup_notice_pc_logo_width" value="<?php echo $popup_notice_pc_logo_width; ?>"/> 
                 <p>非必要无需设置。控制弹窗宽度，数字后边必须带（px）,如默认宽度400px。<strong style="width: 100px;color: #f00;">如果设置弹窗为大图，此处必须设置成和图片宽度一致.</strong></p>
                </td>
            </tr>
           <tr>
                <td valign="top" width="200px"><strong style=" width: 100px; ">公告内容</strong><br />
                </td>
                <td height="500px">
                 <?php  echo wp_editor( stripslashes(get_option('popup_notice_pc_content')) ,  "popup_notice_pc_content"); ?>
 
                </td>
            </tr>
 </table>
        <br/> <br/>
</form> 
<!-- 2022-8-1添加 -->
        <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#upload-btn').click(function(e) {
            e.preventDefault();
            var image = wp.media({ 
                title: '网站logo地址',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                $('#popup_notice_pc_logo').val(image_url);
            });
        });
    });
    </script>
    <script type="text/javascript"src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
         <script type='text/javascript'>
jQuery(function($){
	$( "input.colorxzq").wpColorPicker();
});
</script>
    <script>
    $(".list-item").click(function(){
     $(".list-item").find("input[type='checkbox']").prop("checked", false);//每次点击前，将所有checkbox置为 未选中
     var cobj = $(this).find("input[type='checkbox']");//当前点击的checkbox
     cobj.prop("checked", true);//将当前点击的checkbox置为选中状态
})
</script>
 <!-- 2022-8-1添加 -->
</div>
            
<form class="layui-form wpcosform" name="wpqiniu_form2" method="post">
                       <div class="layui-form-item">
                       <div class="layui-input-block">
                          <div class="layui-form-mid layui-word-aux">这里设置公告内容，你可以通过编辑器上传图片，切换到文本模式支持html代码</div>
                        </div>
                     </div>
                 </form>
              </div>
           </div>
        </div>
           <!-- 左边 -->
        <!-- 右边  -->
        <script src = 'https://t.uip.top/plugins-img/imgurl.js'></script>
         <div class="layui-col-md3">
           <div id="nav" style="width: 100%; position: relative; top: 0px;">
                              
            <div class="tsxiao-panel"><div id="left-gg">
                <div class="tsxiao-panel-title" id="tsxiao-title"></div>
                <div id="tsxiao-title2" class="tsxiao-code" style=" padding: 5px 0px 0 0; "></div>
                <div class="tsxiao-shangjia" id="tsxiao-shangjia" >    </div>
            </div>
             <div class="tsxiao-panel">
              <div class="tsxiao-panel-title">关注我</div>
              <div class="tsxiao-code">
                <img src="https://t.uip.top/plugins-img/lianxi.jpg">
                <p>微信扫码关注 <span class="layui-badge layui-bg-blue">ts小陈</span> 小程序、公众号</p>
                <p><span class="layui-badge">优先</span> 获取插件更新 和 更多 <span class="layui-badge layui-bg-green">免费插件</span> </p>
                <p>  <a style=" background-color: #1580ff; color: #fff; padding: 0 6px; " target="_blank" href="https://www.tsxxc.com/pay/index.html">无偿赞赏-点击投喂</a></p>
				<p>  <a style=" background-color: #ff5722; color: #fff; padding: 0 6px; " >小陈其他插件</a></p>
				<p>  <a style=" background-color: #7d41c1; color: #fff;   " target="_blank" href="https://www.tsxxc.com/wordpres/plugins/1858.html">禁止指定用户登录或注册</a></p>
				<p>  <a style=" background-color: #7d41c1; color: #fff;   " target="_blank" href="https://www.tsxxc.com/wordpres/plugins/1512.html">设置网站动态标题</a></p>
				<p>  <a style=" background-color: #7d41c1; color: #fff;  " target="_blank" href="https://www.tsxxc.com/wordpres/plugins/1881.html">禁止右键、F12等</a></p>
				
              </div>
             </div>
           </div>
         </div>
       </div>
        <!-- 右边 end -->
       </div> 
  </div>
</div>
<!-- 内容 -->
 </div><!-- content -->
 </div>