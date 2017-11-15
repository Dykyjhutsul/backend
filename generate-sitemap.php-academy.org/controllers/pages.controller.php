<?php

class PagesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index(){
        //$this->data['pages'] = $this->model->getList();

        if($_POST){
            $url=$_POST['hrefs'];
            $changefreq=$_POST['changefreq'];
            //echo $url;
            $array = explode('/',$url);

            $html = file_get_html($url);
            if(file_exists('sitemap.xml')){
                unlink('sitemap.xml');
            }
            $fp = fopen('sitemap.xml','a');
            fwrite($fp,'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL.PHP_EOL);
            fwrite($fp,'<urlset xmlns="'.$url.'">'.PHP_EOL.PHP_EOL);

            $array_of_links=[];
            $i =0;

            foreach($html->find('a') as $element) {

                $result = $this->CheckLink($array[2],$element->href,$array_of_links);
                if($result==1){
                    continue;
                }elseif ($result==2){
                    $array_of_links[$i]=$element->href;
                    $i++;
                    fwrite($fp,'    <url>'.PHP_EOL.PHP_EOL.'         <loc>'.$element->href .'</loc>'.PHP_EOL.PHP_EOL.'         <changefreq>'.$changefreq.'</changefreq>'.PHP_EOL.PHP_EOL.'    </url>'.PHP_EOL.PHP_EOL);

                }elseif ($result==3){
                    $array_of_links[$i]=$element->href;
                    $i++;
                    fwrite($fp,'    <url>'.PHP_EOL.PHP_EOL.'         <loc>'.$url.$element->href .'</loc>'.PHP_EOL.PHP_EOL.'         <changefreq>'.$changefreq.'</changefreq>'.PHP_EOL.PHP_EOL.'    </url>'.PHP_EOL.PHP_EOL);

                }
                         }

            fwrite($fp,'</urlset>'.PHP_EOL.PHP_EOL);

            //$array=file('sitemap.xml');
            /*$xml=file_get_contents('sitemap.xml');
            $xml =  htmlspecialchars ($xml);
            $array1 = explode('&gt;',$xml);
            $new_str='';
            for($i=0;$i<count($array1);$i++){
                if(!array_key_exists($i+1,$array1)){
                    break;
                }
                $array_reverse = strrev($array1[$i]);
                if(($array_reverse[0]=="c" && $array_reverse[3]==";")||($array_reverse[0]=="q" && $array_reverse[10]==";")){
                    $array1[$i].="&gt;";
                }
                else{

                        $array1[$i].="&gt;<br><br>";


                }
                $new_str.=$array1[$i];
            }
            $array2= explode('&lt;',$new_str);
            $moder_str='';
            $last=false;
            for($i=0;$i<count($array2);$i++){
                if(array_key_exists($i+1,$array2)){
                    $element=$array2[$i+1];
                }
                else{
                    $last=true;
                }
                if(($element[0]=="u" && $element[3]=="&") || ($element[0]=="/" && $element[4]=="&" && $element[1]=="u")){
                    $array2[$i].="&nbsp;&nbsp;&nbsp;&nbsp;&lt;";
                }
                elseif (($element[0]=="l" && $element[1]=="o")||($element[0]=="c" && $element[1]=="h")){
                    $array2[$i].="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;";
                }
                else{
                    if($last==true){}
                    else {
                        $array2[$i] .= "&lt;";
                    }
                }
                $moder_str.=$array2[$i];
            }
            echo $moder_str;
*/
            fclose($fp);
            //$this->CheckLink();



        }
        else{
            $url="";
        }
    }

    public function CheckLink($url,$undef_url,$elements){
        //echo "All Right";
        $array = explode('/',$undef_url);
        if($array[0]=='http:'||$array[0]=='https:') {
            //echo $url."  ---   ".$array[2].PHP_EOL;
            if ($url != $array[2]) {
                return 1;
            } else {
                if($this->Is_exsist($undef_url,$elements)){
                    return 1;
                }else{
                    return 2;
                }
            }
        }else if($undef_url[1]=='/'){
            return 1;
        }
        else{
            if($this->Is_exsist($undef_url,$elements)){
                return 1;
            }else{
                return 3;
            }
        }
    }

    public function Is_exsist($undef_url,$elements){
        $value = false;
        foreach ($elements as $element){
            if($undef_url==$element){
                $value=true;
            }
        }
        return $value;
    }



    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = strtolower($params[0]);
            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }

    public function admin_index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function admin_add(){
        if ( $_POST ){
            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }
    }

    public function admin_edit(){

        if ( $_POST ){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/pages/');
        }

        if ( isset($this->params[0]) ){
            $this->data['page'] = $this->model->getById($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/pages/');
        }
    }

    public function admin_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/pages/');
    }

}