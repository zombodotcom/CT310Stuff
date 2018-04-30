<?php 

namespace Model\Tutorialstuff;


class TutorialParagraph extends \Orm\Model
{
    protected static $_properties = array('tutorialParagraphID', 'tutorialParagraphText', 'tutorialParagraphCode','tutorialParagraphImage','tutorialSectionID');
    protected static $_table_name = 'tutorialParagraphs';
    protected static $_primary_key = array('tutorialParagraphID');
}
