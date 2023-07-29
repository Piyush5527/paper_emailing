<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
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
                        <a class="nav-link active" aria-current="page" href="index.php">Upload Data</a>
                        <a class="nav-link" href="sendmail.php">Send Emails</a>
                        <a class="nav-link"  href="deleteAllFiles.php">Delete Files</a>
                    </div>
                </div>
                </div>
        </nav>
        <?php
            $targetdir="excel/";
            $excel=$targetdir.basename($_FILES["mainfile"]["name"]);
            $fileType=pathinfo($excel,PATHINFO_EXTENSION);
            
            // print_r($_FILES['mainfile']);
            if(isset($_FILES['mainfile']) && $_FILES['mainfile']['size']>0 && $_FILES['mainfile']['error']!=4)
            {
                if($fileType == 'xlsx' || $fileType == 'xls')
                {
                    $resExcel=move_uploaded_file($_FILES["mainfile"]["tmp_name"],$excel);
                    if($resExcel==1)
                    {
                        echo "Submit of Excel file successs";
                    }
                    else
                    {
                        echo "Submit of Excel File error";
                    }
                }
                else
                {
                    echo "<script>if(confirm('Wrong File format(.xlsx & xls acceptable)!'))
                        {document.location.href='index.php'};
                        </script>";
                }
            } 
            //uploading the answersheets 
            $fileStorageDir="answersheets/";
            if(isset($_FILES['answersheetdata']))
            {
                foreach($_FILES['answersheetdata']['name'] as $key => $value)
                {
                    $file_tmpname = $_FILES['answersheetdata']['tmp_name'][$key];
                    $file_name = $_FILES['answersheetdata']['name'][$key];
                    $file_size = $_FILES['answersheetdata']['size'][$key];
                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    if($file_ext == "zip" || $file_ext == "rar" || $file_ext == "pdf")
                    {
                        $marksheetPath = $fileStorageDir.$file_name;
                        if( move_uploaded_file($file_tmpname, $marksheetPath)) {
                            echo "<br/>{$file_name} successfully uploaded";
                        }
                        else {                    
                            echo "<p style='color:red;'>Error uploading {$file_name} </p>";
                        }
                    }
                }
            }
        ?>
    </body>
</html>