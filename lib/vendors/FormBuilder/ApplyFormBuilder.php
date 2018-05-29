<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\FileField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\IsANumberValidator;
use \OCFram\FileValidator;

class ApplyFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Candidat',
        'name' => 'candidat',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Numero de téléphone',
        'name' => 'numero',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
          new IsANumberValidator('Vous devez rentrer un nombre.'),
        ],
       ]))
       ->add(new FileField([
        'label' => 'Fichier',
        'name' => 'fichier',
        'maxSize'=> 4194304,
        'validators' => [
          //new NotNullValidator('Merci d\'ajouter un fichier.'),
          new FileValidator('Votre fichier est trop gros. Maximum 4Mo.', 4194304),
        ],
       ]));
  }
}