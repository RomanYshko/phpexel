<?php
require 'vendor/autoload.php';
use \avadim\FastExcelReader\Excel;

class Exel{

    private function generation(){
        $file = __DIR__ . '/file/example.xlsx';
        $excel = Excel::open($file);
        return $excel->readRows();
    }

    public function Buy_tag(){
        $results = $this->generation();
        $tags = [];
        foreach ($results as $result){
            if($result['A']) {
                $tags[] = $result['A'];
            }
        }
        return $this->rand_link($tags, $link = []);
    }

    public function Tags_2(){
        $results = $this->generation();
        $tags = [];
        $links = [];
        foreach ($results as $result){
            if(!empty($result['C'])) {
                $tags[] = $result['C'];
                $links[] = $result['D'];
            }
        }
        return $this->rand_link($tags, $links);
    }

    public function Tags_3(){
        $results = $this->generation();
        $tags = [];
        $links = [];
        foreach ($results as $result){
            if($result['E']) {
                $tags[] = $result['E'];
                $links[] = $result['F'];
            }
        }
        return $this->rand_link($tags, $links);
    }

    public function Other_tags(){
        $results = $this->generation();
        $tags = [];
        foreach ($results as $result){
            if(!empty($result['G'])) {
                $tags[] = $result['G'];
            }
        }
        return $this->rand_link($tags, $links = []);
    }

    private function rand_link($tag, $link){
        $rand_string = array_rand($tag, 2);
        $rand_link = !empty($link) ? array_rand($link, 2) : [];
        $tag = $tag[$rand_string[0]];
        $link = !empty($rand_link) ? $link[$rand_link[0]] : [];
        return  ['text' => $tag, 'link' => $link];
    }
}




