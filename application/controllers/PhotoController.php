<?php

class PhotoController extends Zend_Controller_Action
{

    var $photoModel = null;
    
    public function init()
    {
        $layout = $this->_helper->layout();
        $layout->setLayout('clean');
        $this -> view -> setEncoding('UTF-8');
        $this->photoModel = new Application_Model_Photo();
    }

    public function uploadAction()
    {
        $wideimage = new wi_WideImage;
        if ($this->getRequest()->isPost()) {
            
            //UPLOAD przez Zend_File_Transfer_Adapter_Http
//            $adapter = new Zend_File_Transfer_Adapter_Http();
//            
//            $adapter->setDestination(APPLICATION_PATH."/../public/images/upImg/");
//            $fileName = $adapter->getFileName('uploadedfile', false);
//            $date = date('Y-m-d');
//
//            $adapter->addFilter('Rename',array('target' => APPLICATION_PATH.'/../public/images/upImg/' . $date . '-' .$fileName));
//
//            if (!$adapter->receive()) {
//                $messages = $adapter->getMessages();
//                echo implode("\n", $messages);
//                
//            } else {
//                $image_handle = imagecreatefromjpeg(APPLICATION_PATH.'/../public/images/upImg/' . $date . '-' .$fileName);
//                $image = wi_WideImage::load($image_handle);
//                $resized = $image->resize(200, 300);
//                $resized->saveToFile(APPLICATION_PATH.'/../public/images/upImg/' . $date . '-thumb-' .$fileName);
//                $this->view->thumbImage = 'images/upImg/' . $date . '-thumb-' .$fileName;
//            }
            
            $request = $this->getRequest();
            $formData  = $request->getPost();
            
            $date = date('Y-m-d');
            $image = wi_WideImage::load('uploadedfile');
            $nameEncoded = urlencode($formData['name']);
            $resized = $image->resize(200, 300);
            $resized->saveToFile(APPLICATION_PATH.'/../public/images/upImg/' . $date . '-thumb-'.$nameEncoded.'.jpg');
            $this->view->thumbImage = 'images/upImg/' . $date . '-thumb-'.$nameEncoded.'.jpg';
            $this->photoModel->addPhoto(array(
                        'name' => $formData['name'],
                        'imageUrl' => 'images/upImg/' . $date . '-thumb-'.$nameEncoded.'.jpg',
                    ));
            
        }
    }
    
    public function showAction(){
        $photos = $this->photoModel->getAll();
        $this->view->data = $photos;
    }
    
}

