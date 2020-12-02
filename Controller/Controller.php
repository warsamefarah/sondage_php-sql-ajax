<?php

namespace Controller;


class Poll{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPoll($question, $answers) {
        $pdo = $this->pdo;
        try {
            // echo $answers[0];
            $add_question = $pdo->prepare('INSERT INTO poll(question, user_id) VALUES(:question, :userId)');
            $add_question->execute(array(
                'question' => htmlspecialchars($question),
                'userId' => 2
            ));

            $ids = $pdo->query("SELECT MAX(question_id) AS id FROM poll");
            
            $question_id = $ids->fetch();

            foreach ($answers as $key => $answer) {
                $add_answer = $pdo->prepare('INSERT INTO answers VALUES(:questionId, :answer, :vote)');
                $add_answer->execute(array(
                    'questionId' => $question_id['id'],
                    'answer' => htmlspecialchars($answer),
                    'vote' => 0
                ));
            }

        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

    public function listPoll() {
        $pdo = $this->pdo;
        try {
            $polls = $pdo->query('SELECT question FROM poll');
            $i = 0;
            while($poll = $polls->fetch()){
                if($i%2 == 0){
                    ?> 
                    <li style='background-color: #f3f3f3'><a href="#"><?php echo $poll['question'] ?></a></li>
                    <?php
                } else {
                    ?> 
                    <li><a href="#"><?php echo $poll['question'] ?></a></li>
                    <?php
                }
                $i++;
            }

        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }
}

?>