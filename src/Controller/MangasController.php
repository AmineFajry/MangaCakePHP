<?php


namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;




use Cake\ORM\Entity;
use Authentication\Controller\Component\AuthenticationComponent;

/**
 * @property AuthenticationComponent Authentication
 */

class MangasController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['json']);
    }

    public function index(){

        $mangas = $this->Mangas->find()->all();
        $this->set(compact('mangas'));

    }

    public function add(){

        $mangaEntity = $this->Mangas->newEmptyEntity();

        if ($this->request->is('post')) {

            $uploadPath = WWW_ROOT ."img/mangas_img/";



            $manga_slug_name = Text::slug($this->request->getData('name'));
            $mangaEntity->slug_name = $manga_slug_name;

            $fileobject = $this->request->getData('submittedfile');
            $clientObject = $manga_slug_name . '.jpg';





            $destination = $uploadPath . $clientObject;




            if($clientObject == null){

                $this->Flash->error("Une erreur est survenu de la ville de Bourg !");
                $this->Flash->info("il n'y a pas de fichier");

            }else if (file_exists($destination)){
                $this->Flash->error("L'image existe déjà !");
            }else {

                $fileobject->moveTo($destination);//déplace le fichier

                $this->Mangas->patchEntity($mangaEntity, $this->request->getData());

                if($this->Mangas->save($mangaEntity)){
                    $this->Flash->success("yes c'est bon !!!");
                    return $this->redirect($this->referer());
                }else{
                    $this->Flash->error("Une erreur est survenu lors de l'upload !");
                }
            }
        }






        $this->set(compact('mangaEntity'));

    }

    public function delete($id=null){
        if ($this->getRequest()->is('post')){
            $mangaEntity = $this->Mangas->get($id);

            unlink(WWW_ROOT . 'img/mangas_img/' . $mangaEntity->slug_name . '.jpg');

            $this->Mangas->delete($mangaEntity);
        }
        return $this->redirect(['action' => "index"]);
    }


    public function show($manga_slug_name=null){

        if($manga_slug_name != null){
            $mangaEntity = $this->Mangas->find()->where(['slug_name' => $manga_slug_name])->contain(['Comments'])->contain(['Friends'])->firstOrFail();


            /*foreach ($mangaEntity->friends as $friend)
            {
                $friendsTab[] = $friend->slug_full_name;

            }*/

            dd($mangaEntity->friends);

            $this->set(compact('mangaEntity'));
        }

    }

    public function json($id = null){

        $name = $this->request->getQuery('name');
        $limit = $this->request->getQuery('limit');


        $conditionList = array("Mangas.name LIKE" => '%'.$name.'%');
        if($id != null)
            $conditionList = array("Mangas.name LIKE" => '%'.$name.'%', "Mangas.name =" => $id);

        $MangasTab = $this->Mangas->
        find('all',array(
            'order' => 'name ASC',
            'limit' => $limit,
            'conditions' => $conditionList,
        ));

        $etat = 200;
        if ($MangasTab->serialize() == 0)
            $etat = 400;


        return $this->response
            ->withStringBody(json_encode($MangasTab))
            ->withStatus($etat)
            ->withType("application/json"); // pour indiquer au navigateur que nous avons un json
    }
}
