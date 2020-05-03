<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        
    }

    //function to send email
    public function send_mail($to, $subject, $content, $from = 'shadyrock101@gmail.com')
    {
        $emailContent = "<!DOCTYPE><html><head></head><body><div>".$content."</div></body></html>";
                    
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = $from;
        $config['smtp_pass']    = 'Shady Rock 101 149 !$(';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        // $config['smtp_timeout'] = '7';
        // $config['crlf']    = "\r\n";
        // $config['smtp_crypto'] = 'tls';
        // $config['validation'] = TRUE; // bool whether to validate email or not
         

        $this->email->initialize($config);
        $this->email->from($from, 'Woodland University');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
        }
    }

    //function to send non-conditional letter 
    public function non_conditional_letter($firstname, $course, $date, $email)
    {   
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>Congratulations! Your application to study <strong>".$course."</strong> has been reviewed by the Woodlands University College.</p>
        <p>We are delight to inform you that you have fulfilled all the requirements. So, you have a non-conditional offer to join the college. The university now looks forward to receiving all your academic documents within one-week from now that is on <strong>".$date."</strong>.</p>
        <p>Once you submit all the documents, and if all the conditions are met, you will be receiving an email notifications about the registration along with the log-in information to the Woodlands University College’s online system.</p>
        <p>This e-mail confirms that your application has been reviewed. If you have any queries, please email us at <strong>info@woodlanduniversity.com</strong> or contact us on <strong>2011-2221-43111</strong>.</p>
        <p>We look forward to welcoming you to the Woodlands University College.</p>
        <p>Thank you!</p>
        <p>Woodlands University College</p>
        ";

        $this->send_mail($email, 'Unconditonal letter to join Woodland University', $letter);
    }


    //function to send conditional letter 
    public function conditional_letter($firstname, $course, $date, $email)
    {   
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>Congratulations! Your application to study <strong>".$course."</strong> has been reviewed by the Woodlands University College.</p>
        <p>We are delight to receive your application but you have not fulfilled all the requirements. So, you have a conditional offer to join the college. We request you to fulfill all the requirements and also submit all your academic documents within one-week from now that is on <strong>".$date."</strong>.</p>
        <p>Once all the conditions are met, you will be receiving an email notifications about the registration along with the log-in information to the Woodlands University College’s online system.</p>
        <p>This e-mail confirms that your application has been reviewed. If you have any queries, please email us at <strong>info@woodlanduniversity.com</strong> or contact us on <strong>2011-2221-43111</strong>.</p>
        <p>We look forward to welcoming you to the Woodlands University College.</p>
        <p>Thank you!</p>
        <p>Woodlands University College</p>
        ";

        $this->send_mail($email, 'Conditonal letter to join Woodland University', $letter);
    }

    //function to send follow up letter
    public function follow_up_letter($firstname, $course, $date, $email)
    {   
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>We appreciate that you took the time to apply to study <strong>".$course."</strong> in our Woodlands University College. Your application was reviewed and it was informed to you to send all your academic documents and fulfill the university’s requirements.</p>
        <p>The purpose of this e-mail is to remind you that we have not received your documents. We request you to submit it within two-weeks from now that is on <strong>".$date.".</strong>.</p>
        <p>Once all the conditions are met, you will be receiving an email notifications about the registration along with the log-in information to the Woodlands University College’s online system.</p>
        <p>If you have any queries, please email us at <strong>info@woodlanduniversity.com</strong> or contact us on <strong>2011-2221-43111</strong>.</p>
        <p>We look forward to welcoming you to the Woodlands University College.</p>
        <p>Thank you!</p>
        <p>Woodlands University College</p>
        ";

        $this->send_mail($email, 'Follow up letter form Woodland University', $letter);
    }

    //function to send acceptance letter
    public function acceptance_letter($firstname, $student_id, $password, $email)
    {   
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>Congratulations! All your academic documents have been reviewed. We are glad to inform you that you have fulfilled all the requirements. We welcome you to the Woodlands University College.</p>
        <p>Your account has been successfully created in our Woodlands University College’s System. You can now view and access the information related to course and the modules online. To access your account you will need your student Id and password which is mentioned below:</p>
        
        <p>Student ID: ".$student_id."</p>
        <p>Password: ".$password."</p>

        <i>(student_id and password for the specified account is set by the system while registration and log-in information is provided by the system via this email by which student can access the system.)</i>

        <p>This e-mail confirms that you have been successfully registered as one of the user of the Woodlands University College Online System. You are now subscribed to receive the future emails related to Woodlands University College. If you have any queries, please email us at <strong>info@woodlanduniversity.com</strong> or contact us on <strong>2011-2221-43111</strong>.</p>
        <p>Thank you!</p>
        <p>Woodlands University College</p>
        ";

        $this->send_mail($email, 'Acceptance letter form Woodland University', $letter);
    }

    //function to send rejection letter
    public function rejection_letter($firstname, $course, $email)
    {   
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>All your academic documents have been reviewed. We certainly appreciate your interest in our Woodlands University College. </p>
        
        <p>We are very sorry to inform you that you have not fulfilled all the requirements and conditions set by the university. Hence, we are unable to enroll you in the ".$course." course you applied for. </p>

        <p>Again, thank you for taking the time to consider our Woodlands University College. We wish you continued success in your career.</p>

        <p>Sincerely,</p>
        <p>Woodlands University College</p>
        ";

        $this->send_mail($email, 'Acceptance letter form Woodland University', $letter);
    }

    //function to send request change
    public function requestChange($name, $post, $content, $email)
    {
        $letter = "<p> Dear <strong>Administrator</strong>,</p>
        <p>I am a <strong>".$post."</strong> of Woodland University and I want to request you to change my information. The following are the details of the change:</p>
        
        <p>".$content."</p>

        <p>Thank you.</p>

        <p>Sincerely,</p>
        <p>".$name."</p>
        ";

        $this->send_mail('shadyrock101@gmail.com', 'Request for Information Change', $letter, $email);
    }

    //function to send change approve
    public function changeApproved($firstname, $email){
        $letter = "<p> Dear <strong>".$firstname."</strong>,</p>
        <p>Your Request has been approved by the administrator.</p>

        <p>Thank you.</p>

        <p>Sincerely,</p>
        <p>Administrator</p>
        ";

        $this->send_mail($email, 'Request Approved by the Administrator', $letter);
    }


    public function lowAttendance($firstname, $moduleName, $email)
    {
        $letter = "<p>Dear ".$firstname.",</p>
        <p>Your attendance is very low in the module ".$moduleName.".</p>
        <p>This email is to inform you to visit the administration department and share your reason for not attending the classes. As there may be consequences. You may not be able to submit the assignments and give examinations.</p> 
        <p>If you have any other queries please visit the Woodlands University College Online Site ’link’, you can certainly email us or notify us via the system.</p> 
        <p>Sincerely,</p>
        <p>Woodlands Univerysity College</p>";

        $this->send_mail($email, 'Low Attendance in Module', $letter);
    }
}

/* End of file Admission.php */


?>