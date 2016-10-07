<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <script src="js/jquery.js"></script>
</head>
<body>
<form action="account" method="post">
    <center>
        <h1>XXX网吧</h1>
        <input type="hidden" name="id" id="id" value="<?php echo $id?>"/>
        <table>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <tr>
                <td>
                    <input type="radio" name="radio" class="radio" value="1"/>VIP区
                    <input type="radio" name="radio" class="radio" value="2"/>普通区
                </td>
            </tr>
            <tr>
                <td>上机时间</td>
                <td>
                    <select name="times" id="times">
                        <option value="0">请选择</option>
                        <option value="1">一小时</option>
                        <option value="2">两小时</option>
                        <option value="3">三小时</option>
                    </select>

                </td>
            </tr>
            <tr>
                <td>所需押金：<span id="span2" name="money"></span></td>
                <input type="hidden" name="money" id="money"/>
            </tr>
            <tr>
                <td><input type="submit" value="确认支付"/></td>
            </tr>

        </table>
    </center>
</form>
</body>
</html>
<script>
    $(function(){
        $("#times").change(function(){
            var num=$(this).val()
            var id=$("#id").val()
            var radio=$(".radio:checked").val();
            if(num=="0"){
                alert("请填写所上小时数")
            }
            $.get("money", { radio: radio, times: num ,id:id} ,function(msg){
                $("#span2").html(msg)
                $("#money").val(msg)
            });
        })
    })
</script>