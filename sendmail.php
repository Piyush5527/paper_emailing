<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        td{
            padding:1.5rem 3rem 1.5rem 3rem;
        }
        .main-container{
            width:100%;
            margin-top:3rem;
        }
        table{
            margin-left:auto;
            margin-right:auto;
            border:1px solid black;
        }
        input[type="submit"],input[type="reset"]{
            width:40%;
            margin-left:20px;
            margin-right:20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Email Sender</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link"  href="index.php">Upload Data</a>
                    <a class="nav-link active" aria-current="page" href="sendmail.php">Send Emails</a>
                    <a class="nav-link"  href="deleteAllFiles.php">Delete Files</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-container">
        <table>
            <form method="post" action="ConfirmMailSend.php">
                <tr>
                    <td>Select Excel Sheet</td>
                    <td><select name="excelSheet" className="excelSheet">
                        <option value="select">Select</option>
                        <?php 
                            $dirExcel="excel/";
                            $fiExcel = new FilesystemIterator($dirExcel, FilesystemIterator::SKIP_DOTS);
                            foreach ($fiExcel as $fileName)
                            {
                                $newStr=substr($fileName,6,strlen($fileName));
                                // echo $newStr;
                        ?>
                            <option value=<?php echo $fileName ?>><?php echo $newStr ?></option>
                        <?php
                            }
                        ?> 
                        </select>
                    
                    </td>
                </tr>
                <tr>
                    <td>Enter Student Name Column</td>
                    <td><input type="text"name="NameCellValue" placeholder="ex. 'E'" required/></td>
                </tr>
                <tr>
                    <td>Select Student Enrollment Column</td>
                    <td><input type="text"name="EnrollmentCellValue" placeholder="ex. 'D'" required/></td>
                </tr>
                <tr>
                    <td>Select Student Email Column</td>
                    <td><input type="text"name="MailCellValue" placeholder="ex. 'A'" required/></td>
                </tr>
                <tr>
                    <td>Enter Subject of Mail</td>
                    <td><input type="text"name="MailSubject" placeholder="ex. 'Marksheet'" required/></td>

                </tr>
                <tr>
                    <td>Enter Common Message</td>
                    <td><input type="text"name="MailMessage" placeholder="ex. 'Check Your Marksheet'" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-success" name="mailsend" value="Send"/><input type="reset" class="btn btn-warning" value="reset"/></td>
                </tr>

            </form>
        </table>
    </div>
</body>
</html>