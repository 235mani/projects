<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\user_db;
use App\Models\hall_db;
use App\Models\reset_password;

class Mail extends BaseController
{

    public function index()
    {       
            $session=session();
            if (isset($_POST['help_submit_message'])) {
                $request = \Config\Services::request();

                $user_name = $request->getPost("user_name");
                $user_mail = $request->getPost("user_mail");
                $user_msg = $request->getPost("user_msg");

                try {
                    $email = \Config\Services::email();

                    $config['protocol'] = 'mail';
                    $config['SMTPHost'] = 'http://bluecarpt.000webhostapp.com';
                    $config['SMTPPort'] = '465';
                    $config['SMTPTimeout'] = '5';
                    $config['SMTPUser'] = '111manideep@gmail.com';
                    $config['SMTPPass'] = 'cztwvnvjfdlgkdop';
                    // $config['recipients'] = 'tmanideep235@gmail.com';

                    $config['charset']  = 'utf-8';
                    $config['mailType'] = 'html';

                    $email->initialize($config);


                    $email->setFrom('111manideep@gmail.com','Admin'); //our site personal mail
                    $email->setTo('itsmanipersonal@gmail.com');   //our site official mail
                    // $email->setCC('another@another-gmail.com');
                    // $email->setBCC('them@their-gmail.com');

                    $email->setSubject('Email Test');
                    $email->setMessage('<div style="background-color:cyan;padding:10px;"><h2>MESSAGE : '.$user_msg.'</h2><br><b>FROM : </b>'.$user_mail.'</div>');
                    // $email->setHeader('111manideep@gmail.com', 'manideep');

                    
                    if (! $email->send())
                    {
                        $session->setTempdata('fail',$email->printDebugger(),3);
                        return redirect()->to(base_url('home'));                     
                    }else{
                        try {
                            $email = \Config\Services::email();

                            $config['protocol'] = 'mail';
                            $config['SMTPHost'] = 'http://bluecarpt.000webhostapp.com';
                            $config['SMTPPort'] = '465';
                            //$config['SMTPTimeout'] = '7';
                            $config['SMTPUser'] = '111manideep@gmail.com';
                            $config['SMTPPass'] = 'cztwvnvjfdlgkdop';
                            // $config['recipients'] = 'tmanideep235@gmail.com';

                            $config['charset']  = 'utf-8';
                            $config['mailType'] = 'html';

                            $email->initialize($config);


                            $email->setFrom('111manideep@gmail.com','BlueCarpt Admin');
                            $email->setTo($user_mail);
                            // $email->setCC('another@another-gmail.com');
                            // $email->setBCC('them@their-gmail.com');

                            $email->setSubject('Email Test');
                            $email->setMessage('<div style="background-color:cyan;padding:10px;"><h4>HELLO , '.$user_name.' Thanks for contacting us .</h4></div>');
                            $email->setHeader('111manideep@gmail.com', 'manideep');

                            
                            if (! $email->send())
                            {
                                $session->setTempdata('fail',$email->printDebugger(),3);
                                return redirect()->to(base_url('home'));  
                            }else{
                                $session->setTempdata('success','Mail Sent',3);
                                return redirect()->to(base_url('home'));  
                            }          
                        } catch (\Exception $e) {
                            $session->setTempdata('fail',$e,3);
                            return redirect()->to(base_url('home'));
                        }
                    }         
                } catch (\Exception $e) {
                    $session->setTempdata('fail',$e,3);
                    return redirect()->to(base_url('home'));
                }
        }
    }
    public function check_forgot_pwd_user(){
            $session = session();
            $auth = new user_db();
            $request = \Config\Services::request();
            $mail = $request->getPost("forgot_password_user_email");

            // $mail_hash = password_hash($mail, PASSWORD_BCRYPT);
            // while (strchr($mail_hash,"/")) {
            //     $mail_hash = password_hash($mail, PASSWORD_BCRYPT);
            // }

            $users = $auth->where(['email'=>$mail])
                           ->find();    
            if ($users) {
                $user_id = $users[0]['user_id'];
                return $this->send_mail_link($mail,$user_id);
            }else{
                $session->setTempdata('fail','User not found',3);
                return redirect()->to(base_url('home'));
            }

    }
    public function send_mail_link($mail,$user_id){
                $session = session();
                try {
                    $email = \Config\Services::email();

                    $config['protocol'] = 'mail';
                    $config['SMTPHost'] = 'http://bluecarpt.000webhostapp.com';
                    $config['SMTPPort'] = '465';
                    $config['SMTPUser'] = '111manideep@gmail.com';
                    $config['SMTPPass'] = 'cztwvnvjfdlgkdop';
                    // $config['recipients'] = 'tmanideep235@gmail.com';

                    $config['charset']  = 'utf-8';
                    $config['mailType'] = 'html';

                    $email->initialize($config);


                    $email->setFrom('111manideep@gmail.com','Admin'); //our site personal mail
                    $email->setTo($mail);   //our site official mail
                    // $email->setCC('another@another-gmail.com');
                    // $email->setBCC('them@their-gmail.com');

                    $email->setSubject('Password Recovery Link');
                    // $email->setMessage('<h3>please click on the link to recovery password</h3><h4>'.base_url().'/Home/recovery/'.$user_id.'</h4>');
                    $email->setMessage('<html>
<head>
    <title></title>


<style type="text/css">
    *{
        font-family:Times New Roman;
    }
    .body{
        background-color: cyan;
    }
    img{
        width:80px;
        float: left;
    }
    .nav{
        background-color:#3b5995;
        padding:1px;
        color:white;
    }
    h1{
        width:50%;
    }
    .text_body{
        padding:10px;
    }
    button{
        border-radius: 5px;
        height: 45px;
        font-size: 20px;
        background: #ff5722;
        font-weight: bold;
        border: none;
        color: #fff;
    }
    p{
        font-size:20px;
        font-weight:bold;
    }
    @media(max-width: 800px){
        p{
            font-size:15px;
        }
    }    
</style>
</head>
<body>
<div class="container body" align="center">
    <div class="nav">
       <img class="logo" src="'.base_url("public/images/logo_white.png").'">
       <h1>UtsavAalay</h1>
    </div>
    <div class="text_body" style="clear:both;">
        <p>You have requested a link to change your password at UtsavAalay. You can do this through the link below</p>
        <br>
        <a href="'.base_url().'/home/recovery/'.$user_id.'">
            <button class="btn btn-warning"><b>Change my password</b></button>
        </a>
        <br><br>
        <p>if you have not requested this, Please ignore this mail.
            <br>
            Your password wont change until you access the link above and create new one
        </p>
    </div>
</div>
</body>
</html>');
                    if (! $email->send())
                    {      
                        $session->setTempdata('fail',$email->printDebugger(),3);
                        return redirect()->to(base_url('home'));             

                    }else{
                        $auth = new reset_password();
                        $details = ["link_date_time"=>date('Y-m-d h:i:s'),
                                    "user_id" => $user_id
                                    ];
                        $fetch= $auth->where([
                                            'user_id'=>$user_id
                                            ])
                                            ->find();
                        if ($fetch) {
                            $res = $auth->where('user_id',$user_id)
                                        ->set($details)
                                        ->update();
                            if ($res) {
                                $session->setTempdata('success','Reset link sent to your mail, link vaild for 5 minutes',3);
                                return redirect()->to(base_url('home'));    
                            }
                            else{
                                $session->setTempdata('fail','Failed',3);
                                return redirect()->to(base_url('home'));
                            }    
                        }else{
                                
                                $res = $auth->insert($details);
                                if ($res) {
                                    $session->setTempdata('success','Reset link sent to your mail, link vaild for 5 minutes',3);
                                    return redirect()->to(base_url('home'));    
                                }
                                else{
                                    $session->setTempdata('fail','Failed',3);
                                    return redirect()->to(base_url('home'));
                                }        
                        }             
                        
                    }
                }catch (\Exception $e) {
                        $session->setTempdata('fail',$e,3);
                        return redirect()->to(base_url('home'));
                }
    }
}