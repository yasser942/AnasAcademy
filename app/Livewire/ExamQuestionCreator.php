<?php

namespace App\Livewire;

use App\Models\ExamQuestion;
use App\Models\Question;
use Livewire\Component;

class ExamQuestionCreator extends Component
{
    public $exam_id;
    public $question;
    public $options = [];
    public $correctOption = 1; // Default to the first option as correct

    public function render()
    {
        return view('livewire.exam-question-creator')->layout('templates.components.index');
    }
    public function mount($exam_id)
    {
        $this->test_id = $exam_id;
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // Re-index the array
    }

    public function createQuestion()
    {
        // Validate the question and options
        $this->validate([
            'question' => 'required|string',
            'options.*' => 'required|string',
            'correctOption' => 'required|integer',
        ]);

        // Create an array with options and their correctness
        $optionsWithCorrectness = [];
        foreach ($this->options as $index => $optionText) {
            $optionsWithCorrectness[$index + 1] = $optionText;
        }
        $optionsWithCorrectness['correct'] = $this->correctOption;

        // Example: Save to the database using Eloquent
        ExamQuestion::create([
            'exam_id' => $this->exam_id, // Assuming you have set test_id appropriately
            'question' => $this->question,
            'options' => $optionsWithCorrectness,
        ]);

        // Reset properties for the next question
        $this->reset(['question', 'options', 'correctOption']);
    }
}
