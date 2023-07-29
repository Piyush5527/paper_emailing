<!DOCTYPE html>
<html>
    <head>
        <title> Remove Existing files</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="">
        <style>
            td{
                padding-top:2rem;
                padding-right:3rem;
                padding-left:3rem;
            }
            body{
                text-align:center;
            }
            .main-container{
                width:100%;
            }
            table{
                margin-left:auto;
                margin-right:auto;
                margin-top:8rem;
            }
            button{
                width:90%;
                margin-top:1rem;
                /* margin-top:-30%; */
            }
        </style>
    </head>
    <body>
        <?php
            $directoryMarksheets = "answersheets/";
            $dirExcel="excel/";
            
            $fiMark = new FilesystemIterator($directoryMarksheets, FilesystemIterator::SKIP_DOTS);
            $fiEx = new FilesystemIterator($dirExcel, FilesystemIterator::SKIP_DOTS);
        ?>
        <?php
            if(isset($_POST['delete_files']))
            {
                foreach ($fiMark as $answerSheet)
                {
                    unlink($answerSheet);
                }
                
                echo "<Script> alert('Data Deleted Successfully');</script>";
            }
            if(isset($_POST['delete_excels']))
            {
                foreach($fiEx as $excelSheet)
                {
                    unlink($excelSheet);
                }
                echo "<Script> alert('Data Deleted Successfully');</script>";
            }
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Email Sender</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link"  href="index.php">Upload Data</a>
                        <a class="nav-link" href="sendmail.php">Send Emails</a>
                        <a class="nav-link active" aria-current="page" href="deleteAllFiles.php">Delete Files</a>
                    </div>
                </div>
                </div>
        </nav>
        <div class="main-container">
        <table border="1">
            <tr>
                <td>Total Excel Files:</td>
                <td><?php echo iterator_count($fiEx);?></td>
            </tr>
            <tr>
                <td>Total Marksheets:</td>
                <td><?php echo iterator_count($fiMark);?></td>
            </tr>
            <tr>
                <form method="post">
                    <td colspan="2">
                        <Button type="Submit" name="delete_excels" class="btn btn-danger">Delete Excels Only</Button>
                        <Button type="Submit" name="delete_files" class="btn btn-danger">Delete Answersheets Only</Button>

                    </td>
                </form>
            </tr>
        </table>
        </div>
    </body>
</html>