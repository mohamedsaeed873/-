<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            background-color: whitesmoke;
            font-family: 'Tajawal', sans-serif;
        }
        #mother{
            wwidth: 100%;
            font-size: 20px;

        }
        main{
            float: left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid gray;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
        #tbl{
            width: 650px;
            font-size: 20px;
            text-align: center;
        }
        #tbl th{
            background-color: silver;
            font-size: 20px;
            padding: 10px;
            text-align: center;
        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 20px;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body dir="rtl">
    <?php
    #الاتصال بقاعدة البيانات
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'student';

    $con = mysqli_connect($host, $user, $pass, $dbname);
    $res = mysqli_query($con, "select * from student");
    #Butten variable --

    $id = '';
    $name = '';
    $address = '';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }

    $sqls = '';

    if(isset($_POST['add'])){
        $sqls = "insert into student value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }

    if(isset($_POST['del'])){
        $sqls = "delete from student where name='$name'";
        mysqli_query($con, $sqls);
        header("location: home.php");
    }
    ?>
    <div id="mother">
        <form method="POST">
            <!-- لوحة التحكم-->
            <aside>
                <div id="div">
                    <img src="https://www.logolynx.com/images/logolynx/85/85068d940eae0b7383a23262fe450d03.png" alt="logo" width="170">
                    <h3>لوحة المدير</h3>
                    <label for="">رقم الطالب</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">اسم الطالب</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="">عنوان الطالب</label><br>
                    <input type="text" name="address" id="address"><br><br>
                    <button name="add">اضافة الطالب</button>
                    <button name="del">حذف الطالب</button>
                </div>
            </aside>
            <main>
                    <table id="tbl">
                        <tr>
                            <th>الرقم التسلسلي</th>
                            <th>اسم الطالب</th>
                            <th>عنوان الطالب</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </main>
            <!-- عرض البيانات -->
        </form>
    </div>
</body>
</html>