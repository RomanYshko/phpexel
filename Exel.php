<?php
require 'vendor/autoload.php';
require 'DB.php';
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

    public function add(){
        $Buy_tags = $this->Buy_tag();
        $tags_2 = $this->Tags_2();
        $tags_3 = $this->Tags_3();
        $Other_tags = $this->Other_tags();
        $pdo = new DB();
        $generation = $pdo->getRow('generation');
        if(!empty($generation)){
            $data = [
                'Buy_tags' => $Buy_tags['text'],
                'tags_2' => $tags_2['text'],
                'tags_3' => $tags_3['text'],
                'Other_tags' => $Other_tags['text'],
                'link_tags_2' => $tags_2['link'],
                'link_tags_3' => $tags_3['text'],
                'id' => $generation['id'],
            ];
            $sql = "UPDATE generation SET Buy_tags=:Buy_tags, tags_2=:tags_2, tags_3=:tags_3, Other_tags=:Other_tags, link_tags_2=:link_tags_2, link_tags_3=:link_tags_3  WHERE id=:id";
            $pdo->update($data, $sql);
        }else{
            $data = [
                'Buy_tags' => $Buy_tags['text'],
                'tags_2' => $tags_2['text'],
                'tags_3' => $tags_3['text'],
                'Other_tags' => $Other_tags['text'],
                'link_tags_2' => $tags_2['link'],
                'link_tags_3' => $tags_3['link'],
            ];
            $pdo->insert($data, 'generation');
        }
    }

    public function getGeneration(){
        $pdo = new DB();
        return $pdo->getRow('generation');
    }
}




