<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./assets/js/commonss.css">
    <link rel="stylesheet" type="text/css" href="./assets/js/mainss.css">
    <script type="text/javascript" src="./assets/js/modernizrss.js"></script>
</head>
<body>

<div class="container clearfix">
    <include file="Public:left" />
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="index.php?r=index/numlist" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <td>
                                <input  name="id" size="50" value="<?php echo $data['id']?>" type="hidden" placeholder="请输入公众号">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>用户：</th>
                            <td>
                                <input class="common-text required" id="title" name="iuser" size="50" value="<?php echo $data['iuser']?>" type="text" placeholder="请输入公众号">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>公众号：</th>
                            <td>
                                <input class="common-text required" id="title" name="num" size="50" value="<?php echo $data['num']?>" type="text" placeholder="请输入公众号">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button" >
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>