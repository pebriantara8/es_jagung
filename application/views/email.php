<?php
$logo  = 'http://dengerin.id/dashboard/public/images/logo.png';
$halo  = "Yth. $name";
$p_1   = 'Untuk merubah password anda, silahkan klik url di bawah ini:';
$p_3   = 'Bila anda mengalami kesulitan untuk merubah password anda, silahkan hubungi operator';
$email = "Powered by Dengerin.id";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
    </head>
    <body style="font-family:'HelveticaNeue','Helvetica Neue',Helvetica,Arial,sans-serif;">
        <table  width="100%" cellspacing="0" cellpadding="0" bgcolor="#F5F8FA" border="0">
            <tbody>
                <tr>
                    <td style="padding:0;margin:0;line-height:1px;font-size:1px" align="center">
                        <table style="width:448px;background-color:#ffffff;padding:0;margin:0;line-height:1px;font-size:1px" width="448" cellspacing="0" cellpadding="0" bgcolor="#ffffff" border="0" align="center">
                            <tbody>

                                <tr style="background-color: #4CB6CB" >
                                    <td ></td>
                                    <td style="display: inline-flex;padding:0;margin:0;line-height:1px;font-size:1px" > 
                                        <img src="<?=$logo?>" style="padding: 10px;height: 50px; width:50px;display:block;" width="32" >
                                        <p style="font-size: 18px;font-family:Helvetica,Arial,sans-serif;font-weight:bold;color:#fff;text-align:left;margin: auto">
                                        Dengerin.id
                                        </p>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr align="left;">
                                    <td width="24"></td>
                                    <td >
                                        <table cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top:10px ;margin:0;line-height:1px;font-size:1px;font-size:18px;line-height:32px;font-weight:bold;color:#292f33;text-align:left;" align="left;"> 
                                                    <?=$halo?>
                                                    </td>
                                                </tr>
                                                
                                                <tr> <td height="6"></td> </tr>
                                                
                                                <tr>
                                                    <td  style="font-size:16px;line-height:20px;font-weight:400;color:#292f33;text-align:left;" align="left;"> 
                                                    <?=$p_1?>
                                                    </td>
                                                </tr>

                                                <tr> <td height="6"></td> </tr>

                                                <tr>
                                                    <td  style="margin-top:12px;line-height:1px;border-radius:4px;line-height:12px" bgcolor="#4CB6CB" align="center">
                                                        <strong style="text-decoration:none;border-style:none;border:0;padding:0;margin:0;font-size:12px;color:#ffffff;border-radius:4px;padding:8px 17px;border:1px solid #1da1f2;display:inline-block;font-weight:bold;text-align: left">
                                                           <a style="color: #fff" target="_blank" href="<?=$link?>"><?=$link?></a>
                                                        </strong>
                                                    </td>
                                                </tr>

                                                <tr> <td height="6"></td> </tr>
      
                                                <tr>
                                                    <td style="font-size:16px;line-height:20px;font-weight:400;color:#292f33;text-align:left;" > 
                                                	<?=$p_3?>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table> 
                                    </td>
                                    <td width="24" height="36"></td>
                                </tr>
                            </tbody>
                        </table>


                        <table style="background-color:#ffffff;line-height:1px;padding-top: 15px" width="448"  cellspacing="0" >
                            <tbody>
                                <tr>
                                    <td align="center"> <span style="font-size:12px;line-height:16px;font-weight:400;color:#8899a6;"> 
                                    <?=$email?>
                                     </span> </td>
                                </tr>
                                <tr> <td height="6"></td> </tr>
                               
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>	
    </body>
</html>