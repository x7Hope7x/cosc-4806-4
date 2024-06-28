<?php

  class Update extends Controller{

    public function index(){
      
      $user = $this->model('User');
      $this -> view( 'update/index');
      
    }

    public function update(){
      $user = $this->model('User');
      $user->update_reminder();
    }
  }