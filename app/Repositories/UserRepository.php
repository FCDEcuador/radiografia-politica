<?php
namespace App\Repositories;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Exception;

class UserRepository
{

  protected $model;

  function __construct(User $model)
  {
    $this->model = $model;
  }

  function all()
  {
    return $this->model->all();
  }

  function find($id)
  {
    return $this->model->find($id);
  }

  function delete($id)
  {
    $m =  $this->model->find($id);
    return $m->delete();
  }

  function create($data)
  {
    $pass = $this->randomPassword(15);
    $data["password"] = bcrypt($pass);
    $data["role_id"] = $data["role"];
    try {
      if ($this->model->create($data) != null)
      {
        $data["password"] = $pass;
        Mail::send('emails.new_user', $data, function ($m) {
              $from = Config::get('mail_settings.system.send_from');
              $to = 'rarmas@umpacto.com';
              $m->from($from, 'Politics Service');
              $m->to($to)->subject('Bienvenido a Políticos');
        });
        return true;
      }else {
        return false;
      }
    } catch (Exception $e) {
      $m = $this->model->withTrashed()->where('email', $data["email"])->first();
      if($m->restore())
      {
        $m->password = $data["password"];
        $m->name = $data["name"];
        $m->role_id = $data["role_id"];
        if($m->update())
        {
          Mail::send('emails.new_user', $data, function ($m) {
                $from = Config::get('mail_settings.system.send_from');
                $to = 'rarmas@umpacto.com';
                $m->from($from, 'Politics Service');
                $m->to($to)->subject('Bienvenido de nuevo a Políticos');
          });
          return true;
        }
      }

      return false;
    }
  }

  function update($id,$data)
  {
    $user = $this->model->find($id);
    $data["role_id"] = $data["role"];
    try {
      if ($user->update($data))
      {
        return true;
      }else {
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
  }

  function randomPassword($length = 16) {
    $alphabet = "$@!{}?#&()=.<>-_^+*";
    $pass = ""; //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in CachingIterator
    for ($i = 0; $i < $length; $i++) {
        $s = rand(0,5);
        if($s==0)
        {
          $n = rand(0, $alphaLength);
          $l = $alphabet[$n];

        }else
        {
          $l = str_random(1);
        }
        $pass .= $l;

    }
    return $pass; //turn the array into a string
  }

}
