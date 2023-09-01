<?php

namespace App\Livewire;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\Test;
use Livewire\Component;

class QuestionOptionManager extends Component
{
    public $questionText;
    public $test;
    public $options = [];
    public $correctOption = ''; // Store the correct option

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // Re-index the array
    }

    public function saveQuestion()
    {
        $validatedData = $this->validate([
            'questionText' => 'required|string',
            'options.*' => 'required|string',
            'correctOption' => 'required|integer', // Validate correct option index
        ]);

        // Create an array with options and their correctness
        $optionsWithCorrectness = [];
        foreach ($validatedData['options'] as $index => $optionText) {
            $optionsWithCorrectness[$index + 1] = $optionText;
        }
        $optionsWithCorrectness['correct'] = $validatedData['correctOption'] + 1;
        // Example: Save to the database using Eloquent
        $question = new Question([
            'test_id' => $this->test->id,
            'question' => $validatedData['questionText'],
            'options' => $optionsWithCorrectness,
        ]);
        $question->save();

        // Reset properties for the next question
        $this->reset(['questionText', 'options', 'correctOption']);
    }


    public function create($id)
    {
        $test=  Test::findOrFail($id);
        return view('templates/resources/tests/create', compact('test'));
    }

    public function render()
    {
        return view('livewire.question-option-manager');
    }
}
