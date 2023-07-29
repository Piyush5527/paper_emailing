<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            body{
                text-align: center;
            }
            td{
                padding: 0.5em;
            }
            form{
                width:100%;
                height:20rem;
                
            }
            table{
                margin-left:auto;
                margin-right:auto;
                margin-top:7rem;
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
                    <a class="nav-link active" aria-current="page" href="index.php">Upload Data</a>
                    <a class="nav-link" href="sendmail.php">Send Emails</a>
                    <a class="nav-link" href="deleteAllFiles.php">Delete Files</a>
                </div>
            </div>
            </div>
        </nav>
        <form method="post" action="DataSubmitter.php" enctype="multipart/form-data">
            <table border="1">
                <tr>
                    <td>Upload the Excel</td>
                    <td><input type="File" name="mainfile" id="mainfile"/></td>
                </tr>
                <tr>
                    <td>Upload Papers<span class="text-danger">*</span></td>
                    <td><input type="File" name="answersheetdata[]" id="answersheetdata" required  multiple/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-success" name="submit"/><input type="reset" class="btn btn-danger" name="reset"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>