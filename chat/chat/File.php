<?php

class File{
    public function saveTask($data)
    {
        $str = implode(',',$data) ."\n";
        $file = fopen("tasks.csv", 'a');
        fwrite($file, $str);
        fclose($file);
        echo json_encode("");
    }

    public function getTasks($return = false)
    {
        $file = fopen("tasks.csv", "r");
        $tasks = array();
        while (true) {
            $task = fgetcsv($file);
            if ($task == false) {
                break;
            }
            $tasks[] = $task;
        }
        fclose($file);
        if ($return) {
            return $tasks;
        }
        echo json_encode($tasks);
    }

    public function deleteAll()
    {
        $file = fopen("tasks.csv", "w");
        fwrite($file, "");
        fclose($file);
    }

    public function deleteSome($data){

        $tasks = $this->getTasks(true);
         $ids = $data["ids"];

        for ($i=sizeof($ids)-1; $i >= 0 ; $i--) { 
            array_splice($tasks, $ids[$i], 1);
        }
        
        $file = fopen("tasks.csv", "w");
        foreach ($tasks as $task) {
            $str = implode(',',$task) ."\n";
            fwrite($file, $str);
        }
        fclose($file);
    }
}