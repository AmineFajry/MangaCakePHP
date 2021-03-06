<?php


namespace App\Controller;
use App\Controller\AppController;
use Cake\Utility\Text;


class CommentsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function index()
    {
        $comments = $this->Comments->get(1);
        dd($comments);

    }


    public function add($id){
        $data = [
            'manga_id' => $id,
            'content' => $this->getRequest()->getData('content')
        ];

        $commentEntity = $this->Comments->newEntity($data);
        if($this->Comments->save($commentEntity)){
            $this->Flash->success("ok");
        }else{
            $this->Flash->error("pas ok");
        }
        $this->set(compact('commentEntity'));

        return $this->redirect($this->referer());

    }

}
