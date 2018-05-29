<?php
namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\TextField;
use \OCFram\DateField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;
use \OCFram\IsANumberValidator;
use \OCFram\IsADateValidator;

class JobsFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Intitulé',
        'name' => 'titre',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le titre de l\'offre'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier l\'auteur de l\'offre'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 8,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le contenu de l\'offre'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Lieu',
        'name' => 'lieu',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le lieu spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier un lieu'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Rénumération',
        'name' => 'renum',
        'maxLength' => 8,
        'validators' => [
          new MaxLengthValidator('Le lieu spécifié est trop long (8 caractères maximum)', 8),
          new NotNullValidator('Merci de spécifier une rénumération'),
          new IsANumberValidator('Vous devez rentrer un nombre.'),
        ],
       ]))
       ->add(new DateField([
        'label' => 'Date limite pour postuler',
        'name' => 'dateExpire',
        'maxLength' => 8,
        'validators' => [
          new NotNullValidator('Merci de spécifier une date limite'),
          new IsADateValidator('Merci de rentrer une date'),
        ],
       ]));

  }
}