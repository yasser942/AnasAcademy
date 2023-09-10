<?php

namespace App\Livewire;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Livewire\Component;

class ExamTaker extends Component
{
    public $exam;
    public $questions = [];
    public $userAnswers = [];
    public $correctCount = 0;
    public $showCorrectAnswers = false;

    public function mount($exam_id)
    {
        $this->exam = Exam::findOrFail($exam_id);
        $this->questions = $this->exam->examQuestions;
        // Initialize userAnswers array with default values
        $this->userAnswers = array_fill(0, count($this->questions), null);
    }




    public function submitExam()
    {
        $this->validate([
            'userAnswers.*' => 'required|integer',
        ]);

        $this->correctCount = 0;

        foreach ($this->questions as $index => $question) {
            $correctAnswer = $question['options']['correct'];



            if ($this->userAnswers[$index] == $correctAnswer) {

                $this->correctCount++;

            }
        }
        $this->showCorrectAnswers = true;
    }
    public function deleteQuestion($index)
    {
        ExamQuestion::findOrFail($this->questions[$index]['id'])->delete();
        // Delete the question at the specified index
        unset($this->questions[$index]);


        if (count($this->questions) > 0) {
            // Convert the remaining questions to an array and reset keys
            $this->questions = $this->questions->toArray();
        }

    }
    public function render()
    {
        return view('livewire.exam-taker');
    }
}
