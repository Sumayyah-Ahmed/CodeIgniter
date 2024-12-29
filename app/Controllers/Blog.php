<?php namespace App\Controllers;

use App\Models\BlogModel;
class Blog extends BaseController
{
    public function index()
    {
        $data = [
            //'meta_title' => 'Codeigniter 4 Blog',
             'title' => 'This is a Blog Page',
            ];

        $posts = ['Title 1', 'Title 2', 'Title 3'];
        $data['posts'] = $posts;
        return view('blog', $data);
    }

    public function post(){
        $model = new BlogModel();
        $post = $model->find();
        if($post){
            
            $data = [
            'meta_title' => $post['post_title'],
            'title' => $post['post_title'],
            'post' => $post
                ];
        }else{
            $data = [
            'meta_title' => 'Post Not Found',
            'title' => 'Post Not Found',
                ];
        }
        return view('single_post', $data);
    }

    public function new(){
        $data = [
            'meta_title' => 'New Post',
            'title' => 'Create new post',
            ];
        
        if($this->request->getMethod() == 'post'){
            $model = new BlogModel();
            $model->save($_POST);
        }
        return view('new_post', $data);
    }

    public function delete($id){
        $model = new BlogModel();
        $post = $model->find($id);
        if($post){
            $model->delete($id);
            return redirect()->to('/blog');
        }
    }


    public function edit($id){
        $model = new BlogModel();
        $post = $model->find($id);
        $data = [
            'meta_title' => $post['post_title'],
            'title' => $post['post_title'],
            'post' => $post
            ];
        if($this->request->getMethod() == 'post'){
            $model = new BlogModel();
            $model->save($_POST);
        }
        return view('edit_post', $data);
    }


}
