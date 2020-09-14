<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem i-Aset</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="images/icon/PZM1.ico" />

    <style>
        /*style the header*/
		header {
			padding: 35px;
			text-align: center;
			font-size: 35px;
			color: white;
            background:rgba(255, 255, 255, 0.6);
		}

        body {
            background-image: url('images/bg-title-04.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .button {
            /* position: absolute;  */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            color: black;
            font-size: 16px;
            padding: 25px 42px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
        }

        .buttonA {
            font-size: 24px;
            position:absolute;
            top:60%;
            /* left:60%;  */
        }

        .buttonA:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            background-color: black;
            color: white;
        }

        /* .buttonS {
            font-size: 24px;
            position:absolute;
            top:60%;
            left:40%;
        }

        .buttonS:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            background-color: black;
            color: white;
        } */

        table, th, td{
            padding: 5px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
        <header>
				<h1><font face="Brush Script MT" color="black"> Selamat Datang Ke Sistem i-Aset </font></h1>
        </header>
        <table>
            <tr>
                <td colspan="2">
                    <!-- <button type="button" class="button buttonA" onclick="window.location.href= 'login.php'">Login</button> -->
                    <button type="button" class="button buttonA" onclick="window.location.href= 'loginV16.php'">Log Masuk</button>
                    <!-- <button type="button" class="button buttonS" onclick="window.location.href= 'login.php'">Staf</button> -->
                </td>
            </tr>
        </table>
</body>
</html>
<!-- end document-->
