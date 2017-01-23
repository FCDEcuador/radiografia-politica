<?php

namespace App\Validator;

use App\Models\Profile;

class ProfileValidator
{
    private $model;

    private $id;

    function __construct(Profile $model)
    {
      $this->model = $model;
    }

    public function validate($id)
    {
      $this->id = $id;
      $this->model = $this->model->find($id);
      $valid = true;
      $valid &= $this->hasDataFinished();
      $valid &= $this->hasTimelineFinished();
      $valid &= $this->hasSRI();
      $valid &= $this->hasHeritageComplete();
      $valid &= $this->hasCompaniesComplete();
      $valid &= $this->hasJudicalsComplete();
      $valid &= $this->hasSenecyt();
      $valid &= $this->hasContraloria();
      return ((bool)$valid);
    }

    public function hasSetField($field)
    {
      return $field != null && $field != "";
    }

    public function hasDataFinished()
    {
        $valid = true;
        $valid &= $this->hasSetField($this->model->picture);
        $valid &= $this->hasSetField($this->model->person->name);
        $valid &= $this->hasSetField($this->model->person->lastname);
        $valid &= $this->hasSetField($this->model->person->img);
        $valid &= $this->hasSetField($this->model->person->politicalParty);
        $valid &= $this->hasSetField($this->model->person->description);
        return $valid;
    }

    public function hasTimelineFinished()
    {
      $valid = true;
      $valid &= count($this->model->person->timelines) > 0;
      return $valid;
    }

    public function hasSRI()
    {
      $valid = true;
      $valid &= count($this->model->sri) > 0;
      $valid &= $this->hasSetField($this->model->urlSri);
      return $valid;
    }

    public function hasHeritageComplete()
    {
      $valid = true;
      $valid &= $this->hasSetField($this->model->heritage);
      if($this->model->heritage != null)
      {
        // $valid &= $this->hasSetField($this->model->heritage->houses);
        // $valid &= $this->hasSetField($this->model->heritage->cars);
        // $valid &= $this->hasSetField($this->model->heritage->money);
        // $valid &= $this->hasSetField($this->model->heritage->companies);
        //     dd($this->hasSetField($this->model->heritage->houses));
        /*$valid &= $this->hasSetField($this->model->heritage->previousDeclaration);
        $valid &= $this->hasSetField($this->model->heritage->actualDeclaration);
        $valid &= $this->hasSetField($this->model->heritage->previousAssets);
        $valid &= $this->hasSetField($this->model->heritage->actualAssets);
        $valid &= $this->hasSetField($this->model->heritage->previousLiabilities);
        $valid &= $this->hasSetField($this->model->heritage->actualLiabilities);
        $valid &= $this->hasSetField($this->model->heritage->previousHeritage);
        $valid &= $this->hasSetField($this->model->heritage->actualHeritage);*/
      }
      $valid &= $this->hasSetField($this->model->urlHeritage);
      return $valid;
    }

    public function hasCompaniesComplete()
    {
      $valid = true;
      $valid &= $this->hasSetField($this->model->urlCompanies);
      return $valid;
    }

    public function hasJudicalsComplete()
    {
      $valid = true;
      $valid &= $this->hasSetField($this->model->urlJudicial);
      return $valid;
    }

    public function hasSenecyt()
    {
        $valid = true;
        $valid &= $this->hasSetField($this->model->urlStudy);
        return $valid;
    }

    public function hasContraloria()
    {
        $valid = true;
        $valid &= $this->hasSetField($this->model->urlComptroller);
        return $valid;
    }
}
