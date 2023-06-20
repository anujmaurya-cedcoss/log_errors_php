<?php
use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function IndexAction()
    {
        // redirected to index
    }
    public function loginAction()
    {
        $arr = array(
            'uname' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        );

        if ($arr['uname'] == 'admin' && $arr['password'] == '12345') {
            echo "<h3>Logged In successfully</h3>";
            die;
        } else {
            // if credentials were invalid, then log in login.log
            $this->logger
                ->excludeAdapters(['signup'])
                ->info('Unauthorized access attempt by : email => \''
                    . $arr['name'] . '\' password => \'' . $arr['password'] . '\'');
            echo "Invalid credentials";
            die;
        }
    }
}
