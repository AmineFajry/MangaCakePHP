<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;




use Cake\ORM\Entity;
use Authentication\Controller\Component\AuthenticationComponent;

/**
 * @property AuthenticationComponent Authentication
 */

class FriendsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function index(){

        $friends = $this->Friends->find()->all();
        $this->set(compact('friends'));
    }

    public function add(){
        $friendEntity = $this->Friends->newEmptyEntity();

        if ($this->request->is('post')) {

            $uploadPath = WWW_ROOT ."img/friends_img/";

            $friend_slug_name = Text::slug($this->request->getData('first_name').'-'.$this->request->getData('last_name'));
            $friendEntity->slug_full_name = $friend_slug_name;

            $fileobject = $this->request->getData('submittedfile');
            $clientObject = $friendEntity->slug_full_name . '.jpg';


            $destination = $uploadPath . $clientObject;



            if($clientObject == null){

                $this->Flash->error("Une erreur est survenu de la ville de Bourg !");
                $this->Flash->info("il n'y a pas de fichier");

            }else if (file_exists($destination)){
                $this->Flash->error("L'image existe déjà !");
            }else {

                $fileobject->moveTo($destination);//déplace le fichier

                $this->Friends->patchEntity($friendEntity, $this->request->getData());

                if($this->Friends->save($friendEntity)){
                    $this->Flash->success("yes c'est bon !!!");
                    return $this->redirect($this->referer());
                }else{
                    $this->Flash->error("Une erreur est survenu lors de l'upload !");
                }
            }
        }




        $this->set(compact('friendEntity'));

    }

    public function delete($id=null){
        if ($this->getRequest()->is('post')){
            $friendEntity = $this->Friends->get($id);

            unlink(WWW_ROOT . 'img/friends_img/' . $friendEntity->slug_full_name . '.jpg');

            $this->Friends->delete($friendEntity);
        }
        return $this->redirect(['action' => "index"]);
    }

    public function show($friend_slug_full_name=null){

        if($friend_slug_full_name != null){

            $friendEntity = $this->Friends->find()->where(['slug_full_name' => $friend_slug_full_name])->firstOrFail();


            $this->set(compact('friendEntity'));
        }
    }

    public function send($id){
        $friendID = $this->request->getQuery('$friendID');

        if ( $friendID != null) {
            $data = [
                'manga_id' => $id,
                'favoris' => $this->getRequest()->getData('favoris'),
                'slug_full_name' => $this->Friends->find()->where(['slug_full_name' => $friendID])->firstOrFail()
            ];

            $friendEntity = $this->Friends->newEntity($data);
            if ($this->Friends->save($friendEntity)) {
                $this->Flash->success("ok");
            } else {
                $this->Flash->error("pas ok");
            }
        }

        return $this->redirect($this->referer());

    }


}
