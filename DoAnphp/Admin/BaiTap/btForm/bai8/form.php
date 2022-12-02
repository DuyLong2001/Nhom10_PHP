<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    
    ?>
<form action="?page_layout=baitap&baiForm=8a" method="post">
    <table>
        <tr>
            <td colspan="2" ><h1>Enter your Information </h1></td>
        </tr>
        <tr>
            <td>Full name:</td>
            <td>
            <input type="text" name="fullname" value="">
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>
            <input type="text" name="address" value="" >
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>
            <input  type="text" name="phone" value="">
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
            <input type="radio" name="gender" value="Nam">Nam
            <input type="radio" name="gender" value="Nữ">Nữ
            </td>
        </tr>        <tr>
            <td>Country:</td>
            <td>
            <select name="country">
                    <option  value="Việt Nam">Việt Nam</option>
                    <option  value="Nhật Bản">Nhật Bản</option>
                    <option  value="Hàn Quốc">Hàn Quốc</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Study:</td>
            <td>
            <input type="checkbox" name="stu">PHP & MySQL
                    <input type="checkbox" name="ASPNet">ASP.Net
                    <input type="checkbox" name="CCNA">CCNA
                    <input type="checkbox" name="Security">Security+
            </td>
        </tr>

        <tr>
            <td>Note:</td>
            <td>
            <textarea name="note" cols="3" rows="5" ></textarea>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
            <input type="submit" value="Gửi" name="submit">
                <input type="reset" value="Hủy" name="reset">
            </td>
        </tr>



    </table>
    
</body>
</html>