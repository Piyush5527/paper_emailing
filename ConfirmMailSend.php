<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    if(isset($_POST['mailsend']))
    {
        require_once "Classes/PHPExcel.php";
        $path=$_POST['excelSheet'];
        if($_POST['excelSheet']=='select')
        {
            // echo "<script>alert('No Excel Sheet Selected');;window.location.href('sendmail.php');</script>";
            echo "<script>alert('No Excel Sheet Selected');;window.location.href = 'sendmail.php';</script>";
        }
        else
        {
            $reader=PHPExcel_IOFactory::createReaderForFile($path);
            $excel_obj= $reader -> load($path);
            $worksheet=$excel_obj -> getActiveSheet();
            $highestRow=$worksheet->getHighestRow();
            
            $studNameColumn=$_POST['NameCellValue'];
            $studNameColumn=strtoupper($studNameColumn);

            $studEnrollColumn=$_POST['EnrollmentCellValue'];
            $studEnrollColumn=strtoupper($studEnrollColumn);

            $studEmailColumn=$_POST['MailCellValue'];
            $studEmailColumn=strtoupper($studEmailColumn);

            $mailSubject=$_POST['MailSubject'];
            $mailMessage=$_POST['MailMessage'];
            $directoryMarksheets = "answersheets/";
            $fiMark = new FilesystemIterator($directoryMarksheets, FilesystemIterator::SKIP_DOTS);
            

            // echo $highestRow;
            for($i=2;$i<=$highestRow;$i++)
            {
                $emailId=$worksheet->getCell($studEmailColumn.$i)->getValue();
                $studName=$worksheet->getCell($studNameColumn.$i)->getValue();
                $studEnrol=$worksheet->getCell($studEnrollColumn.$i)->getValue();
                // echo $emailId." ".$studName." ".$studEnrol."<br/>";

                $mail=new PHPMailer(true);
                $mail->isSMTP(true);
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'admin_mca@ljku.edu.in';
                $mail->Password = 'admin@123';
                // $mail->Username = 'tempmail4812@gmail.com';
                // $mail->Password = 'f53b79f0dc7d487da43e9a903e91821f';

                // $mail->SMTPSecure='ssl';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                ); 

                $mail->setFrom('admin_mca@ljku.edu.in');
                $mail->addAddress($emailId);
                $mail->isHtml(true);
                $mail->Subject=$mailSubject;
                $mail->Body=$mailMessage;
                // echo $directoryMarksheets.$studEnrol;
                if(file_exists($directoryMarksheets.$studEnrol.".rar") || file_exists($directoryMarksheets.$studEnrol.".zip") || file_exists($directoryMarksheets.$studEnrol.".pdf"))
                {
                    if(file_exists($directoryMarksheets.$studEnrol.".rar"))
                    {
                        $mail->addAttachment($directoryMarksheets.$studEnrol.".rar");
                        if (!$mail->send()) {
                            echo "<p style='color:yellow'>".$studEnrol." mail can't be sended please try again</p>", $mail->ErrorInfo;
                        }
                        else{
                            echo "<p style='color:green'>".$studEnrol." mail has been sent </p>";
                        }
                    }
                    elseif (file_exists($directoryMarksheets.$studEnrol.".pdf")) {
                        $mail->addAttachment($directoryMarksheets.$studEnrol.".pdf");
                        if (!$mail->send()) {
                            echo "<p style='color:yellow'>".$studEnrol." mail can't be sended please try again</p>", $mail->ErrorInfo;
                        }
                        else{
                            echo "<p style='color:green'>".$studEnrol." mail has been sent </p>";
                        }
                    }
                    else
                    {
                        $mail->addAttachment($directoryMarksheets.$studEnrol."zip");
                        if (!$mail->send()) {
                            echo "<p style='color:yellow'>".$studEnrol." mail can't be sended please try again</p>", $mail->ErrorInfo;
                        }
                        else{
                            echo "<p style='color:green'>".$studEnrol." mail has been sent </p>";
                        }
                    }
                    
                    
                }
                else
                {
                    echo "<p style='color:red;'>".$studEnrol." mail cant be sent because it's answersheet was not found </p>";
                }
            }
        }
    }
?>