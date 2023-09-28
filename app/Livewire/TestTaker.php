<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TestTaker extends Component
{
    public $test;
    public $questions = [];
    public $userAnswers = [];
    public $correctCount = 0;
    public $showCorrectAnswers = false;
    public $showModal = false;


    public function mount($test_id)
    {
        $this->test = Test::findOrFail($test_id);
        $this->questions = $this->test->questions;
        // Initialize userAnswers array with default values
        $this->userAnswers = array_fill(0, count($this->questions), null);
    }

    public function render()
    {
        return view('livewire.test-taker');
    }


    public function submitTest()
    {
        $this->validate([
            'userAnswers.*' => 'required|integer',
        ]);

        $this->correctCount = 0;

        foreach ($this->questions as $index => $question) {
            $correctAnswer = $question['options']['correct'];



            if ($this->userAnswers[$index] == $correctAnswer) {
                Log::info($correctAnswer ."  ". $this->userAnswers[$index]);

                $this->correctCount++;

            }
        }
        $this->showCorrectAnswers = true;
        $this->showModal = true;

    }
    public function deleteQuestion($index)
    {
        Question::findOrFail($this->questions[$index]['id'])->delete();
        // Delete the question at the specified index
        unset($this->questions[$index]);


        if (count($this->questions) > 0) {
            // Convert the remaining questions to an array and reset keys
            $this->questions = $this->questions->toArray();
        }

    }

}
