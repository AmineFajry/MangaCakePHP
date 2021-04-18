<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;




use Cake\ORM\Entity;
use Authentication\Controller\Component\AuthenticationComponent;

/**
 * @property AuthenticationComponent Authentication
 */


class UsersController extends AppController
{

    public function initialize():void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login', 'signin']);

    }

    public function login(){
        $userEntity = $this->Users->newEmptyEntity();

        $result = $this->Authentication->getResult();

        if($result->isValid()){
            $target = $this->Authentication->getLoginRedirect()??'/';
            return $this->redirect($target);
        }

        if ($this->request->is('post') && !$result->isValid()) {

            $this->Flash->error('mot de passe non valide');
        }

        $this->set(compact('userEntity'));
    }

    public function logout(){

        $this->Authentication->logout();

        $this->Flash->error('Vous vous êtes doconnecté');

        return $this->redirect('/');

    }

    public function signin(){



        $userEntity = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {


            $this->Users->patchEntity($userEntity, $this->request->getData());

            if($this->Users->save($userEntity)){
                $this->Flash->success("yes c'est bon !!!");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }else{
                $this->Flash->error("Une erreur est survenu lors de l'upload !");
            }

        }



        $this->set(compact('userEntity'));


    }
}
