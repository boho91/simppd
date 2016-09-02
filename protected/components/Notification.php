<?php 
Yii::import('zii.widgets.CPortlet');
 
class Notification extends CPortlet
{
    //public $title='Pemberitahuan';
    public $maxNotif=10;
 
    public function getComments()
    {
        return Pemberitahuan::model()->findNewNotif($this->maxNotif);
    }
 
    protected function renderContent()
    {
        $this->render('pemberitahuan');
    }
}
?>